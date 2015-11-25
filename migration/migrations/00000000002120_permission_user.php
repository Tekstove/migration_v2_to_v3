<?php

use Phinx\Migration\AbstractMigration;

class PermissionUser extends AbstractMigration
{
    public function up()
    {
        $this->query("RENAME TABLE `permission_users` TO `permission_user`");
        $this->query("ALTER TABLE permission_user DROP FOREIGN KEY permission_user_ibfk_2;");
        $this->query("ALTER TABLE permission_user DROP FOREIGN KEY permission_user_ibfk_1");
        echo "FKs removed\n";
        $this->query("ALTER TABLE `permission_user` CHANGE `permissionId` `permission_id` INT(10) UNSIGNED NOT NULL;");
        $this->query("ALTER TABLE `permission_user` CHANGE `userId` `user_id` INT(10) UNSIGNED NOT NULL; ");
        
        $this->query("ALTER TABLE `permission_user` ADD FOREIGN KEY (`permission_id`) REFERENCES `permission`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT");
        $this->query("ALTER TABLE `permission_user` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT");
    }
}
