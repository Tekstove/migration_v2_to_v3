<?php

use Phinx\Migration\AbstractMigration;

class ChatUserIdChange extends AbstractMigration
{
    public function up()
    {
        $this->query("ALTER TABLE `chat` CHANGE `username_id` `user_id` INT(11) UNSIGNED NULL DEFAULT NULL;");
    }
}
