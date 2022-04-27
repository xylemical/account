<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provide permission-based behaviour.
 */
interface PermissionSupportInterface {

  /**
   * Get the permissions of the object.
   *
   * @return \Xylemical\Account\Authorization\PermissionInterface[]
   *   The permissions indexed by permission identifier.
   */
  public function getPermissions(): array;

  /**
   * Set the permissions of the object.
   *
   * @param \Xylemical\Account\Authorization\PermissionInterface[] $permissions
   *   The permissions.
   *
   * @return $this
   */
  public function setPermissions(array $permissions): static;

  /**
   * Get the permission.
   *
   * @param string $permission
   *   The permission.
   *
   * @return \Xylemical\Account\Authorization\PermissionInterface|null
   *   The permission or NULL.
   */
  public function getPermission(string $permission): ?PermissionInterface;

  /**
   * Check the object has the permission.
   *
   * @param string $permission
   *   The permission.
   *
   * @return bool
   *   The result.
   */
  public function hasPermission(string $permission): bool;

  /**
   * Add a permission to the object.
   *
   * @param \Xylemical\Account\Authorization\PermissionInterface $permission
   *   The permission.
   *
   * @return $this
   */
  public function addPermission(PermissionInterface $permission): static;

  /**
   * Remove a permission from the object.
   *
   * @param string $permission
   *   The permission.
   *
   * @return $this
   */
  public function removePermission(string $permission): static;

}
