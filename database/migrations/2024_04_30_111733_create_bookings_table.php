<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('no_telepon');
            $table->date('tanggal_perjalanan');
            $table->smallInteger('jumlah_peserta');
            $table->boolean('penginapan');
            $table->boolean('transportasi');
            $table->boolean('makanan');
            $table->integer('harga_paket_perjalanan');
            $table->integer('total_tagihan');
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
        Schema::dropIfExists('bookings');
    }
}
