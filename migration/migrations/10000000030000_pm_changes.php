<?php

use Phinx\Migration\AbstractMigration;

class PmChanges extends AbstractMigration
{
    public function up()
    {
        $this->query("ALTER TABLE `pm` ENGINE=INNODB");
        $this->query("
            ALTER TABLE `pm` CHANGE `za` `user_to` INT(11) UNSIGNED NOT NULL;
        ");
        
        $this->query("
            ALTER TABLE `pm` CHANGE `ot` `user_from` INT(11) UNSIGNED NOT NULL;
        ");
    }
}
