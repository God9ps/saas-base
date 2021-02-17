<?php


namespace App\Tenant;


use App\Models\Project;
use Illuminate\Support\Facades\DB;

class DatabaseManager
{
    public function createDatabase(Project $project)
    {
        return DB::statement("
            CREATE DATABASE {$project->db_name} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
        ");
    }
}
