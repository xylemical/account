<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides an allowed access result.
 */
class AccessResultAllowed extends AccessResult {

  /**
   * {@inheritdoc}
   */
  public function isAllowed(): bool {
    return TRUE;
  }

}
