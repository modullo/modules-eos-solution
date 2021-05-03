<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('solutions', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug');
            $table->string('image_url')->nullable();
            $table->mediumText('description');
            $table->text('what_you_need_to_build');
            $table->boolean('published')->default(0);
            $table->enum('solicitation_type',['solicited','unsolicited']);
            $table->timestamp('submission_deadline');
            $table->foreignUuid('solution_cycle_id');
            $table->string('frd')->nullable();
            $table->timestamp('frd_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}