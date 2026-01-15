<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auth_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('auth_id')->default(0)->comment('user.id');
            $table->string('account_id', 150)->default('')->comment('login account id');
            $table->tinyInteger('type')->default(0)->comment('type: [1:email]');
            $table->tinyInteger('status')->default(0)->comment('status: [1:active, 2:inactive]');
            $table->string('password', 255)->default('')->comment('password');
            $table->unsignedBigInteger('created_at')->default(0);
            $table->unsignedBigInteger('updated_at')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_accounts');
    }
};
