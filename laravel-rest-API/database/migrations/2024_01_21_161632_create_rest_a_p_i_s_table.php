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
        Schema::create('rest_a_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last');
            $table->string('email');
            $table->string('contact', 255);
            $table->integer('age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rest_a_p_i_s');
    }
};
