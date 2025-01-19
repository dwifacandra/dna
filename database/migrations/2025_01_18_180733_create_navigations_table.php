<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('url');
            $table->string('icon')->nullable();
            $table->string('icon_position')->default('start');
            $table->string('position')->default('topbar');
            $table->boolean('icon_only')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navigations');
    }
}
