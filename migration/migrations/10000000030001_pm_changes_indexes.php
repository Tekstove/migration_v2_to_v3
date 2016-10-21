<?php

use Phinx\Migration\AbstractMigration;

class PmChangesIndexes extends AbstractMigration
{
    public function up()
    {
        $this->query("ALTER TABLE pm DROP INDEX za;`");
        $this->query("ALTER TABLE `pm` ADD INDEX(`user_from`);");
        $this->query("ALTER TABLE `pm` ADD INDEX(`user_to`);");
    }
}
