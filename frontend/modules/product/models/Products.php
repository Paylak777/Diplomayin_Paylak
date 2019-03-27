<?php

namespace frontend\modules\product\models;

use common\models\Cart;
use common\models\Image;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\AttributesBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property int $cat_id
 * @property int $brand_id
 * @property double $price
 * @property double $sale_price
 * @property int $is_new
 * @property int $is_featured
 * @property int $stock
 * @property int $parent_id
 * @property string $options
 * @property string $image
 * @property string $created_at
 *
 * @property Cart[] $carts
 * @property Image[] $images
 * @property Brand $brand
 * @property Categories $cat
 * @property Reviews[] $reviews
 * @property Variants[] $variants
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'ensureUnique' => true,
                'slugAttribute' => 'slug',
            ],
//            [
//                'class' => AttributeBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => 'stock',
//                    ActiveRecord::EVENT_BEFORE_UPDATE => 'stock',
//                ],
//                'value' => function ($event) {
//                    return rand(1,50);
//                },
//            ],
//            [
//                'class' => AttributesBehavior::className(),
//                'attributes' => [
////                    'created_at' => [
////                        ActiveRecord::EVENT_BEFORE_INSERT => new Expression('NOW()'),
////                        ActiveRecord::EVENT_BEFORE_UPDATE => new Expression('NOW()')
////                    ],
//                    'stock' => [
//                        ActiveRecord::EVENT_BEFORE_VALIDATE => rand(1,50),
//                        ActiveRecord::EVENT_AFTER_VALIDATE => rand(1,50),
//                    ],
//                ],
//            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'created_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'cat_id', 'brand_id', 'price', 'stock'], 'required'],
            [['description', 'options'], 'string'],
            [['cat_id', 'brand_id', 'is_new', 'is_featured', 'stock', 'parent_id'], 'integer'],
            [['price', 'sale_price'], 'number'],
            [['image','created_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cat_id' => 'id']],
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
            'description' => 'Description',
            'slug' => 'Slug',
            'cat_id' => 'Category',
            'brand_id' => 'Brand',
            'price' => 'Price',
            'sale_price' => 'Sale Price',
            'is_new' => 'Is New',
            'is_featured' => 'Is Featured',
            'stock' => 'Stock',
            'parent_id' => 'Parent ID',
            'options' => 'Options',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariants()
    {
        return $this->hasMany(Variants::className(), ['prod_id' => 'id']);
    }
}
