<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_menu', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name',20);
            $table->string('url',20);
            $table->string('icon',20);
            $table->uuid('child')->nullable();
            $table->boolean('aktif');
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
        Schema::dropIfExists('mst_menu');
    }
}
