<?php

use Phinx\Migration\AbstractMigration;

class AlbumLyric extends AbstractMigration
{
    public function up()
    {
        $this->query("
            CREATE TABLE `album_lyric`
                (
                    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    `album_id` INT UNSIGNED NOT NULL ,
                    `lyric_id` INT UNSIGNED NULL DEFAULT NULL ,
                    `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                    `order` TINYINT UNSIGNED NOT NULL ,
                    PRIMARY KEY (`id`)
                )
            ENGINE = InnoDB;
        ");
        
        $this->query("
            ALTER TABLE `album_lyric` ADD INDEX(`lyric_id`);
        ");
        
        $this->query("
            ALTER TABLE `album_lyric` ADD INDEX(`album_id`);
        ");
    }
}
