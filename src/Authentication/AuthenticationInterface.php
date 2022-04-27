<?php

declare(strict_types=1);

namespace Xylemical\Account\Authentication;

use Xylemical\Account\AccountInterface;

/**
 * Provides authentication identification.
 */
interface AuthenticationInterface {

  /**
   * Get the account.
   *
   * @return \Xylemical\Account\AccountInterface|null
   *   The account or NULL.
   */
  public function authenticate(): ?AccountInterface;

}
