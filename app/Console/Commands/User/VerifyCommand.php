<?php

namespace App\Console\Commands\User;
use App\Entity\User;
use Illuminate\Console\Command;
use App\UseCases\Auth\RegisterService;

class VerifyCommand extends Command
{

    private $service;

    public function __construct(RegisterService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:verify {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'verify user by email';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $email = $this->argument('email');
        if(!$user = User::where('email',$email)->first()){
            $this->erorr('user not found');
            return false;
        }

        // $user->update([
        //     'status' => User::STATUS_ACTIVE,
        //     'verify_token' => null
        // ]);

     //   $user->verify();
        try{
            $this->service->verify($user->id);

        }catch(\DomainException $e){
            $this->error($e->getMessage());
            return false;
        }

        $this->info('User '.$this->argument('email').' verified');
        return true;
    }
}
