<?php

use App\Models\Book;
use App\Models\Movie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('reviewable_type')->nullable();
            $table->foreignIdFor(Movie::class)->nullable()->constrained();
            $table->foreignIdFor(Book::class)->nullable()->constrained();
            $table->text('title');
            $table->string('slug')->nullable();
            $table->integer('score');
            $table->text('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->date('published_at')->nullable();
            $table->boolean('is_published')->default(false);
            $table->json('blocks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
