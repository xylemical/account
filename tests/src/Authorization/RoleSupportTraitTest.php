<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Account\Authorization\RoleSupportTrait.
 */
class RoleSupportTraitTest extends TestCase {

  /**
   * Test the sanity of the role support trait.
   */
  public function testSanity(): void {
    /** @var \Xylemical\Account\Authorization\RoleSupportInterface $trait */
    $trait = $this->getMockForTrait(RoleSupportTrait::class);
    $this->assertEquals([], $trait->getRoles());
    $this->assertNull($trait->getRole('id'));
    $this->assertFalse($trait->hasRole('id'));

    $perm = new Role('id', 'ID');
    $trait->setRoles([$perm]);
    $this->assertEquals(['id' => $perm], $trait->getRoles());
    $this->assertSame($perm, $trait->getRole('id'));
    $this->assertTrue($trait->hasRole('id'));

    $trait->removeRole('id');
    $this->assertEquals([], $trait->getRoles());
    $this->assertNull($trait->getRole('id'));
    $this->assertFalse($trait->hasRole('id'));
  }

}
