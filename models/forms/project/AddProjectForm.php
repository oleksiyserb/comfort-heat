<?php


namespace app\models\forms\project;


use app\models\Project;
use yii\base\Model;

class AddProjectForm extends Model
{
    public $title;
    public $text;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'picture' => 'Picture',
            'text' => 'Text',
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $project = new Project();
            $project->title = $this->title;
            $project->text = $this->text;
            $project->time_create = time();

            if ($project->save()) {
                return \Yii::$app->db->lastInsertID;
            }
        }
    }

}