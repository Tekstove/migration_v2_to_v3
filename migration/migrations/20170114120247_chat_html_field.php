<?php

use Phinx\Migration\AbstractMigration;

class ChatHtmlField extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            ALTER TABLE `chat` ADD `message_html` TEXT NOT NULL AFTER `message`;
        ");
    }
}
