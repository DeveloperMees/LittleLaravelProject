<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iphones', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->decimal('price');
            $table->string('file_path');
            $table->string('message');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iphone_id')
                ->references('id')
                ->on('iphones')
                ->onDelete('cascade');
            $table->string('file_path');
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
        Schema::dropIfExists('iphones');
    }
}
