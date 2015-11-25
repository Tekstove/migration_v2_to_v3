<?php

use Phinx\Migration\AbstractMigration;

class PermissionGroupPermission extends AbstractMigration
{
    public function up()
    {
        $this->query("RENAME TABLE `permission_group_permissions` TO `permission_group_permission`");
        $this->query("ALTER TABLE permission_group_permission DROP FOREIGN KEY permission_group_permission_ibfk_1");
        $this->query("ALTER TABLE permission_group_permission DROP FOREIGN KEY permission_group_permission_ibfk_2");
        
        $this->query("ALTER TABLE `permission_group_permission` CHANGE `groupId` `group_id` INT(10) UNSIGNED NOT NULL; ");
        $this->query("ALTER TABLE `permission_group_permission` CHANGE `permissionId` `permission_id` INT(10) UNSIGNED NOT NULL; ");
        
        $this->query("ALTER TABLE `permission_group_permission` ADD FOREIGN KEY (`group_id`) REFERENCES `permission_group`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");
        $this->query("ALTER TABLE `permission_group_permission` ADD FOREIGN KEY (`permission_id`) REFERENCES `permission`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");
    }
}
