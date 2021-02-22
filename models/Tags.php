<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string|null $date_entered
 * @property string|null $name
 * @property string|null $description
 * @property int|null $article_id
 *
 * @property Articles $article
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_entered'], 'safe'],
            [['description'], 'string'],
            [['article_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['article_id' => 'id']],
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
            'article_id' => Yii::t('app', 'Article ID'),
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'article_id']);
    }

    public static function getListTags()
    {
        return ArrayHelper::map(self::find()->all(),'id','name');
    }
}
