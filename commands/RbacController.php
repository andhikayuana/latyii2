<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\UserRecord;

class RbacController extends Controller
{
    public function actionInit()
    {
        $rbac = Yii::$app->authManager;

        //role untuk guest
        $guest = $rbac->createRole('guest');
        $guest->description = 'Nobody';
        $rbac->add($guest);

        //role untuk user
        $user = $rbac->createRole('user');
        $user->description = 'untuk user yang login';
        $rbac->add($user);

        //role untuk manager
        $manager = $rbac->createRole('manager');
        $manager->description = 'untuk manager yang login';
        $rbac->add($manager);

		//role untuk admin
        $admin = $rbac->createRole('admin');
        $admin->description = 'untuk admin yang login';
        $rbac->add($admin);        

        //hirarki role
        $rbac->addChild($admin, $manager);
        $rbac->addChild($manager, $user);
        $rbac->addChild($user, $guest);

        //assign ke user tabel yg ada di db
        $rbac->assign($user, UserRecord::findOne(['username' => 'andhika'])->user_id);
        $rbac->assign($manager, UserRecord::findOne(['username' => 'manager'])->user_id);
        $rbac->assign($admin, UserRecord::findOne(['username' => 'admin'])->user_id);

    }
}
