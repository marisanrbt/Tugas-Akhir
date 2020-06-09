<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loanings', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nama');
                $table->string('username');
                $table->char('nim', 9);
                $table->string('judul_buku');
                $table->string('nama_penerbit');
                $table->date('tgl_pinjam');
                $table->date('tgl_kembali')->nullable();
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
        Schema::dropIfExists('loanings');
    }
}
