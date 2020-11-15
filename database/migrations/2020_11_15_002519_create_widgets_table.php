<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetsTable extends Migration
{
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('description', 100)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
