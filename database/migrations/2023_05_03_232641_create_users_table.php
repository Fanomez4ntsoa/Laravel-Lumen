<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('User_Id');
            $table->string('Login')->unique();
            $table->string('password');
            $table->string('FirstName');
            $table->string('LastName');
            $table->timestamp('Valid_From')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('Valid_Till')->nullable();
            $table->tinyInteger('isValid');
            $table->string('Token')->nullable();
            $table->integer('Group_Id')->nullable();
            $table->timestamp('Token_Valid_From')->nullable();
            $table->timestamp('Token_Valid_Till')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
