<?php

use Phinx\Migration\AbstractMigration;

class PermissionLyricAll extends AbstractMigration
{
    public function up()
    {
        $this->query("
            INSERT INTO `permission` (`id`, `name`, `value`) VALUES ('17', 'lyric.edit.basic', '1');
        ");
        
        $this->query("
            INSERT INTO `permission_group` (`id`, `name`, `image`) VALUES ('15', 'Може да редактира чужди текстове', '');
        ");
        
        
        $this->query("
            INSERT INTO permission_group_permission (group_id, permission_id) VALUES(15, 17)
        ");
        
        $this->query("
            INSERT INTO permission_group_user (group_Id, user_id) VALUES(15, 54)
        ");
    }
}
