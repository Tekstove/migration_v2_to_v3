<?php

use Phinx\Migration\AbstractMigration;

class PermissionGroup extends AbstractMigration
{
    public function up()
    {
        $this->query("RENAME TABLE `permission_groups` TO `permission_group`");
        $this->query("
            UPDATE
                permission_group
            SET
                image = CONCAT(\"bundles/tekstove/images/badges/\", image)
        ");
    }
}
