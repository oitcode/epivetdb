<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_report', function (Blueprint $table) {
            $table->increments('disease_report_id');
            $table->date('date');

            /*
             * Local body to which this user belongs to.
             * This is the foreign key to local_body table.
             */
            $table->integer('local_body_id')->unsigned();

            /* Disease: foreign key */
            $table->integer('disease_id')->unsigned();
            /* Species (Animal): foreign key */
            $table->integer('animal_id')->unsigned();

            $table->integer('num_of_outbreaks')->unsigned();
            $table->integer('num_of_susceptible')->unsigned();
            $table->integer('num_of_affected')->unsigned();
            $table->integer('num_of_dead')->unsigned();
            $table->integer('num_of_vaccinated')->unsigned();
            $table->integer('num_of_treated')->unsigned();

            $table->integer('reg_vacc')->unsigned();
            $table->integer('outbreak_res_vacc')->unsigned();
            $table->integer('destroyed')->unsigned();

            $table->timestamps();

            /*
             * User who created this record. This is the foreign key to user
             * table.
             */
            $table->integer('creator_id')->unsigned();

            $table->string('comment')->nullable();
        });

        Schema::table('disease_report', function (Blueprint $table) {
            /* Add foreign key to local_body table. */
            $table->foreign('local_body_id', 'fk_disease_report_local_body')
                ->references('local_body_id')
                ->on('local_body');

            /* Add foreign key to animal table. */
            $table->foreign('animal_id', 'fk_disease_report_animal')
                ->references('animal_id')
                ->on('animal');

            /* Add foreign key to disease table. */
            $table->foreign('disease_id', 'fk_disease_report_disease')
                ->references('disease_id')
                ->on('disease');

            /* Add foreign key to user table. */
            $table->foreign('creator_id', 'fk_disease_report_user')
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
        /* Drop the foreign key constraints. */
        Schema::table('disease_report', function (Blueprint $table) {
            $table->dropForeign('fk_disease_report_local_body');
            $table->dropForeign('fk_disease_report_animal');
            $table->dropForeign('fk_disease_report_disease');
            $table->dropForeign('fk_disease_report_user');
        });

        /* Drop table. */
        Schema::dropIfExists('disease_report');
    }
}
