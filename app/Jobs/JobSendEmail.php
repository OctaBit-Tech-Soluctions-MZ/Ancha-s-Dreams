<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $user, public $password)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = $this->user;
        $password = $this->password;
        $email = $this->user->email;
        $name = $this->user->name;
        $role = $this->user->role;

        Mail::send('emails.account', compact('password','email', 'name', 'role'), 
            function ($message) use($user){
                $message->to($user->email, $user->name.' '.$user->surname)
                        ->subject('Acesso à Plataforma de Culinária');
        });

    }
}
