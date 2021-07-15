<?php


namespace app\controllers;


use app\models\News;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{

    public function actionIndex()
    {
        $data = News::getArticles();

        return $this->render('index', [
            'articles' => $data['articles'],
            'pages' => $data['pages']
        ]);
    }

    public function actionView($id)
    {
        $article = $this->findModel($id);
        $propositions = News::getPropositions();

        return $this->render('view', [
            'article' => $article,
            'propositions' => $propositions
        ]);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}