<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provide the access operation information.
 */
interface AccessOperationInterface {

  /**
   * Get the identifier.
   *
   * @return string
   *   The identifier.
   */
  public function getId(): string;

}
