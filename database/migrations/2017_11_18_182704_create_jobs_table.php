<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titre")->unique();
            $table->text("description");
            $table->boolean("confirmed")->default(false);
            $table->timestamps();
        });

        // ici on ajoute la clé etrangère de la categorie 
        Schema::table("jobs", function(Blueprint $table){
            $table->integer("category_id")->unsigned()->index();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
        });

        // ici on ajoute la clé etrangère de le type 
        Schema::table("jobs", function(Blueprint $table){
            $table->integer("type_id")->unsigned()->index();
            $table->foreign("type_id")->references("id")->on("types")->onDelete("cascade");
        });

        // ici on ajoute la clé etrangère de la ville 
        Schema::table("jobs", function(Blueprint $table){
            $table->integer("ville_id")->unsigned()->index();
            $table->foreign("ville_id")->references("id")->on("villes")->onDelete("cascade");
        });

        // ici on ajoute la clé etrangère de le salaire 
        Schema::table("jobs", function(Blueprint $table){
            $table->integer("salaire_id")->unsigned()->index();
            $table->foreign("salaire_id")->references("id")->on("salaires")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');

        // permet de supprimer la clé etrangère 
        Schema::table("jobs", function(Blueprint $table){
            $table->dropForeign("jobs_category_id_foreign");
            $table->dropForeign("jobs_type_id_foreign");
            $table->dropForeign("jobs_ville_id_foreign");
            $table->dropForeign("jobs_salaire_id_foreign");
        });
    }
}
