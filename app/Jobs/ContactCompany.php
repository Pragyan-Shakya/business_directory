<?php

namespace App\Jobs;

use App\Mail\ContactCompanyMail;
use App\Model\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactCompany implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $company, $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $data)
    {
        $this->company = Company::find($id);
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->company->email)->send(new ContactCompanyMail($this->data));
    }
}
