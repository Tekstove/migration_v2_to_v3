<?php

use Phinx\Migration\AbstractMigration;

class ArtistMappingData extends AbstractMigration
{
    public function up()
    {
        foreach ([1, 2, 3, 4, 5, 6] as $artistId) {
            
            $updatedLyrics = $this->execute("
                UPDATE
                    lyric
                LEFT JOIN
                    artist
                        ON
                            artist.id = artist{$artistId}
                SET
                    artist{$artistId} = 0
                WHERE
                    artist{$artistId} <> 0
                    AND artist.id IS NULL
            ");
                    
            $this->getOutput()->writeln("{$updatedLyrics} lyrics updated becouse of artist reference error");
                    
            $this->query("
                INSERT IGNORE INTO
                    artist_lyric(`lyric_id`, `artist_id`, `order`)
                SELECT
                    `lyric`.`id`,
                    `lyric`.`artist{$artistId}`,
                    {$artistId} as `order`
                FROM
                    `lyric`
                WHERE
                    `artist{$artistId}` <> 0
            ");
        }
    }
}
