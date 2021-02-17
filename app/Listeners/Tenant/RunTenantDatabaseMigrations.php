<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\DatabaseCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class RunTenantDatabaseMigrations
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
     * @param  DatabaseCreated  $event
     * @return bool
     */
    public function handle(DatabaseCreated $event)
    {
        $project = $event->project();
        $migration = Artisan::call('tenants:migrate', [
           'id' => $project->id
        ]);

        return $migration === 0;
    }
}
