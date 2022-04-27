<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Xylemical\Account\AccountInterface;

/**
 * Tests \Xylemical\Account\Authorization\AuthorizationRestrictive.
 */
class AuthorizationRestrictiveTest extends TestCase {

  use ProphecyTrait;

  /**
   * Provides test data for testAuthorize().
   *
   * @return array[]
   *   The test data.
   */
  public function providerTestAuthorize(): array {
    return [
      ['allowed', TRUE],
      ['neutral', FALSE],
      ['denied', FALSE],
    ];
  }

  /**
   * Tests the authorization process.
   *
   * @dataProvider providerTestAuthorize
   */
  public function testAuthorize(string $target, bool $success): void {
    $operation = $this->getMockBuilder(AccessOperationInterface::class)->getMock();
    $account = $this->getMockBuilder(AccountInterface::class)->getMock();
    $accessible = $this->prophesize(AccessibleInterface::class);
    $accessible->access($account, $operation)->willReturn(AccessResult::$target());

    $auth = new AuthorizationRestrictive();
    $result = $auth->authorize($account, $accessible->reveal(), $operation);
    $this->assertEquals($success, $result);
  }

}
