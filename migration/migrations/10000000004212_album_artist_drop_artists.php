<?php

use Phinx\Migration\AbstractMigration;

class AlbumArtistDropArtists extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('album');
        $table->removeColumn('artist1id');
        $table->removeColumn('artist2id');
    }
}
