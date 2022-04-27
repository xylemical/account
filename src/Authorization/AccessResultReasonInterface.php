<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provides developer information for access results.
 */
interface AccessResultReasonInterface extends AccessResultInterface {

  /**
   * Get the reason for the access denial.
   *
   * @return string
   *   The reason.
   */
  public function getReason(): string;

  /**
   * Set the reason for access denial.
   *
   * @param string $reason
   *   The reason.
   *
   * @return $this
   */
  public function setReason(string $reason): static;

}
