<?php

use Phinx\Migration\AbstractMigration;

class PermissionGroupUser extends AbstractMigration
{
    public function up()
    {
        $this->query("ALTER TABLE permission_group_users DROP FOREIGN KEY permission_group_users_ibfk_1;");
        $this->query("ALTER TABLE permission_group_users DROP FOREIGN KEY permission_group_users_ibfk_2;");
        
        $this->query("ALTER TABLE `permission_group_users` CHANGE `groupId` `group_Id` INT(10) UNSIGNED NOT NULL; ");
        $this->query("ALTER TABLE `permission_group_users` CHANGE `userId` `user_id` INT(11) UNSIGNED NOT NULL; ");
        
        $this->query("ALTER TABLE `permission_group_users` ADD FOREIGN KEY (`group_Id`) REFERENCES `permission_group`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");
        $this->query("ALTER TABLE `permission_group_users` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT");
        
        $this->table('permission_group_users')->rename('permission_group_user');
    }
}
