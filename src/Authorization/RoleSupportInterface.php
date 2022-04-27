<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides role-based behaviour.
 */
interface RoleSupportInterface {

  /**
   * Get the roles of the object.
   *
   * @return \Xylemical\Account\Authorization\RoleInterface[]
   *   The roles indexed by role identifier.
   */
  public function getRoles(): array;

  /**
   * Set the roles of the object.
   *
   * @param \Xylemical\Account\Authorization\RoleInterface[] $roles
   *   The roles.
   *
   * @return $this
   */
  public function setRoles(array $roles): static;

  /**
   * Get the role.
   *
   * @param string $role
   *   The role.
   *
   * @return \Xylemical\Account\Authorization\RoleInterface|null
   *   The role or NULL.
   */
  public function getRole(string $role): ?RoleInterface;

  /**
   * Check the object has the role.
   *
   * @param string $role
   *   The role.
   *
   * @return bool
   *   The result.
   */
  public function hasRole(string $role): bool;

  /**
   * Add a role to the object.
   *
   * @param \Xylemical\Account\Authorization\RoleInterface $role
   *   The role.
   *
   * @return $this
   */
  public function addRole(RoleInterface $role): static;

  /**
   * Remove a role from the object.
   *
   * @param string $role
   *   The role.
   *
   * @return $this
   */
  public function removeRole(string $role): static;

}
