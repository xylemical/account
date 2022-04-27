<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * A generic role.
 */
class Role implements RoleInterface {

  use PermissionSupportTrait;

  /**
   * The identifier.
   *
   * @var string
   */
  protected string $id;

  /**
   * The label.
   *
   * @var string
   */
  protected string $label;

  /**
   * Role constructor.
   *
   * @param string $id
   *   The identifier.
   * @param string $label
   *   The label.
   */
  public function __construct(string $id, string $label) {
    $this->id = $id;
    $this->label = $label;
  }

  /**
   * {@inheritdoc}
   */
  public function getId(): string {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function getLabel(): string {
    return $this->label;
  }

}
