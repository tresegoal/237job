<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->increments('id');
            $table->string("etablissement");
            $table->string("debut");
            $table->string("fin");
            $table->string("specialite");
            $table->string("mention");
            $table->timestamps();
        });

        // ici on ajoute la clé etrangère de la categorie 
        Schema::table("formations", function(Blueprint $table){
            $table->integer("etude_id")->after('mention')->unsigned()->index();
            $table->foreign("etude_id")->references("id")->on("etudes")->onDelete("cascade");
        });

        // ici on ajoute la clé etrangère de la categorie 
        Schema::table("formations", function(Blueprint $table){
            $table->integer("level_id")->after('etude_id')->unsigned()->index();
            $table->foreign("level_id")->references("id")->on("levels")->onDelete("cascade");
        });

        // ici on ajoute la clé etrangère de la categorie 
        Schema::table("formations", function(Blueprint $table){
            $table->integer("country_id")->after('level_id')->unsigned()->index();
            $table->foreign("country_id")->references("id")->on("countries")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations');

        // permet de supprimer la clé etrangère 
        Schema::table("formations", function(Blueprint $table){
            $table->dropForeign("formations_etude_id_foreign");
            $table->dropForeign("formations_level_id_foreign");
            $table->dropForeign("formations_country_id_foreign");
        });
    }
}
