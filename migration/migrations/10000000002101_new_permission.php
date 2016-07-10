<?php

use Phinx\Migration\AbstractMigration;

class NewPermission extends AbstractMigration
{
    public function up()
    {
        $this->query("
            INSERT INTO `permission` (`id`, `name`, `value`) VALUES ('13', 'lyric_edit', '1'); 
        ");
    }
}
