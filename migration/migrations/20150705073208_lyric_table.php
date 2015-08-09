<?php

use Phinx\Migration\AbstractMigration;

class LyricTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('lyric');
        $table->renameColumn('populqrnost', 'popularity');
        $table->renameColumn('vidqna', 'views');
        $table->renameColumn('up_id', 'uploaded_by');
        $table->renameColumn('zaglavie_palno', 'cache_title_full');
        $table->renameColumn('zaglavie_sakrateno', 'cache_title_short');
    }
}
