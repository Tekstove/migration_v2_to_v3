<?php

use Phinx\Migration\AbstractMigration;

class LyricTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('lyric');
        $table->renameColumn('populqrnost', 'popularity');
        $table->renameColumn('vidqna', 'views');
    }
}
