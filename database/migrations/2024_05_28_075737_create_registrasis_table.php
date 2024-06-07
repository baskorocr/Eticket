<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasisTable extends Migration
{
    public function up()
    {
        Schema::create('registrasis', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->unsignedBigInteger('NPK');
            $table->string('Nomer', 14);
            $table->string('Bersedia', 10);
            $table->integer('Tambahan');
            $table->timestamps();
            $table->string('Barcode')->nullable();

            // Define foreign key constraint
            $table->foreign('NPK')
                ->references('NPK')
                ->on('karyawan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrasis');
    }
}