<?php


use App\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testRegister()
    {
        $email = 'johndoe@example.com';
        $name='Usertest';
        $password = Hash::make('password');

        User::register(['name'=>$name,'email' => $email, 'password' => $password]);

        $this->tester->seeRecord('users', ['name'=>$name,'email' => $email, 'password' => $password]);
    }


}
