<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('solution_submissions',function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('solution_developer_id');
            $table->string('github_url');
            $table->string('docker_url');
            $table->mediumText('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solution_submissions');
    }
}