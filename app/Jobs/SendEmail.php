<?php

namespace App\Jobs;

use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Util\Test;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $user;



    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param TestMail $email
     */
    public function __construct(User $user)
    {
        $this->user = $user;



    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new TestMail();
        Mail::to($this->user->email)->send($email);
    }
}
