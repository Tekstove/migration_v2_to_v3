<?php

use Phinx\Migration\AbstractMigration;

class LyricTableMappings extends AbstractMigration
{
    public function up()
    {
        $this->query('
            CREATE TABLE lyric_language
            (
                lyric_id INT NOT NULL,
                language_id INT NOT NULL,
                INDEX IDX_8FD83971F9CD025C (lyric_id),
                INDEX IDX_8FD8397182F1BAF4 (language_id),
                PRIMARY KEY(lyric_id, language_id))
                DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
            '
        );
        
        $this->query("ALTER TABLE `lyric_language` CHANGE `lyric_id` `lyric_id` INT(11) UNSIGNED NOT NULL; ");
        $this->query("ALTER TABLE `lyric_language` CHANGE `language_id` `language_id` SMALLINT(11) UNSIGNED NOT NULL; ");
        
        $this->query("
            ALTER TABLE `lyric_language` ADD FOREIGN KEY (`lyric_id`) REFERENCES `lyric`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
        ");
        
        $this->query("
            ALTER TABLE `lyric_language` ADD FOREIGN KEY (`language_id`) REFERENCES `language`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
        ");
    }
}
