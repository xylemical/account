<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use Xylemical\Account\AccountInterface;

/**
 * Performs authorization on the account.
 */
interface AuthorizationInterface {

  /**
   * Check the authorization of the account for the operation.
   *
   * @param \Xylemical\Account\AccountInterface $account
   *   The account.
   * @param \Xylemical\Account\Authorization\AccessibleInterface $access
   *   The object to access.
   * @param \Xylemical\Account\Authorization\AccessOperationInterface $operation
   *   The operation.
   *
   * @return bool
   *   The result.
   */
  public function authorize(AccountInterface $account, AccessibleInterface $access, AccessOperationInterface $operation): bool;

}
