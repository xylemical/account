<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides role-based functionality.
 */
trait RoleSupportTrait {

  /**
   * The roles.
   *
   * @var \Xylemical\Account\Authorization\RoleInterface[]
   */
  protected array $roles = [];

  /**
   * Get roles.
   *
   * @see \Xylemical\Account\Authorization\RoleSupportInterface::getRoles()
   */
  public function getRoles(): array {
    return $this->roles;
  }

  /**
   * Set roles.
   *
   * @see \Xylemical\Account\Authorization\RoleSupportInterface::setRoles()
   */
  public function setRoles(array $roles): static {
    $this->roles = [];
    foreach ($roles as $role) {
      $this->addRole($role);
    }
    return $this;
  }

  /**
   * Get role.
   *
   * @see \Xylemical\Account\Authorization\RoleSupportInterface::getRole()
   */
  public function getRole(string $role): ?RoleInterface {
    return $this->roles[$role] ?? NULL;
  }

  /**
   * Check has role.
   *
   * @see \Xylemical\Account\Authorization\RoleSupportInterface::hasRole()
   */
  public function hasRole(string $role): bool {
    return isset($this->roles[$role]);
  }

  /**
   * Add role.
   *
   * @see \Xylemical\Account\Authorization\RoleSupportInterface::addRole()
   */
  public function addRole(RoleInterface $role): static {
    $this->roles[$role->getId()] = $role;
    return $this;
  }

  /**
   * Remove role.
   *
   * @see \Xylemical\Account\Authorization\RoleSupportInterface::removeRole()
   */
  public function removeRole(string $role): static {
    unset($this->roles[$role]);
    return $this;
  }

}
