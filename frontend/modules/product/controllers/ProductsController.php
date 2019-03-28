<?php

namespace frontend\modules\product\controllers;

use frontend\modules\product\models\Products;
use frontend\modules\product\models\Reviews;
use frontend\modules\product\models\Categories;
use Yii;
use yii\base\Security;
use yii\data\Pagination;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class ProductsController extends Controller
{

    public function actionIndex($cat_id = 0,$brand_id = 0){

        $products = Products::find()->with(['cat','brand','reviews','variants','images']);
        $categories = Categories::find()->all();

        $s = Yii::$app->request->get('s');
        if(!empty($s)){
            $products = $products->where(['LIKE','title',$s]);
        }else{
            if(!empty($cat_id) && !empty($brand_id)){
                $products = $products->where(['cat_id' => $cat_id,'brand_id' => $brand_id]);
            }else{
                if($cat_id){
                    $products = $products->where(['cat_id' => $cat_id]);
                }
                if($brand_id){
                    $products = $products->where(['brand_id' => $brand_id]);
                }
            }
        }



        $pagination = new Pagination(['totalCount' => $products->count(),'pageSize' => 5]);
        $products = $products->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();

        return $this->render('index',['products' => $products,'pagination' => $pagination,'categories' => $categories]);
    }

}
