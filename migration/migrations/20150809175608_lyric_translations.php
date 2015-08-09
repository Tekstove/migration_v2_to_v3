<?php

use Phinx\Migration\AbstractMigration;

class LyricTranslations extends AbstractMigration
{
    public function up()
    {
        throw new \Exception('@TODO match translations to lyric');
        $this->query("ALTER TABLE `prevodi` ADD `lyric_id` INT UNSIGNED AFTER `id`, ADD INDEX (`lyric_id`)");
        $this->query("RENAME TABLE prevodi TO lyric_translation");
    }
}
