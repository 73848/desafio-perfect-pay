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
    {     // essa tabela vai ser o pivô entre a tabela table e a tabela cliente, pois eles tem um relacionamento 
        // many-to-many
        Schema::create('sales_client', function (Blueprint $table){
            $table->foreignId('product_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->integer('quantity');
            $table->integer('discount');
            $table->string('status');
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
        //
    }
};
