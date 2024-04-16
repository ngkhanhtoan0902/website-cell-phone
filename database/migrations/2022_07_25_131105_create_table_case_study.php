<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCaseStudy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_study', function (Blueprint $table) {
            $table->id();
			$table->string('title');
            $table->string('slug');
            $table->text('thumbnail')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('content');
			$table->string('name')->nullable();
			$table->string('job_title')->nullable();
			$table->string('summary')->nullable();
			$table->text('avatar')->nullable();
			$table->string('logo')->nullable();
			$table->string('color_background', 20)->nullable();
            $table->text('tags')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('case_study');
    }
}
