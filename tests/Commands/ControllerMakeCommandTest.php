<?php

namespace IaK\MakeTestable\Tests\Commands;

use IaK\MakeTestable\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class ControllerMakeCommandTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_create_a_test_for_a_given_controller()
    {
        Artisan::call('make:controller Blog --test');

        $this->assertTrue($this->double->wasCalled());
        $this->assertTrue($this->double->isNotUnitTest());
        $this->assertEquals('Controllers\BlogTest', $this->double->testClassName);
    }

    /**
     * @test
     */
    public function it_does_not_create_a_test_by_default()
    {
        Artisan::call('make:command Blog');

        $this->assertTrue($this->double->wasNotCalled());
    }
}
