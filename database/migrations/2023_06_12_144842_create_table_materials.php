<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('category_id');
			$table->string('title');
			$table->string('slug');
			$table->string('description')->nullable();
			$table->text('content')->nullable();
			$table->text('thumbnail')->nullable();
			$table->text('graphic')->nullable();
			$table->text('url')->nullable();
			$table->text('form_submit')->nullable();
			$table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('materials');
    }
}
