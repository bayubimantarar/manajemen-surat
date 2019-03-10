<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('jabatan_id'); // tujuan surat masuk
            $table->bigInteger('pengguna_id'); // tujuan surat masuk
            $table->string('nomor', 75); // nomor surat masuk
            $table->string('asal', 75); // asal surat masuk
            $table->string('perihal', 150); // perihal surat masuk
            $table->date('tanggal_terima'); // tanggal terima surat masuk
            $table->string('lampiran', 150)->nullable(); // lampiran surat masuk
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
        Schema::dropIfExists('surat_masuk');
    }
}
