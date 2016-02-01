<?php

use Phinx\Migration\AbstractMigration;

class UserTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        echo "Renaming table to `user`\n";
        $table->rename('user');
        $table->removeColumn('class');
        $this->query("ALTER TABLE `user` CHANGE `rajdane` `rajdane` VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_bin NULL; ");
        $this->query("UPDATE user set rajdane = NULL where rajdane = ''");
        echo "Adding birthday column\n";
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
        
        echo "Removing column `rajdane`\n";
        $table->removeColumn('rajdane');
    }
}
