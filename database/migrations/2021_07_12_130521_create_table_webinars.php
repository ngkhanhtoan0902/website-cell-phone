<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWebinars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('url');
            $table->string('thumbnail');
            $table->tinyInteger('status')->default(1);
            $table->integer('orders')->default(0);
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
        Schema::dropIfExists('webinars');
    }
}
