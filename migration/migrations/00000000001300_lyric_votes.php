<?php

use Phinx\Migration\AbstractMigration;

class LyricVotes extends AbstractMigration
{
    public function up()
    {
        $this->table('glasuvane')->rename('lyric_votes');
        $this->query('ALTER TABLE `lyric_votes` CHANGE `id` `id` INT(11) UNSIGNED NOT NULL;');
        $this->query('ALTER TABLE lyric_votes DROP FOREIGN KEY glasuvane_ako_se_iztrie_pesenta;');
        $this->query('ALTER TABLE lyric_votes DROP PRIMARY KEY');
        $this->table('lyric_votes')->removeIndexByName('glasuvane_ako_se_iztrie_pesenta');
        $this->table('lyric_votes')->renameColumn('ot', 'username_id');
        $this->table('lyric_votes')->renameColumn('za', 'lyric_id');
        
        $this->query('ALTER TABLE `lyric_votes` ADD PRIMARY KEY(`id`);');
        $this->query('ALTER TABLE `lyric_votes` CHANGE `id` `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT; ');
        
        $this->query('
            DELETE lv2 
            FROM
                `lyric_votes` lv1 
            INNER JOIN
                lyric_votes lv2
                ON lv1.username_id = lv2.username_id
                AND lv1.lyric_id = lv2.lyric_id
                AND lv1.id > lv2.id
        ');

        $this->query('ALTER TABLE `lyric_votes` ADD UNIQUE( `lyric_id`, `username_id`); ');
        
        $this->table('lyric_votes')->rename('lyric_vote');
        
        
    }
}
