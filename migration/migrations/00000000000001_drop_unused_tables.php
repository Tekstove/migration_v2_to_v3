<?php

use Phinx\Migration\AbstractMigration;

class DropUnusedTables extends AbstractMigration
{
    public function up()
    {
        $this->table('glasuvane_posledni')->drop();
        $this->table('anketa')->drop();
        $this->table('chat_bans')->drop();
        $this->table('chat_bans_by_id')->drop();
        $this->table('chat_bans_votes')->drop();
        $this->table('permission_users')->drop();
    }
}
