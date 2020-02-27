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
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('industry_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('specification');
            $table->integer('vacancy');
            $table->string('location');
            $table->enum('job_level', array('Internship', 'Fresher', 'Mid Level', 'Senior Level'));
            $table->enum('job_type', array('Freelance', 'Contract', 'Part Time', 'Full Time'));
            $table->enum('salary_type', array('Negotiable', 'Fixed', 'Range'));
            $table->float('min_salary');
            $table->float('max_salary')->nullable();
            $table->dateTime('deadline');
            $table->string('education');
            $table->enum('experience', array('Not Required', 'Less than 1 year', 'More than or equals to 1 years', 'More than or equals to 3 years', 'More than or equals to 5 years'));
            $table->enum('status', array('Active', 'Inactive'))->default('Active');
            $table->integer('view')->default(0);
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
