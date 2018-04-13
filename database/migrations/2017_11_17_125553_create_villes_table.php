<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique();
            $table->text("description")->nullable();
            $table->boolean("confirmed")->default(false);
            $table->timestamps();
        });

        // on ajouter la clé etrangère region_id
        Schema::table("villes", function(Blueprint $table){
            $table->integer("region_id")->unsigned()->index();
            $table->foreign("region_id")->references("id")->on("regions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // permet de supprimer la clée etrangère
        Schema::table("villes", function(Blueprint $table){
            $table->dropForeign("villes_region_id_foreign");
        });

        Schema::dropIfExists('villes');
    }
}
