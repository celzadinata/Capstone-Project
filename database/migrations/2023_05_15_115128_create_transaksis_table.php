<?php

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
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->dateTime('tanggal');
            $table->bigInteger('total');
            $table->enum('status', ['Menunggu Pembayaran', 'Pembayaran Diterima', 'Pesanan Diproses', 'Pesanan Dikirim', 'Selesai'])->default('Menunggu Pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
