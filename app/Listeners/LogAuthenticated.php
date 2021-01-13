<?php

namespace App\Listeners;

use App\Events\AddSessionFieldsAfterLogAuthenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogAuthenticated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddSessionFieldsAfterLogAuthenticated  $event
     * @return void
     */
    public function handle(AddSessionFieldsAfterLogAuthenticated $event)
    {
        $company = $event->company;
        session()->push('company_id', $company->id);
        dd(session()->all());
    }
}
