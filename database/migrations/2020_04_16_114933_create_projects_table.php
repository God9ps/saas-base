<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateProjectsTable
 */
class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('subdomain')->unique();
                $table->string('db_name')->unique();
                $table->string('db_host')->nullable();
                $table->string('db_user')->nullable();
                $table->string('db_password')->nullable();
                $table->unsignedBigInteger('created_by_id')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('created_by_id')->references('id')->on('users');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
}
