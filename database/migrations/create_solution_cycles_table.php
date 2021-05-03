<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionCyclesTable extends Migration
{
    public function up()
    {
        Schema::create('solution_cycles',function (Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solution_cycles');
    }
}
