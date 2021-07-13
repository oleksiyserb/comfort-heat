<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = '/admin';

    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @return array
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'denyCallback' => function($rule, $action)
//                {
//                    throw new NotFoundHttpException();
//                },
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'matchCallback' => function($rule, $action)
//                        {
//                            if (Yii::$app->user->role == 'admin') {
//                                return Yii::$app->user->identity;
//                            }
//                        }
//                    ]
//                ]
//            ]
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
