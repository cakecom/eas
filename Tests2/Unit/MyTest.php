<?php

use App\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MyTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    public function testLoginPost(){
        $response = $this->get('/login');

        $response->assertSuccessful();
    }
//    protected function _before()
//    {
//    }
//
//    protected function _after()
//    {
//    }
//
//    // tests
//    public function testSomeFeature()
//    {
//
//    }

}
