<?php

use Phinx\Migration\AbstractMigration;

class PermissionNameChanges extends AbstractMigration
{
    public function up()
    {
        $this->query("
            UPDATE
                permission
            SET
                `name` = REPLACE(`name`, '_', '.')
        ");
        
        $this->query("
            INSERT INTO `permission` (`id`, `name`, `value`)
            VALUES ('15', 'lyric.edit.video', '1');
        ");
        
        $this->query("
            INSERT INTO `permission_group` (`id`, `name`, `image`) VALUES ('13', 'Може да сменя видеа', '');
        ");
        
        $this->query("INSERT INTO `permission_group_permission` (`group_id`, `permission_id`) VALUES ('13', '15');");
    }
}
