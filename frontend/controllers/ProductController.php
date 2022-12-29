<?php

namespace frontend\controllers;

use frontend\models\ProductForm;
use frontend\models\Product;
use Yii;
use yii\data\Pagination;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Product::find()->orderBy(['created_at' => SORT_DESC]);
        $countQuery = clone $query;
        $pagination = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 3]);

        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
//var_dump(get_class_methods($pagination)); die;
        return $this->render('index', ['products' => $products, 'pagination' => $pagination]);
    }

    public function actionCreate()
    {
        $productModel = new ProductForm();
        $request = Yii::$app->request;

        if($request->isPost && $productModel->load($request->post()) && $productModel->validate()) {
            $productModel->status = 1;
            $product = new Product($productModel);
//var_dump(Yii::$app->request->post(), $productModel); die;
            if($product->save()) {
                return $this->redirect(['index']);
            }

            return $this->refresh();

        } else {
            return $this->render('create', ['product' => $productModel]);
        }
    }
}
