<?php

use Phinx\Migration\AbstractMigration;

class LyricPermissionDelete extends AbstractMigration
{
    public function up()
    {
        $this->query("
            INSERT INTO `permission` (`id`, `name`, `value`)
            VALUES ('16', 'lyric.edit.delete', '1');
        ");
        
        $this->query("
            INSERT INTO `permission_group` (`id`, `name`, `image`)
            VALUES ('14', 'Може да изтрива песни', '');
        ");
        
        $this->query("INSERT INTO `permission_group_permission` (`group_id`, `permission_id`) VALUES ('14', '16');");
        
        // insert po_taka to the list
        $this->query("INSERT INTO permission_group_user(group_id, user_id) VALUES(14, 54)");
    }
}
