<?php

use Phinx\Migration\AbstractMigration;

class ForumCategory extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('forum_razdel');
        $table->renameColumn('podredba', 'order');
        $table->rename('forum_category');
    }
}
