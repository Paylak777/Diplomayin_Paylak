<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 24/02/19
 * Time: 17:21
 */

namespace frontend\widgets\category;

use frontend\modules\product\models\Categories;
use yii\bootstrap\Widget;

class CategoryWidget extends Widget
{

    public function run (){
        $categories = Categories::find()
            ->with(['products' => function($categories){
                $categories->with('images');
            }])
            ->asArray()->all();

        return $this->render('index',['categories' => $categories]);
    }

}