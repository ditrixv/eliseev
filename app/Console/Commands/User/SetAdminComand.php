<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;
use App\Entity\User;

class SetAdminComand extends Command
{

    protected $signature = 'user:admin {email}';

    protected $description = 'Set administrator role by email';

    private $service;


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $email = $this->argument('email');
        if(!$user = User::where('email',$email)->first()){
            $this->erorr('user not found');
            return false;
        }
        $user->update(['role' => User::ROLE_ADMIN]);
        $this->info('role setting');
        return true;
    }
}
