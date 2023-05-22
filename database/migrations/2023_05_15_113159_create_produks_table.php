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
            $table->text('deskripsi');
            $table->string('foto');
            $table->bigInteger('harga');
            $table->integer('stok');
            $table->boolean('status')->nullable()->default(null);
            $table->integer('rate')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('deleted_at')->nullable()->useCurrentOnUpdate();
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
