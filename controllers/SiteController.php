<?php

namespace app\controllers;

use app\models\Project;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    const SHOW_LIMIT_PROJECT = 4;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $projects = Project::getAll();

        return $this->render('index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Displays services page.
     *
     * @return string
     */
    public function actionServices()
    {
        return $this->render('services');
    }

    /**
     * Displays technical page.
     *
     * @return string
     */
    public function actionTechnical()
    {
        return $this->render('technical');
    }

    /**
     * Displays design page.
     *
     * @return string
     */
    public function actionDesign()
    {
        return $this->render('design');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
