<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('jabatan_id')->unsigned();
            $table->string('nama', 150);
            $table->string('nomor_telepon', 75);
            $table->string('email', 150)->unique();
            $table->text('alamat');
            $table->timestamps();

            $table
                ->foreign('jabatan_id')
                ->references('id')
                ->on('jabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
