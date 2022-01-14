<?php

namespace Tests\Feature;

use App\Http\Controllers\MainController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpAndRunning()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuthentication()
    {
        $response = app()->call('App\Http\Controllers\MainController@authenticate');

        if ($response->status == "success") {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListOfEmployees()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
        ->assertViewIs("welcome");
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAllEmployeesAreDisplayed()
    {
        $response = $this->get('/');

        $response->assertSee("Mr.Dayni Mayez")
        ->assertSee("Mrs.Alisa Milesz")
        ->assertSee("Mr.Andre Barbuda")
        ->assertSee("Mr.James Stein")
        ->assertSee("Mr.John Tompkins");
    }
}
