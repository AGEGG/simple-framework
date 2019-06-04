<?php
namespace app\controllers;
use sf\web\Controller;

class SiteController extends Controller
{
    public function actionTest()
    {
        $data = ['first' => 'awesome-php-zh_CN', 'second' => 'simple-framework'];
        echo $this->toJson($data);
    }

    public function actionView()
    {
        $body = 'Test body ';
        $this->render('site/view',['body' => $body]);
    }
}