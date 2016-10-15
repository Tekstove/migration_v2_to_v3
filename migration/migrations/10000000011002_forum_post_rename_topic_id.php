<?php

use Phinx\Migration\AbstractMigration;

class ForumPostRenameTopicId extends AbstractMigration
{
    public function up()
    {
        $this->query("ALTER TABLE forum_post DROP FOREIGN KEY postove_ako_se_iztrie_temata");
        $this->query("ALTER TABLE forum_post DROP INDEX za_topic_id");
        
        $this->query("
            ALTER TABLE `forum_post`
            CHANGE
                `za_topic_id` `forum_topic_id` INT(11) UNSIGNED NOT NULL;
        ");
        
        $this->query("ALTER TABLE `forum_post` ADD INDEX(`forum_topic_id`);");
        
        $this->query("
            ALTER TABLE
                `forum_post`
            ADD CONSTRAINT `fp_forum_topic_restriction`
            FOREIGN KEY (`forum_topic_id`)
            REFERENCES `forum_topic`(`id`)
            ON DELETE RESTRICT
            ON UPDATE RESTRICT;
        ");
    }
}
