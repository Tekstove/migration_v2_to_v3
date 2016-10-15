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
        
        $this->query("
            ALTER TABLE `forum_topic`
            CHANGE `topic_starter` `user_id` INT(11) UNSIGNED NOT NULL;
        ");
        
        $this->query("
            ALTER TABLE `forum_topic` ADD INDEX(user_id);
        ");
        
        $this->query("
            ALTER TABLE `forum_topic`
            ADD CONSTRAINT `ft_forum_category_userFK`
            FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
            ON DELETE RESTRICT
            ON UPDATE RESTRICT
        ");
        
        $this->query("
            ALTER TABLE `forum_topic`
            CHANGE `topic_name` `name` VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
        ");
    }
}
