<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('/');

        $response->assertSatus(200);
    }
}
