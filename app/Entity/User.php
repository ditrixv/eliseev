<?php

namespace App\Entity;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use Notifiable;


    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',  'verify_token', 'status',
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

    public static function register(string $name, string  $email, string $password)
    {

        $user = static::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'verify_token' => Str::random(),
                'status' => User::STATUS_WAIT,
        ]);

        return $user;
    }

    public static function new(string $name, string  $email)
    {

        $user = static::create([
                'name' => $name,
                'email' => $email,
                'status' => User::STATUS_WAIT,
        ]);

        return $user;
    }

    public function verify($token){


        if($this->isActive()){
            throw new \DomainException('User already verified');
        }
        $this->update([
            'status' => self::STATUS_ACTIVE,
            'verify_token' => ''
        ]);

    }


}
