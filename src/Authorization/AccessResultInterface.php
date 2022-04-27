<?php

declare(strict_types=1);

namespace Xylemical\Account\Authorization;

/**
 * Provide the access check result.
 *
 * Access checks are either permissive or restrictive. When permissive a neutral
 * result will allow access. When restrictive a neutral result will deny access.
 *
 * The combination of access results through orIf() and andIf() includes the
 * access result dependencies (the objects that applied an access check).
 */
interface AccessResultInterface {

  /**
   * Checks whether this access result indicates access is explicitly allowed.
   *
   * @return bool
   *   When TRUE then isDenied() and isNeutral() are FALSE.
   */
  public function isAllowed(): bool;

  /**
   * Checks whether this access result indicates access is explicitly denied.
   *
   * This is a kill switch — both orIf() and andIf() will result in
   * isDenied() if either results are isDenied().
   *
   * @return bool
   *   When TRUE then isAllowed() and isNeutral() are FALSE.
   */
  public function isDenied(): bool;

  /**
   * Checks whether this access result indicates access is not yet determined.
   *
   * @return bool
   *   When TRUE then isAllowed() and isDenied() are FALSE.
   */
  public function isNeutral(): bool;

  /**
   * Combine this access result with another using OR.
   *
   * When ORing two access results, the result is:
   * - isDenied() in either = isDenied()
   * - otherwise if isAllowed() in either = isAllowed()
   * - otherwise both must be isNeutral() = isNeutral()
   *
   * Truth table:
   * @code
   *   |A N D
   * --+-----
   * A |A A D
   * N |A N D
   * D |D D D
   * @endcode
   *
   * @param \Xylemical\Account\Authorization\AccessResultInterface $other
   *   The other access result to OR this one with.
   *
   * @return \Xylemical\Account\Authorization\AccessResultInterface
   *   The result.
   */
  public function orIf(AccessResultInterface $other): AccessResultInterface;

  /**
   * Combine this access result with another using AND.
   *
   * When ANDing two access results, the result is:
   * - isDenied() in either = isDenied()
   * - otherwise, if isAllowed() in both = isAllowed()
   * - otherwise, one of them is isNeutral() = isNeutral()
   *
   * Truth table:
   * @code
   *   |A N D
   * --+-----
   * A |A N D
   * N |N N D
   * D |D D D
   * @endcode
   *
   * @param \Xylemical\Account\Authorization\AccessResultInterface $other
   *   The other access result to AND this one with.
   *
   * @return \Xylemical\Account\Authorization\AccessResultInterface
   *   The result.
   */
  public function andIf(AccessResultInterface $other): AccessResultInterface;

  /**
   * Merge another access result into this one.
   *
   * @param \Xylemical\Account\Authorization\AccessResultInterface $other
   *   The other access result to merge.
   *
   * @return $this
   */
  public function merge(AccessResultInterface $other): static;

  /**
   * Get the dependencies of the access result.
   *
   * @return \Xylemical\Account\Authorization\AccessibleInterface[]
   *   The dependencies.
   */
  public function getDependencies(): array;

  /**
   * Add multiple dependencies.
   *
   * @param \Xylemical\Account\Authorization\AccessibleInterface[] $dependencies
   *   The dependencies.
   *
   * @return $this
   */
  public function addDependencies(array $dependencies): static;

  /**
   * Add a dependency of the access result.
   *
   * @param \Xylemical\Account\Authorization\AccessibleInterface $dependency
   *   The dependency.
   *
   * @return $this
   */
  public function addDependency(AccessibleInterface $dependency): static;

}
