<?php


namespace app\controllers;


use app\models\Category;
use app\models\News;
use app\models\Product;
use app\models\Subcategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{

    public function actionCategory($id)
    {
        $model = $this->findModelCategory($id);
        $categories = Category::getCategories();
        $data = Product::getProducts();
        $propositions = News::getNews();

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
        $model = $this->findModelSubcategory($id);
        $categories = Category::getCategories();
        $propositions = News::getNews();
        $data = Product::getSubcategoryProducts($id);

         return $this->render('subcategory', [
             'categories' => $categories,
             'model' => $model,
             'propositions' => $propositions,
             'products' => $data['subcategoryProducts'],
             'pages' => $data['pages']
         ]);
    }

    public function actionProduct($id)
    {
        return $this->render('product');
    }

    /**
     * @param $id
     * @return Category|null
     * @throws NotFoundHttpException
     */
    protected function findModelCategory($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $id
     * @return Subcategory|null
     * @throws NotFoundHttpException
     */
    protected function findModelSubcategory($id)
    {
        if (($model = Subcategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}