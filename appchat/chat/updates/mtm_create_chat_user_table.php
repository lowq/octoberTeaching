<?php

namespace AppChat\Chat\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * ChatUser Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('appchat_chat_chat_user', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('appchat_chat_chats_id')->unsigned();
            $table->foreignId('appuser_user_users_id')->unsigned();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('appchat_chat_chat_user');
    }
};
