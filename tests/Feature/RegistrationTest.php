<?php

namespace Tests\Feature;

use Cyaxaress\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_register_form()
    {
        $response=$this->get(route('register'));
        $response->assertStatus(200);
    }
    public  function test_user_can_register()
    {
        $this->withExceptionHandling();
       $response= $this->registerNewUser();
        $response->assertRedirect(redirect('home'));
        $this->assertCount(1,User::all());
    }
    /** @return void */
    public function test_use_have_to_verify_account()
    {
        $this->registerNewUser();
        $response=$this->get(route('home'));
        $response->assertRedirect(route('verification.notice'));
    }
    public function test_verified_user_can_see_home_page()
    {
        $this->registerNewUser();

        $this->assertAuthenticated();
        auth()->user()->markEmailAsVerified();
        $response=$this->get(route('home'));
        $response->assertOk();
    }

    public function registerNewUser()
    {
       return $this->post(route('register'), [
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'mobile' => '09103338651',
            'password' => '!!125asdAA',
            'password_confirmation' => '!!125asdAA',

        ]);
    }
}
