<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use Xylemical\Account\AccountInterface;

/**
 * Provides a restrictive authorization.
 */
class AuthorizationRestrictive implements AuthorizationInterface {

  /**
   * {@inheritdoc}
   */
  public function authorize(AccountInterface $account, AccessibleInterface $access, AccessOperationInterface $operation): bool {
    $result = $access->access($account, $operation);
    return $result->isAllowed();
  }

}
