<?php

use App\Models\Menu;
use App\Models\Page;
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
    public function up(): void
    {
        Schema::create('menu_manager', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Menu::class)->nullable()->constrained();
            $table->foreignIdFor(Page::class)->nullable()->constrained();
            $table->foreignId('parent_id')->nullable()->constrained('menu_manager')->cascadeOnDelete();
            $table->integer('sort_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
     {
         Schema::dropIfExists('menu_manager');
     }
};
