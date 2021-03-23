<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->text('description');
            $table->string('slug', 200);
            $table->string('min_salary')->nullable();
            $table->string('max_salary')->nullable();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->integer('opening');
            $table->string('banner')->nullable();

            $table->foreignId('industry_id');
            $table->foreignId('company_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
