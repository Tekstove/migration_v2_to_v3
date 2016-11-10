<?php

use Phinx\Migration\AbstractMigration;

class LyricCensor extends AbstractMigration
{

    public function up()
    {
        $this->query("
            ALTER TABLE `lyric` ADD `cache_censor` BOOLEAN NOT NULL AFTER `text_bg_added`;
        ");
        
        $this->query("
            ALTER TABLE `lyric` ADD `cache_censor_updated` DATETIME NOT NULL AFTER `cache_censor`;
        ");
    }
}
