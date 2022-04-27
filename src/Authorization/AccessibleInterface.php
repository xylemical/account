<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use Xylemical\Account\AccountInterface;

/**
 * Allows an object to be accessible.
 */
interface AccessibleInterface {

  /**
   * Check the account has the access to perform the operation.
   *
   * @param \Xylemical\Account\AccountInterface $account
   *   The account.
   * @param \Xylemical\Account\Authorization\AccessOperationInterface $operation
   *   The operation.
   *
   * @return \Xylemical\Account\Authorization\AccessResultInterface
   *   The result.
   */
  public function access(AccountInterface $account, AccessOperationInterface $operation): AccessResultInterface;

}
