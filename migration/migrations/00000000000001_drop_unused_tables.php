<?php

use Phinx\Migration\AbstractMigration;

class DropUnusedTables extends AbstractMigration
{
    public function up()
    {
        $this->table('glasuvane_posledni')->drop();
    }
}
