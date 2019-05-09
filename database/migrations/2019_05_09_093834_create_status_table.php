<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();

            /*
             * User who created this record. This is the foreign key to user
             * table.
             */
            $table->integer('creator_id')->unsigned();

            $table->string('comment', 255)->nullable();
        });

        Schema::table('status', function (Blueprint $table) {
            /* Add foreign key to user table. */
            $table->foreign('creator_id', 'fk_status_user')
                ->references('id')
                ->on('users');
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
        Schema::table('status', function (Blueprint $table) {
            $table->dropForeign('fk_status_user');
        });

        /* Drop the table. */
        Schema::dropIfExists('status');
    }
}
