<?php

use Phinx\Migration\AbstractMigration;

class ForumPostRenameFields extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('forum_post');
        $table->renameColumn('post', 'text');
        $table->renameColumn('poster', 'user_id');
    }
}
