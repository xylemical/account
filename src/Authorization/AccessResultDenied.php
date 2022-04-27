<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides a denied access result.
 */
class AccessResultDenied extends AccessResult {

  /**
   * {@inheritdoc}
   */
  public function isDenied(): bool {
    return TRUE;
  }

}
