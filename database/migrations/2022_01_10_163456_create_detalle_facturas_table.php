<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')
            ->nullable() //--permite valores nulos
            ->constrained('facturas')
            ->cascadeOnUpdate()
            ->nullOnDelete();
           
            $table->foreignId('servicio_id')
            ->nullable() //--permite valores nulos
            ->constrained('servicios')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->float('precio');
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
        Schema::dropIfExists('detalle_facturas');
    }
}
