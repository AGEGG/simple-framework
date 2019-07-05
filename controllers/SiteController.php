<?php
namespace app\controllers;
use app\models\User;
use sf\web\Controller;

class SiteController extends Controller
{
    public function actionTest()
    {
        $user = User::findOne(['age'=>20]);
        $data = ['first' => 'awesome-php-zh_CN',
            'second' => 'simple-framework',
            'user' => $user
        ];
        echo $this->toJson($data);
    }

    public function actionView()
    {
        $body = 'Test body ';
        $this->render('site/view',['body' => $body]);
    }
}