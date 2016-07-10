<?php

use Phinx\Migration\AbstractMigration;

class LyricTranslations extends AbstractMigration
{
    public function up()
    {
        echo "\n\n==================\n @TODO MATCH TRANSLATIONS TO LYRIC \n ===========\n";
        $this->query("ALTER TABLE `prevodi` ADD `lyric_id` INT UNSIGNED AFTER `id`, ADD INDEX (`lyric_id`)");
        $this->query("RENAME TABLE prevodi TO lyric_translation");
    }
}
