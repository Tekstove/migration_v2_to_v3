<?php

use Phinx\Migration\AbstractMigration;

class ForumTopic extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE forum_topic DROP FOREIGN KEY temi_ako_se_iztrie_razdel;
        ");
        
        $this->query("
            ALTER TABLE `forum_topic` DROP INDEX `topic_razdel`;
        ");
        $table = $this->table('forum_topic');
        $table->renameColumn('topic_razdel', 'forum_category_id');
        
        $this->query("
            ALTER TABLE `forum_topic` ADD INDEX(`forum_category_id`);
        ");
        
        $this->query("
            ALTER TABLE
                `forum_topic`
            ADD CONSTRAINT `ft_forum_category_restriction`
            FOREIGN KEY (`forum_category_id`) REFERENCES `forum_category`(`id`)
            ON DELETE RESTRICT
            ON UPDATE RESTRICT;
        ");
    }
}
