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
        $this->query("ALTER TABLE `lyric` CHANGE `uploaded_by` `uploaded_by` INT(11) UNSIGNED NULL DEFAULT NULL; ");
        $table->renameColumn('zaglavie_palno', 'cache_title_full');
        $table->renameColumn('zaglavie_sakrateno', 'cache_title_short');
        
        $table->renameColumn('dopylnitelnoinfo', 'extra_info');
        $this->query("ALTER TABLE `lyric` CHANGE `extra_info` `extra_info` TEXT CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL; ");
        
        $this->query('ALTER TABLE `lyric` CHANGE `video_youtube` `video_youtube` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL;');
        
        $this->query('ALTER TABLE `lyric` CHANGE `video_metacafe` `video_metacafe` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL; ');
        
        $this->query('ALTER TABLE `lyric` CHANGE `video_vbox7` `video_vbox7` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL; ');
        
        $this->query('ALTER TABLE `lyric` CHANGE `uploaded_by` `user_id` INT(11) UNSIGNED NULL DEFAULT NULL;');
        
    }
}
