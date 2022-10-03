<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserCreatedIdCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            if(Schema::hasColumn('categories','user_created_id')){
                $table->renameColumn('user_created_id', 'categorizable_id');
            }

            if (Schema::hasColumn('categories', 'user_created_table')) {
                $table->dropColumn('user_created_table');
            }

            if (!Schema::hasColumn('categories','categorizable_type')){
                $table->string('categorizable_type')->comment('bảng người tạo');
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
        Schema::table('categories', function (Blueprint $table) {
            if(Schema::hasColumn('categories','postable_id')){
                $table->renameColumn('postable_id', 'user_id');
            }

            if(Schema::hasColumn('categories','postable_type')){
                Schema::dropColumns('posts', 'postable_type');
            }

            if (!Schema::hasColumn('categories', 'user_created_table')) {
                $table->integer('user_created_table')->nullable()->comment('bảng người tạo, 1 là admin, 0 là nhà tuyển dụng');
            }
        });
    }
}
