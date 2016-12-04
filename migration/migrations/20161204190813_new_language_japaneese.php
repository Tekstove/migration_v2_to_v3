<?php

use Phinx\Migration\AbstractMigration;

class NewLanguageJapaneese extends AbstractMigration
{
    public function up()
    {
        $this->query("
            INSERT INTO `language` (`id`, `name`) VALUES ('18', 'Японски');
        ");
    }
}
