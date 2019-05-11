<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddLbColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            /*
             * Local body to which this user belongs to.
             * This is the foreign key to state table.
             */
            $table->integer('local_body_id')->unsigned()->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            /* Add foreign key to local_body table. */
            $table->foreign('local_body_id', 'fk_user_local_body')
                ->references('local_body_id')
                ->on('local_body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Drop the foreign key constraint. */
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_user_local_body');
        });

        /* Drop column. */
        Schema::table('users', function (Blueprint $table) {
	          $table->dropColumn('local_body_id');
        });
    }
}
