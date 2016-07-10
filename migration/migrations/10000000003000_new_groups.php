<?php

use Phinx\Migration\AbstractMigration;

class NewGroups extends AbstractMigration
{
    public function up()
    {
        $this->query("INSERT INTO `permission_group` (`id`, `name`, `image`) VALUES ('12', 'Може да слага линкове за сваляне на песни', ''); ");
        $this->query("INSERT INTO `permission` (`id`, `name`, `value`) VALUES ('14', 'lyric_download', '1'); ");
        $this->query("INSERT INTO `permission_group_permission` (`group_id`, `permission_id`) VALUES ('12', '14');");
        $this->query("INSERT INTO `permission_group_user` (`group_Id`, `user_id`) VALUES ('12', '54');");
    }
}
