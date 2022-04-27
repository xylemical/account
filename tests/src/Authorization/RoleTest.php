<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Account\Authorization\Role.
 */
class RoleTest extends TestCase {

  /**
   * Test the sanity.
   */
  public function testSanity(): void {
    $role = new Role('id', 'Test');
    $this->assertEquals('id', $role->getId());
    $this->assertEquals('Test', $role->getLabel());
  }

}
