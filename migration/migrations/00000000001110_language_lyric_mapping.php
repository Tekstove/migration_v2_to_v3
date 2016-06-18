<?php

use Phinx\Migration\AbstractMigration;

class LanguageLyricMapping extends AbstractMigration
{

    public function up()
    {
        $this->query("
            INSERT INTO
                lyric_language(lyric_id, language_id)
            (
                SELECT
                    id,
                    pee_se_na
                FROM
                    lyric
                WHERE
                    pee_se_na <> 0
            )
        ");
        
        $this->query("ALTER TABLE `lyric` DROP `pee_se_na`;");
    }
    
    public function down()
    {
        throw new \Exception("down not supported");
    }
}
