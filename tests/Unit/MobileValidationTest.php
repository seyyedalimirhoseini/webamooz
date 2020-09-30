<?php

namespace Tests\Unit;

use Cyaxaress\User\Rules\ValidMobile;
use PHPUnit\Framework\TestCase;

class MobileValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mobile_can_not_be_less_than_10_character()
    {
        $result=(new ValidMobile())->passes('','910333865');
            $this->assertEquals(0,$result);
    }
    public function test_mobile_can_not_be_more_than_10_character()
    {
        $result=(new ValidMobile())->passes('','9103338651');
        $this->assertEquals(0,$result);
    }
    public function test_mobile_should_start_by_9()
    {
        $result=(new ValidMobile())->passes('','3967856985');
        $this->assertEquals(0,$result);
    }
}
