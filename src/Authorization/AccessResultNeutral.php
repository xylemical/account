<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides a neutral access result.
 */
class AccessResultNeutral extends AccessResult {

  /**
   * {@inheritdoc}
   */
  public function isNeutral(): bool {
    return TRUE;
  }

}
