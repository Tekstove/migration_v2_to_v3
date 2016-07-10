<?php

use Phinx\Migration\AbstractMigration;

class ArtistRemoveLyricFields extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            ALTER TABLE `lyric`
            DROP `artist1`,
            DROP `artist2`,
            DROP `artist3`,
            DROP `artist4`,
            DROP `artist5`,
            DROP `artist6`;
        ");
    }
}
