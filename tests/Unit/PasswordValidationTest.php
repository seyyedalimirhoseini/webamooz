<?php

namespace Tests\Unit;


use Cyaxaress\User\Rules\ValidPassword;
use PHPUnit\Framework\TestCase;

class PasswordValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_password_should_not_be_less_than_6_characters()
    {
         $result=(new ValidPassword())->passes('','A12a!');
            $this->assertEquals(0,$result);
         //0 means is result =false
    }
    public function test_password_should_include_sign_characters()
    {
        $result=(new ValidPassword())->passes('','A12a25241');
        $this->assertEquals(0,$result);
        //0 means is result =false
    }
    public function test_password_should_include_digit_characters()
    {
        $result=(new ValidPassword())->passes('','A!@!@aasdf');
        $this->assertEquals(0,$result);
        //0 means is result =false
    }

    public function test_password_should_include_Capital_characters()
    {
        $result=(new ValidPassword())->passes('','!@!@aasdf');
        $this->assertEquals(0,$result);
        //0 means is result =false
    }
    public function test_password_should_include_small_characters()
    {
        $result=(new ValidPassword())->passes('','!@!@ASDFWESD');
        $this->assertEquals(0,$result);
        //0 means is result =false
    }

}
