<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provide the base access result behaviour.
 */
class AccessResult implements AccessResultReasonInterface {

  /**
   * The reason provided for denial.
   *
   * @var string
   */
  protected string $reason;

  /**
   * The dependencies of the access result.
   *
   * @var \Xylemical\Account\Authorization\AccessibleInterface[]
   */
  protected array $dependencies = [];

  /**
   * AccessResult constructor.
   *
   * @param string $reason
   *   The reason.
   */
  public function __construct(string $reason = '') {
    $this->reason = $reason;
  }

  /**
   * {@inheritdoc}
   */
  public function isAllowed(): bool {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function isDenied(): bool {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function isNeutral(): bool {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function orIf(AccessResultInterface $other): AccessResultInterface {
    if ($other->isDenied() || $this->isDenied()) {
      $result = static::denied();
    }
    elseif ($other->isAllowed() || $this->isAllowed()) {
      $result = static::allowed();
    }
    else {
      $result = static::neutral();
    }
    return $result->merge($other)->merge($this);
  }

  /**
   * {@inheritdoc}
   */
  public function andIf(AccessResultInterface $other): AccessResultInterface {
    if ($other->isDenied() || $this->isDenied()) {
      $result = static::denied();
    }
    elseif ($other->isAllowed() && $this->isAllowed()) {
      $result = static::allowed();
    }
    else {
      $result = static::neutral();
    }

    return $result->merge($other)->merge($this);
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(): array {
    return $this->dependencies;
  }

  /**
   * {@inheritdoc}
   */
  public function addDependencies(array $dependencies): static {
    foreach ($dependencies as $dependency) {
      $this->addDependency($dependency);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addDependency(AccessibleInterface $dependency): static {
    if (!in_array($dependency, $this->dependencies)) {
      $this->dependencies[] = $dependency;
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function merge(AccessResultInterface $other): static {
    $this->addDependencies($other->getDependencies());
    if ($other->isDenied() && $other instanceof AccessResultReasonInterface) {
      $this->setReason($other->getReason());
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getReason(): string {
    return $this->reason;
  }

  /**
   * {@inheritdoc}
   */
  public function setReason(string $reason): static {
    $this->reason = $reason;
    return $this;
  }

  /**
   * Get an allowed result.
   *
   * @return \Xylemical\Account\Authorization\AccessResultInterface
   *   The result.
   */
  public static function allowed(): AccessResultInterface {
    return new AccessResultAllowed();
  }

  /**
   * Get a denied result.
   *
   * @param string $reason
   *   The denial reason.
   *
   * @return \Xylemical\Account\Authorization\AccessResultInterface
   *   The result.
   */
  public static function denied(string $reason = ''): AccessResultInterface {
    return new AccessResultDenied();
  }

  /**
   * Get a neutral result.
   *
   * @return \Xylemical\Account\Authorization\AccessResultInterface
   *   The result.
   */
  public static function neutral(): AccessResultInterface {
    return new AccessResultNeutral();
  }

}
