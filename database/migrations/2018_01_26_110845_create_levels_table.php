<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string("intitule")->unique();
            $table->text("description")->nullable();
            $table->boolean("diplome")->default(false);
            $table->boolean("confirmed")->default(false);
            $table->timestamps();
        });

        // ici on ajoute la clé etrangère de la categorie 
        Schema::table("levels", function(Blueprint $table){
            $table->integer("etude_id")->after('confirmed')->unsigned()->index();
            $table->foreign("etude_id")->references("id")->on("etudes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');

        // permet de supprimer la clé etrangère 
        Schema::table("levels", function(Blueprint $table){
            $table->dropForeign("levels_etude_id_foreign");
           
        });
    }
}
