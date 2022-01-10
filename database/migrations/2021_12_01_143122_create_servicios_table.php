<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->String('nombre', 100);
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')
                ->references('id')
                ->on('tipos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->String('personal',45);
            $table->decimal('costo', 6, 2);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('mascota_id');
            $table->foreign('mascota_id')
                ->references('id')
                ->on('mascotas')
                ->onDelete('cascade')
                ->onUpdate('cascade'); 
            $table->unsignedBigInteger('jaula_id')->nullable();
            $table->foreign('jaula_id')
                ->references('id')
                ->on('jaulas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('servicios');
    }
}
