<?php

use Phinx\Migration\AbstractMigration;

class ChatOnlineUserid extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE chat_online DROP FOREIGN KEY chat_online_ibfk_1;`
        ");
    }
}
