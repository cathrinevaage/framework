<?php

use Netflex\Query\Builder;

use PHPUnit\Framework\TestCase;

final class RawTest extends TestCase
{
  public function testCanPerformRawQuery()
  {
    $raw = '(id:1)';
    $query = new Builder(false);
    $query->raw($raw);

    $this->assertSame(
      $raw,
      $query->getQuery()
    );
  }

  public function testCanPerformMultipleRawQueries()
  {
    $queries = [
      '(id:1)',
      '(id:2)'
    ];

    $query = new Builder(false);
    $query->raw($queries[0]);
    $query->raw($queries[1]);

    $this->assertSame(
      '(' . $queries[0] . ' AND ' . $queries[1] . ')',
      $query->getQuery()
    );
  }
}
