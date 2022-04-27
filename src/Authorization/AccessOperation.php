<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides a generic access operation.
 */
class AccessOperation implements AccessOperationInterface {

  /**
   * The access operation.
   *
   * @var string
   */
  protected string $id;

  /**
   * AccessOperation constructor.
   *
   * @param string $id
   *   The identifier.
   */
  public function __construct(string $id) {
    $this->id = $id;
  }

  /**
   * {@inheritdoc}
   */
  public function getId(): string {
    return $this->id;
  }

}
