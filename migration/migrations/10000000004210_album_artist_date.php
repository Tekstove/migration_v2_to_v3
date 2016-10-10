<?php

use Phinx\Migration\AbstractMigration;

class AlbumArtistDate extends AbstractMigration
{
    public function up()
    {
        foreach ([1,2] as $number) {
            $this->query("
                INSERT INTO album_artist (album_id, artist_id, `order`)
                SELECT
                    id,
                    artist{$number}id,
                    {$number}
                FROM
                    album
                WHERE
                    artist{$number}id <> 0
            ");
        }
    }
}
