<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenderlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venderlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shopName', 200)->nullable()->unique();
            $table->string('email', 200)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('gst', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('type',10)->nullable();
            $table->integer('userId')->nullable();
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
        Schema::dropIfExists('venderlists');
    }
}
