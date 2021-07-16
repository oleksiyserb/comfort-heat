<?php


namespace app\controllers;


use app\models\Category;
use app\models\News;
use app\models\Picture;
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
            'model' => $model,
            'categories' => $categories,
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
             'model' => $model,
             'categories' => $categories,
             'propositions' => $propositions,
             'products' => $data['subcategoryProducts'],
             'pages' => $data['pages']
         ]);
    }

    public function actionProduct($id)
    {
        $model = $this->findModelProduct($id);
        $products = Product::getAllProductsCurrentSubcategory($model->subcategory->id);

        return $this->render('product', [
            'model' => $model,
            'products' => $products
        ]);
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

    /**
     * @param $id
     * @return Product|null
     * @throws NotFoundHttpException
     */
    protected function findModelProduct($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}