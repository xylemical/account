<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides for role-based access control.
 */
interface RoleInterface extends PermissionSupportInterface {

  /**
   * Get the role identifier.
   *
   * @return string
   *   The identifier.
   */
  public function getId(): string;

  /**
   * Get the human-readable label for the role.
   *
   * @return string
   *   The label.
   */
  public function getLabel(): string;

}
