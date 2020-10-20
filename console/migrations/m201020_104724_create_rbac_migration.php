<?php

use yii\db\Migration;

/**
 * Class m201020_104724_create_rbac_migration
 */
class m201020_104724_create_rbac_migration extends Migration
{

    public function up()
    {
        Yii::$app->runAction('migrate/up', [
          'migrationPath' => '@yii/rbac/migrations/',
          'interactive' => false
        ]);
        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);

        $user = $auth->createRole('user');
        $user->description = 'User';
        $auth->add($user);

        $manageSystem = $auth->createPermission('manageSystem');
        $manageSystem->description = 'Manage a system';
        $auth->add($manageSystem);

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create post';
        $auth->add($createPost);

        $auth->addChild($user, $createPost);
        $auth->addChild($admin, $manageSystem);
        $auth->addChild($admin, $user);

        $auth->assign($admin, 1);

    }

    public function down()
    {
        echo "m201020_104724_create_rbac_migration cannot be reverted.\n";

        return false;
    }
}
