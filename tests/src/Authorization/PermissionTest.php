<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Account\Authorization\Permission.
 */
class PermissionTest extends TestCase {

  /**
   * Test sanity.
   */
  public function testSanity(): void {
    $permission = new Permission('test', 'Test');
    $this->assertEquals('test', $permission->getId());
    $this->assertEquals('Test', $permission->getLabel());
  }

}
