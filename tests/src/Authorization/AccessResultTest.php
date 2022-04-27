<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

/**
 * Tests \Xylemical\Account\Authorization\AccessResult.
 */
class AccessResultTest extends TestCase {

  use ProphecyTrait;

  /**
   * Test the basic functionality of the access result.
   */
  public function testSanity(): void {
    $result = new AccessResult('Reason');
    $this->assertEquals('Reason', $result->getReason());
    $this->assertEquals([], $result->getDependencies());
    $this->assertFalse($result->isAllowed());
    $this->assertFalse($result->isDenied());
    $this->assertFalse($result->isNeutral());

    $result->setReason('Failure');
    $this->assertEquals('Failure', $result->getReason());

    $dependency = $this->getMockBuilder(AccessibleInterface::class)->getMock();
    $result->addDependencies([$dependency]);
    $this->assertEquals([$dependency], $result->getDependencies());
  }

  /**
   * Provide the test data for orIf().
   *
   * @return array
   *   The test data.
   */
  public function providerTestOrIf(): array {
    return [
      ['allowed', 'allowed', 'allowed'],
      ['allowed', 'neutral', 'allowed'],
      ['allowed', 'denied', 'denied'],
      ['neutral', 'allowed', 'allowed'],
      ['neutral', 'neutral', 'neutral'],
      ['neutral', 'denied', 'denied'],
      ['denied', 'allowed', 'denied'],
      ['denied', 'neutral', 'denied'],
      ['denied', 'denied', 'denied'],
    ];
  }

  /**
   * Test the orIf() results.
   *
   * @dataProvider providerTestOrIf
   */
  public function testOrIf(string $first, string $second, string $expected): void {
    $a = AccessResult::$first();
    $b = AccessResult::$second();
    $c = AccessResult::$expected();

    $result = $a->orIf($b);
    $this->assertEquals(get_class($c), get_class($result));
  }

  /**
   * Provide the test data for andIf().
   *
   * @return array
   *   The test data.
   */
  public function providerTestAndIf(): array {
    return [
      ['allowed', 'allowed', 'allowed'],
      ['allowed', 'neutral', 'neutral'],
      ['allowed', 'denied', 'denied'],
      ['neutral', 'allowed', 'neutral'],
      ['neutral', 'neutral', 'neutral'],
      ['neutral', 'denied', 'denied'],
      ['denied', 'allowed', 'denied'],
      ['denied', 'neutral', 'denied'],
      ['denied', 'denied', 'denied'],
    ];
  }

  /**
   * Test the andIf() results.
   *
   * @dataProvider providerTestAndIf
   */
  public function testAndIf(string $first, string $second, string $expected): void {
    $a = AccessResult::$first();
    $b = AccessResult::$second();
    $c = AccessResult::$expected();

    $result = $a->andIf($b);
    $this->assertEquals(get_class($c), get_class($result));
    $this->assertEquals($expected === 'allowed', $result->isAllowed());
    $this->assertEquals($expected === 'neutral', $result->isNeutral());
    $this->assertEquals($expected === 'denied', $result->isDenied());
  }

}
