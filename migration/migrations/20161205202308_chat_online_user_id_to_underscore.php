<?php

use Phinx\Migration\AbstractMigration;

class ChatOnlineUserIdToUnderscore extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `chat_online` CHANGE `userId` `user_id` INT(11) UNSIGNED NULL DEFAULT NULL;
        ");

        $this->query("
            ALTER TABLE `chat_online` ADD CONSTRAINT `chat.online.user_id.fk` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
        ");
    }
}
