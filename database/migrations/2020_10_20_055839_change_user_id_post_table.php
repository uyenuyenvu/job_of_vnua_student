<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserIdPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if(Schema::hasColumn('posts','user_created_id')){
                $table->renameColumn('user_created_id', 'postable_id');
            }

            if(Schema::hasColumn('posts','user_table')){
                Schema::dropColumns('posts','user_created_table');
            }

            if(!Schema::hasColumn('posts','postable_type')){
                $table->string('postable_type')->comment('bảng người tạo');
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
            if(Schema::hasColumn('posts','postable_id')){
                $table->renameColumn('postable_id', 'user_created_id');
            }

            if(Schema::hasColumn('posts','postable_type')){
                Schema::dropColumns('posts', 'postable_type');
            }
            if (!Schema::hasColumn('posts','user_created_table')){
                $table->tinyInteger('user_created_table')->default(0)->comment('bảng người tạo 0: admin; 1:employer');
            }
        });
    }
}
