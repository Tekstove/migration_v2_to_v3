<?php

use Phinx\Migration\AbstractMigration;

class VotesTable extends AbstractMigration
{
    public function up()
    {
        $this->table('glasuvane')->rename('lyric_votes');
    }
}
