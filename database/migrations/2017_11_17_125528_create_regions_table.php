<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique();
            $table->text("description")->nullable();
            $table->boolean("confirmed")->default(false);
            $table->timestamps();
        });

        // ici on ajoute la clé etrangère du pays 
        Schema::table("regions", function(Blueprint $table){
            $table->integer("country_id")->unsigned()->index();
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
        // permet de supprimer la clé etrangère 
        Schema::table("regions", function(Blueprint $table){
            $table->dropForeign("regions_country_id_foreign");
        });

        Schema::dropIfExists('regions');
    }
}
