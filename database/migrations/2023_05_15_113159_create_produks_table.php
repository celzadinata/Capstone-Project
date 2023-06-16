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
        Schema::create('produks', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->enum('jenis', ['paket_usaha', 'supply']);
            $table->string('nama_produk');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->bigInteger('harga');
            $table->integer('stok');
            $table->string('berkas_1')->nullable();
            $table->string('berkas_2')->nullable();
            $table->string('berkas_3')->nullable();
            $table->enum('status', ['Konfirmasi', 'Belum Konfirmasi'])->nullable();
            $table->boolean('tampilkan')->nullable()->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
