<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name');
            $table->date('birthdate')->after('last_name');
            $table->string('address')->after('password');
            $table->string('country')->after('address');
            $table->string('avatar')->after('country');
            $table->string('suscription')->after('avatar');
            $table->string('terms')->after('suscription');
            $table->bigInteger('role_id')->unsigned();

            $table->foreign('role_id')->references('id')->on('roles');
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
            $table->dropColumn(['last_name', 'birthdate', 'address', 'country', 'avata', 'suscription', 'terms']);
        });
    }
}
