<?php

declare(strict_types=1);

namespace Xylemical\Account;

/**
 * Provides an account provider.
 */
interface AccountProviderInterface {

  /**
   * Get the account.
   *
   * @return \Xylemical\Account\AccountInterface
   *   The account.
   */
  public function getAccount(): AccountInterface;

}
