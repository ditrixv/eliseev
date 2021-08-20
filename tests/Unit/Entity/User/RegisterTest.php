<?php
namespace Tests\Unit;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Entity\User;


class RegisterTest extends TestCase
{

    use DatabaseTransactions;


    public function testRequests()
    {

        $user = User::register($name = 'name', $email = 'email', $password = 'password');

        self::assertNotEmpty($user);

        self::assertEquals($name, $user->name);
        self::assertEquals($email, $user->email);

        self::assertNotEmpty($user->password);
        self::assertNotEquals($password, $user->password);

        self::assertFalse($user->isActive());
        self::assertTrue($user->isWait());


        $userManual = User::new($name = 'name', $email = 'email');
        self::assertNotEmpty($userManual);
        self::assertEquals($name, $userManual->name);
        self::assertEquals($email, $userManual->email);

        self::assertNotEmpty($userManual->password);
        self::assertNotEquals($password, $userManual->password);

        $this->assertTrue(true);
    }

    // public function testVerify(){
    //     $user = User::register('name','email','password');
    //     $user->verify();

    //     self::assertTrue($user->isWait());
    // }
}
