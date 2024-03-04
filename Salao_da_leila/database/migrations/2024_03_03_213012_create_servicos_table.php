<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('value', 10, 2);
            $table->timestamps();
        });

        // Inserir o serviço "Corte de Cabelo" com valor R$ 50
        DB::table('servicos')->insert([
            'name' => 'Corte de Cabelo',
            'value' => 50.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('servicos')->insert([
            'name' => 'Manicure',
            'value' => 25.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('servicos')->insert([
            'name' => 'Pedicure',
            'value' => 30.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
}
