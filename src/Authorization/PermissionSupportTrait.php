<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides permission-based functionality.
 */
trait PermissionSupportTrait {

  /**
   * The permissions.
   *
   * @var \Xylemical\Account\Authorization\PermissionInterface[]
   */
  protected array $permissions = [];

  /**
   * Get permissions.
   *
   * @see \Xylemical\Account\Authorization\PermissionSupportInterface::getPermissions()
   */
  public function getPermissions(): array {
    return $this->permissions;
  }

  /**
   * Set permissions.
   *
   * @see \Xylemical\Account\Authorization\PermissionSupportInterface::setPermissions()
   */
  public function setPermissions(array $permissions): static {
    $this->permissions = [];
    foreach ($permissions as $permission) {
      $this->addPermission($permission);
    }
    return $this;
  }

  /**
   * Get permission.
   *
   * @see \Xylemical\Account\Authorization\PermissionSupportInterface::getPermission()
   */
  public function getPermission(string $permission): ?PermissionInterface {
    return $this->permissions[$permission] ?? NULL;
  }

  /**
   * Check has permission.
   *
   * @see \Xylemical\Account\Authorization\PermissionSupportInterface::hasPermission()
   */
  public function hasPermission(string $permission): bool {
    return isset($this->permissions[$permission]);
  }

  /**
   * Add a permission.
   *
   * @see \Xylemical\Account\Authorization\PermissionSupportInterface::addPermission()
   */
  public function addPermission(PermissionInterface $permission): static {
    $this->permissions[$permission->getId()] = $permission;
    return $this;
  }

  /**
   * Remove a permission.
   *
   * @see \Xylemical\Account\Authorization\PermissionSupportInterface::removePermission()
   */
  public function removePermission(string $permission): static {
    unset($this->permissions[$permission]);
    return $this;
  }

}
