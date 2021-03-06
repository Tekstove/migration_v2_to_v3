<?php

use Phinx\Migration\AbstractMigration;

class AlbumLyricDataMigration extends AbstractMigration
{
    public function up()
    {
        for ($i = 1; $i <= 35; $i++) {
            $this->getOutput()->writeln("Processing {$i} / 35");
            $this->query("
                INSERT IGNORE INTO `album_lyric`(album_id, lyric_id, name, `order`)
                SELECT
                    id,
                    IF(p{$i}=0, NULL, p{$i}),
                    IF(p{$i}n='', NULL, p{$i}n),
                    {$i}
                FROM
                    album
                WHERE
                    p{$i} <> 0
                    OR p{$i}n <> ''
            ");
        }
    }
}
