<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContenuElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenu_elements', function (Blueprint $table) {
            $table->increments('id_contenu_element');
            $table->string('titre_element')->nullable();
            $table->text('contenu_element')->nullable();
            $table->string('lien_next')->nullable();
            $table->integer('id_image')->nullable();
            $table->integer('id_element');
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
        Schema::dropIfExists('contenu_elements');
    }
}
