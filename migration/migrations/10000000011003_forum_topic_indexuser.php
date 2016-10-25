<?php

use Phinx\Migration\AbstractMigration;

class ForumTopicIndexuser extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `forum_post` ADD INDEX(`user_id`);
        ");
    }
}
