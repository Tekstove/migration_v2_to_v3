<?php

use Phinx\Migration\AbstractMigration;

class UserTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table->rename('user');
        $table->removeColumn('class');
        $table->renameColumn('rajdane', 'birthday');
        $this->query("ALTER TABLE `user` CHANGE `rajdane` `rajdane` VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_bin NULL; ");
        $this->query("UPDATE user set rajdane = NULL where rajdane = ''");
        $this->query("ALTER TABLE `user` ADD `birthday` DATE NULL DEFAULT NULL AFTER `rajdane`; ");
        $this->query("
            UPDATE
                user
            SET
            birthday = DATE(
                CONCAT(
                    substring(rajdane,1,4),
                    SUBSTRING(rajdane, 5, 2),
                    SUBSTRING(rajdane,7,2)
                )
            )
            WHERE rajdane IS NOT NULL
        ");
        $table->removeColumn('rajdane');
    }
}
