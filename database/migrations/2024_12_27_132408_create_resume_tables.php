<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeTables extends Migration
{
    public function up()
    {
        Schema::create('resume_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 255)->nullable();
            $table->string('url', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('resume_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')
                ->constrained('resume_companies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('job_title', 50);
            $table->string('description', 255)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('regency', 50)->nullable();
            $table->string('job_type', 20)->nullable();
            $table->string('location_type', 20)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('resume_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name', 50);
            $table->string('icon', 20)->nullable();
            $table->string('icon_color', 8)->nullable();
            $table->integer('rate')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resume_companies');
        Schema::dropIfExists('resume_experiences');
        Schema::dropIfExists('resume_skills');
    }
}
