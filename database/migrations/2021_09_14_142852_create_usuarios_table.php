<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usu_id');
            $table->string('usu_pnombre',50)->nullable();
            $table->string('usu_snombre',50)->nullable();
            $table->string('usu_papellido',50)->nullable();
            $table->string('usu_sapellido',50)->nullable();
            $table->string('usu_correo',120)->unique();
            $table->string('usu_telefono',15)->nullable();
            $table->string('usu_contrasena');
            $table->integer('usu_estado')->nullable();
            $table->timestamp('usu_fcreado')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('usu_foto',200)->nullable();
            $table->string('usu_sexo',20)->nullable();
            $table->string('usu_tipo',3);
            $table->integer('usu_company')->nullable();
            $table->integer('usu_role')->nullable();
            $table->datetime('usu_vence')->nullable();
            $table->integer('usu_master')->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
