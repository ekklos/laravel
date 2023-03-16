<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**b
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
	Schema::create('users', function (Blueprint $table) {
        // membuat tabel users dengan $table
		$table->id();// membuat id (kolom)
		$table->string('name');// membuat name (kolom)
		$table->string('email')->unique();// membuat email, tidak boleh sama dengan data email lain di database (kolom)
		$table->string('password');// membuat password (kolom)
		$table->timestamps();// membuat timestamps (kolom)
	});
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        // menghapus data dari tabel users jika kolom nama ada yang sama
    }
};
