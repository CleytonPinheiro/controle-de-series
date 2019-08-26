<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaCampoAssistido extends Migration{
    public function up()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table
                ->boolean('assistido')
                ->default(false);
        });
    }

    public function down()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table->dropColumn('assistido');
        });
    }
}
