<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('thumbnail')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->string('meta_description')->nullable();
            $table->text('content');
            $table->text('tag')->nullable();
            $table->string('language')->default('vi');
            $table->integer('featured')->default(0);
            $table->integer('status')->default(1);
            $table->integer('orders')->default(0);
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
