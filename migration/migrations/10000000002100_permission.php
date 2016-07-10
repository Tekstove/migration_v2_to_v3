<?php

use Phinx\Migration\AbstractMigration;

class Permission extends AbstractMigration
{

    public function up()
    {
        $this->table('permissions')->rename('permission');
    }
}
