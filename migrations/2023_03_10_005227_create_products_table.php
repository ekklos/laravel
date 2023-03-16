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
    // fungsi up dipublikasikan
{
	Schema::create('products', function (Blueprint $table) {
        // membuat tabel products dengan $table        
		$table->id();//membuat id (kolom)
		$table->string('namaproduk');// membuat namaproduk (kolom)
		$table->string('deskripsi');// membuat deksripsi (kolom)
		$table->integer('harga');// membuat harga (kolom)
		$table->string('gambar');// membuat gambar (kolom)
		$table->timestamps();//membuat timetamps
	});
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        // hapus bila kolom ada yang sama
    }
};
