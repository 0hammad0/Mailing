<?php

namespace App\Jobs;

use App\Mail\Mailer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $emails;
    public $subject;
    public $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails, $subject, $content)
    {
        $this->emails = $emails;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->emails)->send(new Mailer($this->subject, $this->content));
    }
}
