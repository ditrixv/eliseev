<?php

namespace App\Entity;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class User extends Authenticatable
{
    use Notifiable;


    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',  'status','verify_token', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isWait(){
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(){
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isAdmin(){
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser(){
        return $this->role === self::ROLE_USER;
    }

    public static function register(string $name, string  $email, string $password = 'secret')
    {

        $user = static::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'verify_token' => Str::uuid(),
                'status' => User::STATUS_WAIT,
                'role' => User::ROLE_USER,
        ]);

        return $user;
    }

////////////////  DRY ///////////////////////////

    public static function new(string $name, string  $email)
    {

        $user = static::create([
                'name' => $name,
                'email' => $email,
                'status' => User::STATUS_WAIT,
                'password' => Hash::make('password'),
                'role' => User::ROLE_USER,
        ]);

        return $user;
    }

    public function verify(){

        if($this->isActive()){
            throw new \DomainException('User already verified');
        }
        $this->update([
            'status' => self::STATUS_ACTIVE,
            'verify_token' => null
        ]);

    }

    public function changeRole($role){

        if(!\in_array($role,[self::ROLE_ADMIN,self::ROLE_USER])){
            throw new \InvalidArgumentException('Undefined role "'.$role.'"');
        }

        if($this->role === $role){
            throw new \InvalidArgumentException('Role is already assigned');
        }

        $this->update(['role' => $role]);
    }



}
