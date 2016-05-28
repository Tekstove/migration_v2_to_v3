<?php

use Phinx\Migration\AbstractMigration;

class LyricAdristMapping extends AbstractMigration
{
    public function up()
    {
        $this->query("
            CREATE TABLE
                `artist_lyric`
            (
                `lyric_id` INT UNSIGNED NOT NULL ,
                `artist_id` INT UNSIGNED NOT NULL ,
                `order` TINYINT UNSIGNED NOT NULL ,
                PRIMARY KEY (`lyric_id`, `artist_id`)
            )
            ENGINE = InnoDB;
        ");
        
        $this->query("
            ALTER TABLE `artist_lyric` ADD FOREIGN KEY (`lyric_id`) REFERENCES `lyric`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
        ");
        
        $this->query("
            ALTER TABLE `artist_lyric` ADD FOREIGN KEY (`artist_id`) REFERENCES `artist`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
        ");
    }
    
    public function down()
    {
        $this->query("DROP TABLE artist_lyric");
    }
}
