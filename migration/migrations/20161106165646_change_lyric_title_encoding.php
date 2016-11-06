<?php

use Phinx\Migration\AbstractMigration;

class ChangeLyricTitleEncoding extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `lyric` CHANGE `title` `title` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
        ");
    }
}
