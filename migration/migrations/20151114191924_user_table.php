<?php

use Phinx\Migration\AbstractMigration;

class UserTable extends AbstractMigration
{
    public function up()
    {
        $this->table('users')->rename('user');
    }
}
