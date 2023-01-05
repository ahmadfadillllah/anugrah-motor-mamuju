<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databarang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenisbarang_id')->constrained('jenisbarang')->cascadeOnDelete();
            $table->foreignId('satuanbarang_id')->constrained('satuanbarang')->cascadeOnDelete();
            $table->string('nama');
            $table->integer('stok');
            $table->string('status');
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
        Schema::dropIfExists('databarang');
    }
}
