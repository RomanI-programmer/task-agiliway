<?php

namespace app\forms;

use yii\base\Model;

/**
 * Class SearchArticlesForm
 * @package app\forms
 */
class SearchArticlesForm extends Model
{

    /**
     * @var
     */
    public $nameArticles;
    /**
     * @var
     */
    public $idCategories;
    /**
     * @var
     */
    public $idTags;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['idCategories','idTags'], 'safe'],
            ['nameArticles', 'string', 'max' => 100],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'nameArticles' => 'Name Articles',
            'idCategories' => 'Categories',
            'idTags' => 'Tags',
        ];
    }
}