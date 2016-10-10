<?php

use Phinx\Migration\AbstractMigration;

class AlbumArtistForeignKeys extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `album_artist`
            ADD CONSTRAINT
                `album_artist_albumFK` FOREIGN KEY (`album_id`)
                REFERENCES `album`(`id`)
            ON DELETE RESTRICT
            ON UPDATE RESTRICT;
        ");
        
        $this->query("
            ALTER TABLE `album_artist`
            ADD CONSTRAINT
                `album_artist_artistFK` FOREIGN KEY (`artist_id`)
            REFERENCES `artist`(`id`)
            ON DELETE RESTRICT
            ON UPDATE RESTRICT;
        ");
    }
}
