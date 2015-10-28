<?php
namespace app\utilities;

use yii\web\UrlRuleInterface;
use app\models\UserRecord;

class UsernameUrlRule implements UrlRuleInterface
{
	
	public function parseRequest($manager, $request)
	{
		$maybeUsername = $request->pathInfo;

		$user = UserRecord::findOne(['username'=>$maybeUsername]);

		if (!$user) {
			return false;
		}
		else{
			$route = 'user/view';
			$params = ['id'=>$user->user_id];
			return [$route, $params];
		}
	}

	public function createUrl($manager, $route, $params)
	{
		if ($route !== 'user/view' || !array_key_exists('id', $params)) {
			return false;
		}

		$user = UserRecord::findOne($params['id']);
		if (!$user) {
			return false;
		}
		else{
			return "{$user->username}";
		}
	}
}