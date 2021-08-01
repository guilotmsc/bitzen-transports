<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_supplies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('driver_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('car_id')
                ->constrained()
                ->onDelete('cascade');
            $table->date('date');
            $table->string('fuel_type');
            $table->float('quantity_supplied');
            $table->float('total_supplied');

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
        Schema::dropIfExists('fuel_supplies');
    }
}
