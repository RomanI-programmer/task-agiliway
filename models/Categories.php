<?php

namespace app\models;

use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $date_entered
 * @property string|null $name
 * @property string|null $description
 *
 * @property Articles[] $articles
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_entered'], 'safe'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date_entered' => Yii::t('app', 'Date Entered'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['category_id' => 'id']);
    }

    public static function getListCategories()
    {
        return ArrayHelper::map(self::find()->all(),'id','name');
    }
}
