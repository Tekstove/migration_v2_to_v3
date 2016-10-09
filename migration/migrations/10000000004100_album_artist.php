<?php

use Phinx\Migration\AbstractMigration;

class AlbumArtist extends AbstractMigration
{
    public function up()
    {
        $this->query("
            CREATE TABLE `album_artist`
                (
                    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    `album_id` INT UNSIGNED NOT NULL ,
                    `artist_id` INT UNSIGNED NULL DEFAULT NULL,
                    `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                    `order` TINYINT UNSIGNED NOT NULL ,
                    PRIMARY KEY (`id`)
                )
            ENGINE = InnoDB;
        ");
        
        $this->query("
            ALTER TABLE `album_artist` ADD INDEX(`album_id`);
        ");
        
        $this->query("
            ALTER TABLE `album_artist` ADD INDEX(`artist_id`);
        ");
    }
}
