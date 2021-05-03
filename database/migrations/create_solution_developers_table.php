<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionDevelopersTable extends Migration
{
    public function up()
    {
        Schema::create('solution_developers',function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('solution_id');
            $table->foreignUuid('developer_id');
            $table->enum('stages',['interest','reviewed','submitted','rejected','approved'])->default('interest');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solution_developers');
    }
}