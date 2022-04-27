<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Account\Authorization\AccessOperation.
 */
class AccessOperationTest extends TestCase {

  /**
   * Test sanity.
   */
  public function testSanity(): void {
    $operation = new AccessOperation('edit');
    $this->assertEquals('edit', $operation->getId());
  }

}
