<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\DatabaseCreated;
use App\Events\Tenant\ProjectCreated;
use App\Tenant\DatabaseManager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateProjectDatabase
{

    private $database;
    /**
     * Create the event listener.
     *
     * @param DatabaseManager $database
     */
    public function __construct(DatabaseManager $database)
    {
        $this->database = $database;
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        $project = $event->project();

        if(!$this->database->createDatabase($project)){
            throw new \Exception(trans('cruds.project.database.created_error'));
        }

        event(new DatabaseCreated($project));
    }
}
