<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Account\Authorization\PermissionSupportTrait.
 */
class PermissionSupportTraitTest extends TestCase {

  /**
   * Test the sanity of the permission support trait.
   */
  public function testSanity(): void {
    /** @var \Xylemical\Account\Authorization\PermissionSupportInterface $trait */
    $trait = $this->getMockForTrait(PermissionSupportTrait::class);
    $this->assertEquals([], $trait->getPermissions());
    $this->assertNull($trait->getPermission('id'));
    $this->assertFalse($trait->hasPermission('id'));

    $perm = new Permission('id', 'ID');
    $trait->setPermissions([$perm]);
    $this->assertEquals(['id' => $perm], $trait->getPermissions());
    $this->assertSame($perm, $trait->getPermission('id'));
    $this->assertTrue($trait->hasPermission('id'));

    $trait->removePermission('id');
    $this->assertEquals([], $trait->getPermissions());
    $this->assertNull($trait->getPermission('id'));
    $this->assertFalse($trait->hasPermission('id'));
  }

}
