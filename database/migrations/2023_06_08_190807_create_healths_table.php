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
        Schema::create('healths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ternak')->unsigned();
            $table->foreign('id_ternak')->references('id')
                    ->on('breedings')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->longText('diseas_hst');
            $table->longText('treat_hst');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healths');
    }
};
