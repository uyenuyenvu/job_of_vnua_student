<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnUserInPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if(Schema::hasColumn('posts','user_id')){
                $table->dropColumn('user_id');
            }
            if(Schema::hasColumn('posts','user_table')){
                $table->dropColumn('user_table');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            if(!Schema::hasColumn('posts','user_id')) {
                $table->integer('user_id');
                $table->integer('user_table');
            }
        });
    }
}
