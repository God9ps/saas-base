<?php

namespace App\Tenant;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ManageTenant{

    public function setConnection(Project $project)
    {
        DB::purge('tenant');

        if(!$project->db_host == null){
            config()->set('database.connections.tenant.host', $project->db_host);
            config()->set('database.connections.tenant.username', $project->db_user);
            config()->set('database.connections.tenant.password', $project->db_password);
        }

        config()->set('database.connections.tenant.database', $project->db_name);

        DB::setDefaultConnection('tenant');

        Schema::connection('tenant')->getConnection()->reconnect();

    }

    public function isMasterDomain()
    {
        return request()->getHost() == config('tenant.master_domain');
    }
}
