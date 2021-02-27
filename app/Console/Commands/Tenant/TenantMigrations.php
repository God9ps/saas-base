<?php

namespace App\Console\Commands\Tenant;

use App\Models\Project;
use App\Tenant\ManageTenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class TenantMigrations
 * @package App\Console\Commands\Tenant
 */
class TenantMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate {id?} {--fresh}';
    private $tenant;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations on tenants databases';

    /**
     * Create a new command instance.
     *
     * @param ManageTenant $tenant
     */
    public function __construct(ManageTenant $tenant)
    {
        parent::__construct();
        $this->tenant = $tenant;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if($id = $this->argument('id')){
            $project = Project::find($id);
            if($project) $this->execCommand($project);
            return;
        }

        $projects = Project::all();

        foreach ($projects as $project){
            $this->execCommand($project);
        }
    }

    /**
     * @param Project $project
     */
    public function execCommand(Project $project)
    {
        $command = $this->option('fresh') ? 'migrate:fresh' : 'migrate';

        $this->tenant->setConnection($project);
        $this->info("Connecting to {$project->name}");
        Artisan::call($command, [
            '--force' => true,
            '--path'  => '/database/migrations/tenant'
        ]);
        Artisan::call('db:seed', [
            '--class' => 'AdminTableSeeder'
        ]);
        $this->info("End Connecting to {$project->name}");
        $this->info("__________________________________");
    }
}
