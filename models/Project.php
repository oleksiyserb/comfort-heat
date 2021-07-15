<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $title
 * @property string|null $picture
 * @property string|null $text
 */
class Project extends \yii\db\ActiveRecord
{
    const SHOW_LIMIT_PROJECT = 8;
    const STATUS_SEE = 1;
    const LIMIT_PROPOSITION_PROJECTS = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @return string
     */
    public function getImage()
    {
        if ($this->picture) {
            return Yii::$app->params['storage'] . $this->picture;
        } else {
            return '/no-image.png';
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getPojects()
    {
        $query = Project::find()
            ->where(['status' => self::STATUS_SEE]);
        $countProjects = $query->count();
        $pages = new Pagination(['totalCount' => $countProjects, 'pageSize' => self::SHOW_LIMIT_PROJECT]);

        $projects = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $data['projects'] = $projects;
        $data['pages'] = $pages;

        return $data;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAll()
    {
        return Project::find()
            ->where(['status' => Project::STATUS_SEE])
            ->orderBy('id DESC')
            ->limit(Project::SHOW_LIMIT_PROJECT)
            ->all();
    }

    public static function getPropositions()
    {
        return Project::find()
            ->where(['status' => Project::STATUS_SEE])
            ->orderBy('id DESC')
            ->limit(Project::LIMIT_PROPOSITION_PROJECTS)
            ->all();
    }
}
