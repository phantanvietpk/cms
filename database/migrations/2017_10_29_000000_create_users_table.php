<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();

            $table->string('username')->index()->unique();
            $table->string('password')->nullable();

            $table->string('photo_path')->nullable();

            $table->boolean('is_activated')->nullable()->default(false);
            $table->boolean('is_super_admin')->nullable()->default(false);
            $table->unsignedInteger('user_group_id')->nullable()->index();
            $table->foreign('user_group_id')
                ->references('id')
                ->on('user_groups')
                ->onDelete('SET NULL');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
