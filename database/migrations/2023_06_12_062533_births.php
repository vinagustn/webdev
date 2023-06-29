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
        Schema::create('births', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kawin')->unsigned();
            $table->foreign('id_kawin')->references('id')
                    ->on('marriages')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->date('tgl_lahir');
            $table->integer('jml_anak');
            $table->text('id_anak');
            $table->text('gender_anak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('births');
    }
};
