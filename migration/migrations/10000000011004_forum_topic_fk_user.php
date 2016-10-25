<?php

use Phinx\Migration\AbstractMigration;

class ForumTopicFkUser extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `forum_post` 
            ADD CONSTRAINT `fp_user_restriction` 
            FOREIGN KEY (`user_id`) 
            REFERENCES `user`(`id`) 
            ON DELETE RESTRICT 
            ON UPDATE RESTRICT;
        ");
    }
}
