<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string|null $date_entered
 * @property string|null $name
 * @property string|null $description
 * @property int|null $category_id
 *
 * @property Categories $category
 * @property Tags[] $tags
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_entered'], 'safe'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['article_id' => 'id']);
    }
}
