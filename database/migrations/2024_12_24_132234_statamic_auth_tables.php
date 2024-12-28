<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatamicAuthTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->after('name')->nullable();
            $table->json('preferences')->after('remember_token')->nullable();
            $table->timestamp('last_login')->after('remember_token')->nullable();
            $table->boolean('super')->after('remember_token')->default(false);
            $table->string('password')->nullable()->change();
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('role_id');
        });

        Schema::create('group_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('group_id');
        });

        Schema::create('password_activation_tokens', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['super', 'avatar', 'preferences', 'last_login']);
            $table->string('password')->nullable(false)->change();
        });

        Schema::dropIfExists('role_user');
        Schema::dropIfExists('group_user');

        Schema::dropIfExists('password_activation_tokens');
    }
}
