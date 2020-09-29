<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarCamposUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('lastname');
            $table->string('cedula',10)->unique();
            $table->string('telefono',10);
            $table->string('carrera');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('lastname');
        $table->dropColumn('cedula');
        $table->dropColumn('telefono');
        $table->dropColumn('carrera');
    }
}
