<?php

use Phinx\Migration\AbstractMigration;

class AlbumArtistsConstraints extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `album_artist`
            ADD CONSTRAINT
                `album_artist_artist_contraint`
                FOREIGN KEY (`artist_id`)
                REFERENCES `artist`(`id`)
                ON DELETE RESTRICT
                ON UPDATE RESTRICT;
        ");
        
        $this->query("
            ALTER TABLE `album_artist`
            ADD CONSTRAINT
                `album_artist_album_contraint`
                FOREIGN KEY (`album_id`)
                REFERENCES `album`(`id`)
                ON DELETE RESTRICT
                ON UPDATE RESTRICT;
        ");
    }
}
