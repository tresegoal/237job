<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('prenom')->after('name')->nullable();
            $table->bigInteger('telephone')->after('email')->unique();
            $table->string('avatar')->after('id')->nullable();
            $table->boolean('active')->after('password')->default(false);
            $table->string('type')->after('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['prenom','telephone','avatar','active','type']);
        });
    }
}
