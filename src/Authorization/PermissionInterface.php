<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides the details of a permission.
 */
interface PermissionInterface {

  /**
   * Get the permission identifier.
   *
   * @return string
   *   The identifier.
   */
  public function getId(): string;

  /**
   * Get the human-readable label for the permission.
   *
   * @return string
   *   The label.
   */
  public function getLabel(): string;

}
