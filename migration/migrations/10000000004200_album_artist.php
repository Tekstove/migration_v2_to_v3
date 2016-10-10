<?php

use Phinx\Migration\AbstractMigration;

class AlbumArtist extends AbstractMigration
{
    public function up()
    {
        $this->query("
            CREATE TABLE `album_artist`
            (
                `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
                `album_id` INT UNSIGNED NOT NULL ,
                `artist_id` INT UNSIGNED NOT NULL ,
                `order` TINYINT UNSIGNED NOT NULL ,
                PRIMARY KEY (`id`),
                INDEX `album_artist_albumIndex` (`album_id`),
                INDEX `album_artist_artistIndex` (`artist_id`)
            )
            ENGINE = InnoDB;
        ");
    }
}
