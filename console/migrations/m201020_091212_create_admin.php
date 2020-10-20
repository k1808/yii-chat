<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m201020_091212_create_admin
 */
class m201020_091212_create_admin extends Migration
{
    public function up()
    {
        User::create(
          'admin',
          'admin@example.com',
          '111'
        );
    }

    public function down()
    {
        $this->delete('user', ['username' => 'admin']);
    }
}
