<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_historials', function (Blueprint $table) {
            $table->id();
            $table->decimal('temperatura_cent', 4, 2);
            $table->decimal('peso_gramos', 8, 2);
            $table->string('sintomas', 500);
            $table->string('diagnostico', 200);
            $table->unsignedBigInteger('mascota_id');
            $table->foreign('mascota_id')
                    ->references('id')
                    ->on('mascotas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')
                    ->references('id')
                    ->on('servicios')
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
        Schema::dropIfExists('detalle_historials');
    }
}
