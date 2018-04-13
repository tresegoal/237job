<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('email')->unique();
            $table->string('email1')->unique()->nullable();
            $table->bigInteger('telephone')->unique();
            $table->bigInteger('telephone1')->unique()->nullable();
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

         // ici on ajoute la clé etrangère du user 
        Schema::table("entreprises", function(Blueprint $table){
            $table->integer("user_id")->unsigned()->index();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });

         // ici on ajoute la clé etrangère du secteur 
        Schema::table("entreprises", function(Blueprint $table){
            $table->integer("secteur_id")->unsigned()->index();
            $table->foreign("secteur_id")->references("id")->on("secteurs")->onDelete("cascade");
        });
        
         // ici on ajoute la clé etrangère de la ville 
        Schema::table("entreprises", function(Blueprint $table){
            $table->integer("ville_id")->unsigned()->index();
            $table->foreign("ville_id")->references("id")->on("villes")->onDelete("cascade");
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');

        // permet de supprimer la clé etrangère 
        Schema::table("entreprises", function(Blueprint $table){
            $table->dropForeign("entreprises_user_id_foreign");
            $table->dropForeign("entreprises_secteur_id_foreign");
            $table->dropForeign("entreprises_ville_id_foreign");
        });
    }
}
