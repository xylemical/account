<?php

declare(strict_types=1);

namespace Xylemical\Account;

/**
 * Provides account behaviour.
 */
interface AccountInterface {

  /**
   * Get the account identifier.
   *
   * @return string
   *   The identifier.
   */
  public function getId(): string;

}
