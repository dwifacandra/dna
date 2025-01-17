<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('url', 255)->nullable();
            $table->string('repository', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status', 10)->nullable();
            $table->string('priority', 10)->nullable();
            $table->decimal('budget', 10, 2)->nullable();
            $table->boolean('publish_to_portfolio')->default(false);
            $table->string('thumbnail', 255)->nullable();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('project_categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('project_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_categories');
    }
};
