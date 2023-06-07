<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
    $trigger = "
        CREATE TRIGGER insert_review_trigger
        AFTER INSERT ON detail_transaksis
        FOR EACH ROW
        BEGIN
          DECLARE v_users_id CHAR(8);
          DECLARE v_produks_id CHAR(6);

          -- Mendapatkan users_id dari tabel transaksis
          SELECT user_id INTO v_users_id
          FROM transaksis
          WHERE id = NEW.transaksis_id;

          -- Mendapatkan produk_id dari data yang baru dimasukkan ke detail_transaksi
          SET v_produks_id = NEW.produks_id;

          -- Memasukkan data ke dalam tabel reviews
          INSERT INTO reviews (users_id, produks_id)
          VALUES (v_users_id, v_produks_id);
        END;
    ";

    DB::unprepared($trigger);
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    $trigger = "DROP TRIGGER IF EXISTS insert_review_trigger";
    DB::unprepared($trigger);
}

};
