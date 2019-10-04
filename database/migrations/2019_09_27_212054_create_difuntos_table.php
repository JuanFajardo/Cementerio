<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDifuntosTable extends Migration{
    public function up()
    {
        Schema::create('difuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registro_civil')->nullable();
            $table->string('boleta_entierro')->nullable();
            $table->string('certificado_defuncion')->nullable();

            $table->string('nombre')->nullable();
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('esposo')->nullable();
            $table->string('inicial_nombre')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_fallecimiento')->nullable();
            $table->string('hora_fallecimiento')->comment('03:00 pm.')->nullable();

            $table->string('diagnostico')->nullable();
            $table->string('medico')->nullable();
            $table->integer('edad')->nullable();
            $table->string('sexo')->comment('Masculino/Femenino')->nullable();
            //$table->string('diacnostico');
            $table->string('estado_civil')->comment('soltero/casado/viudo/etc')->nullable();

            $table->string('religion')->nullable();
            $table->string('profesion')->nullable();
            $table->string('lugar_procedencia')->comment('NATURAL')->nullable();
            $table->string('hijo')->comment('Legitimos/Natural')->nullable();
            $table->string('padre')->comment('Nombre Apellido')->nullable();
            $table->string('madre')->comment('Nombre Apellido')->nullable();
            $table->string('conyuge')->comment('Nombre Apellido')->nullable();
            $table->string('senas_particulares')->comment('SEÑAS PARTICULARES Datos personales')->nullable();
            $table->string('ultimo_domicilio')->nullable()->nullable();

            $table->string('direccion')->comment('Calle')->nullable();
            $table->string('fecha_registro')->nullable();

            $table->string('nacionalidad')->nullable();
            $table->string('departamento')->nullable();
            $table->string('provincia')->nullable();
            $table->string('localidad')->nullable();
            $table->string('libro')->nullable();
            $table->string('folio')->nullable();
            $table->string('partida')->nullable();
            $table->string('distrito')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('difuntos');
    }
}
