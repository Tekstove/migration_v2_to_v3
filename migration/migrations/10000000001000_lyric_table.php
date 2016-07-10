<?php

use Phinx\Migration\AbstractMigration;

class LyricTable extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `lyric`
            DROP `video_vbox7_orig`,
            DROP `video_youtube_orig`,
            DROP `video_metacafe_orig`;
        ");
        
        
        $table = $this->table('lyric');
        $table->renameColumn('populqrnost', 'popularity');
        $table->renameColumn('vidqna', 'views');
        $table->renameColumn('glasa', 'votes_count');
        $this->query("ALTER TABLE `lyric` CHANGE `up_id` `uploaded_by` INT(11) UNSIGNED NULL DEFAULT NULL; ");
        $table->renameColumn('zaglavie_palno', 'cache_title_full');
        $table->renameColumn('zaglavie_sakrateno', 'cache_title_short');
        
        $table->renameColumn('dopylnitelnoinfo', 'extra_info');
        $this->query("ALTER TABLE `lyric` CHANGE `extra_info` `extra_info` TEXT CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL; ");
        
        $this->query('ALTER TABLE `lyric` CHANGE `video_youtube` `video_youtube` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL;');
        
        $this->query('ALTER TABLE `lyric` CHANGE `video_metacafe` `video_metacafe` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL; ');
        
        $this->query('ALTER TABLE `lyric` CHANGE `video_vbox7` `video_vbox7` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL; ');
        
        $this->query('ALTER TABLE `lyric` CHANGE `uploaded_by` `send_by` INT(11) UNSIGNED NULL DEFAULT NULL;');
        
        $this->query("
            ALTER TABLE lyric MODIFY text_bg text NULL;
        ");
        
        echo "Updating lyrics..." . PHP_EOL;
        $this->query("
            UPDATE
                lyric
            SET
                text_bg = NULL
            WHERE
                TRIM(text_bg) = ''
        ");
        
        $this->query("ALTER TABLE `lyric` ADD `text_bg_added` TIMESTAMP NULL DEFAULT NULL AFTER `text_bg`; ");
        $this->query("ALTER TABLE `lyric` ADD INDEX(`text_bg_added`);");
        
        $this->query("
            UPDATE
                `lyric`
            SET
                text_bg_added = `podnovena`
            WHERE
                DATE(`podnovena`) > DATE('2008-09-08')
        ");
        
        $table->removeColumn('podnovena');
        
    }
}
