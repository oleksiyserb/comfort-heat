<?php


namespace app\controllers;

use app\models\Project;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProjectController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        $data = Project::getPojects();

        return $this->render('index', [
            'projects' => $data['projects'],
            'pages' => $data['pages']
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $project = $this->findModel($id);
        $propositions = Project::find()
            ->where(['status' => Project::STATUS_SEE])
            ->orderBy('id DESC')
            ->limit(Project::LIMIT_PROPOSITION_PROJECTS)->all();

        return $this->render('view', [
            'project' => $project,
            'propositions' => $propositions
        ]);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}