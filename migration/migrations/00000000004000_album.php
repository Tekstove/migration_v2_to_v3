<?php

use Phinx\Migration\AbstractMigration;

class Album extends AbstractMigration
{
    public function change()
    {
        $this->table('albums')->rename('album');
        $this->query("
            ALTER TABLE `album` CHANGE `up_id` `user_id` INT(11) UNSIGNED NOT NULL; 
        ");
    }
}
