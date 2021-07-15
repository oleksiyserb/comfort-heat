<?php


namespace app\controllers;


use app\models\Category;
use app\models\News;
use app\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{

    public function actionCategory($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->with('subcategories')->all();
        $data = Product::getProducts();
        $propositions = News::find()->where(['status' => News::STATUS_SEE])->orderBy('id DESC')->all();

        return $this->render('category', [
            'categories' => $categories,
            'model' => $model,
            'products' => $data['products'],
            'pages' => $data['pages'],
            'propositions' => $propositions
        ]);
    }

    public function actionSubcategory($id)
    {
         return $this->render('subcategory');
    }

    public function actionProduct($id)
    {
        return $this->render('product');
    }

    /**
     * Finds the Catalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}