<?php

use Phinx\Migration\AbstractMigration;

class Artists extends AbstractMigration
{
    public function up() {
        $table = $this->table('artists');
        $table->rename('artist');
        $table->renameColumn('addedby', 'user_id');
        $table->removeColumn('name_alternatives');
    }
}
