<?php

use Phinx\Migration\AbstractMigration;

class PermissionForumNames extends AbstractMigration
{
    public function up()
    {
            $this->query("
                UPDATE `permission` SET `name` = 'forum.secret.view' WHERE `permission`.`id` = 11;
            ");
    }
}
