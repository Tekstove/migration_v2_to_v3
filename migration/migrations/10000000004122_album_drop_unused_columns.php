<?php

use Phinx\Migration\AbstractMigration;

class AlbumDropUnusedColumns extends AbstractMigration
{

    public function up()
    {
        $albumTable = $this->table('album');
        for ($i = 1; $i <= 35; $i++) {
            $albumTable->removeColumn("p{$i}");
            $albumTable->removeColumn("p{$i}n");
        }
    }
}
