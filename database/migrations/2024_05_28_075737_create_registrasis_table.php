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
            $table->integer('hadir')->default(0);

            // Define foreign key constraint
            $table->foreign('NPK')
                ->references('NPK')
                ->on('karyawans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrasis');
    }
}