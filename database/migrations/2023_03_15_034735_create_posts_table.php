<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('file');
            $table->string('file_mentah')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('resolution')->nullable();
            $table->string('q720p')->nullable();
            $table->string('q480p')->nullable();
            $table->string('q360p')->nullable();
            // $table->string('linkyt')->nullable();
            $table->string('body');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
