<?php

use Phinx\Migration\AbstractMigration;

class PmAddForeignKeys extends AbstractMigration
{
    public function up()
    {
        $this->query("
            ALTER TABLE `pm`
            ADD CONSTRAINT
                `pm.user_to.restriction`
                FOREIGN KEY (`user_to`)
                REFERENCES `user`(`id`)
                ON DELETE RESTRICT
                ON UPDATE RESTRICT;
        ");
        
        $this->query("
            ALTER TABLE `pm`
            ADD CONSTRAINT
                `pm.user_from.restriction`
                FOREIGN KEY (`user_from`)
                REFERENCES `user`(`id`)
                ON DELETE RESTRICT
                ON UPDATE RESTRICT;
        ");
    }
}
