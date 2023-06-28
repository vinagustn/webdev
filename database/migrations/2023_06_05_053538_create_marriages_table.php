<?php

use App\Enum\EStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marriages', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl_kawin');
            $table->integer('id_jantan')->unsigned();
            $table->integer('id_betina')->unsigned();
            $table->foreign('id_jantan')->references('id')
                    ->on('breedings')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('id_betina')->references('id')
                    ->on('breedings')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('status');
            $table->date('tgl_proses')->nullable();
            $table->date('tgl_hamil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriages');
    }
};
