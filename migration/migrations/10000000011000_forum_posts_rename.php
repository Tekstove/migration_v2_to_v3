<?php

use Phinx\Migration\AbstractMigration;

class ForumPostsRename extends AbstractMigration
{
    public function up()
    {
        $this->table('forum_posts')
                ->rename('forum_post');
    }
}
