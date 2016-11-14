<?php

use Phinx\Migration\AbstractMigration;

class FixPermissionGroupPath extends AbstractMigration
{
    public function up()
    {
        $this->query("UPdATE permission_group SET `image` = REPLACE(image, '/tekstove/', '/site/')");
    }
}
