<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('con_id');
            $table->string('con_nombre',200)->nullable();
            $table->string('con_direccion',200)->nullable();
            $table->integer('con_distrito')->nullable();
            $table->integer('con_canton')->nullable();
            $table->integer('con_provincia')->nullable();
            $table->string('con_pais',45)->nullable()->default('CR');           
            $table->string('con_telefono1',15)->nullable();
            $table->string('con_telefono2',15)->nullable();
            $table->string('con_correo1',120)->nullable();
            $table->string('con_correo2',120)->nullable();
            $table->string('con_website',120)->nullable();
            $table->string('con_facebook',120)->nullable();            
            $table->text('con_notas')->nullable();
            $table->integer('con_estado')->nullable();
            $table->timestamp('con_creado')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));            
            $table->datetime('con_vencimiento')->nullable();
            $table->string('con_categoria',150)->nullable();
            $table->string('con_logo',255)->nullable();
            $table->integer('con_usu_id')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
