<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('receptes', function (Blueprint $table) {
            $table->id();
            $table->string('pacvards');
            $table->string('zalnos');
            $table->integer('zaldaudz');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receptes');
    }
};
