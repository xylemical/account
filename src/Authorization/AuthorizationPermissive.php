<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use Xylemical\Account\AccountInterface;

/**
 * Provides permissive authorization.
 */
class AuthorizationPermissive implements AuthorizationInterface {

  /**
   * {@inheritdoc}
   */
  public function authorize(AccountInterface $account, AccessibleInterface $access, AccessOperationInterface $operation): bool {
    $result = $access->access($account, $operation);
    return $result->isAllowed() || $result->isNeutral();
  }

}
