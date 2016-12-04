<?php

use Phinx\Migration\AbstractMigration;

class ChatMessageDetailsPemission extends AbstractMigration
{
    public function up()
    {
        $this->query("
            INSERT INTO `permission` (`id`, `name`, `value`) VALUES ('18', 'chat.message.details.view', '1');
        ");

        $this->query("
            INSERT INTO `permission_group` (`id`, `name`, `image`) VALUES ('16', 'Вижда административна информация за чат съобщенията', '');
        ");

        $this->query("
            INSERT INTO `permission_group_permission` (`group_id`, `permission_id`) VALUES ('16', '18');
        ");

        $this->query("
            INSERT INTO `permission_group_user` (`group_Id`, `user_id`) VALUES ('16', '54');
        ");
    }
}
