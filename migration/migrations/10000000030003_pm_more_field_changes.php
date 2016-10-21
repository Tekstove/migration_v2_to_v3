<?php

use Phinx\Migration\AbstractMigration;

class PmMoreFieldChanges extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('pm');
        $table->renameColumn('otnosno', 'title');
        $table->renameColumn('data', 'datetime');
        $table->renameColumn('procheteno', 'read');
        $table->removeColumn('ip');
    }
}
