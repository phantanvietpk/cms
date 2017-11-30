<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group_permission', function (Blueprint $table) {
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('permission_id');
            $table->primary(['group_id', 'permission_id']);

            $table->foreign('group_id')
                ->references('id')
                ->on('user_groups')
                ->onDelete('CASCADE');
            $table->foreign('permission_id')
                ->references('id')
                ->on('user_permissions')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_group_permission');
    }
}
