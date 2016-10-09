<?php

use Phinx\Migration\AbstractMigration;

class AlbumLyricConstraints extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `album_lyric`
            ADD CONSTRAINT
                `album_lyric_lyric_contraint`
                FOREIGN KEY (`lyric_id`)
                REFERENCES `lyric`(`id`)
                ON DELETE RESTRICT
                ON UPDATE RESTRICT;
        ");
        
        $this->query("
            ALTER TABLE `album_lyric`
            ADD CONSTRAINT
                `album_lyric_album_contraint`
                FOREIGN KEY (`album_id`)
                REFERENCES `album`(`id`)
                ON DELETE RESTRICT
                ON UPDATE RESTRICT;
        ");
    }
}
