<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSitewebAndNbreEmployeToEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entreprises', function(Blueprint $table){
            $table->string('siteweb')->after('telephone1')->unique()->nullable();
            $table->integer('nbreEmploye')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->dropColumn("siteweb");
            $table->dropColumn("nbreEmploye");
        });
    }
}
