<?php

namespace app\helpers;

use app\models\Articles;

/**
 * Class AbstractSearchArticles
 * @package app\helpers
 */
abstract class AbstractSearchArticles
{

    /**
     * @var
     */
    protected $nameArticle;
    /**
     * @var
     */
    protected $idCategories;
    /**
     * @var
     */
    protected $idTags;

    /**
     * @param mixed $nameArticle
     * @return AbstractSearchArticles
     */
    public function setNameArticle($nameArticle): self
    {
        $this->nameArticle = $nameArticle;

        return $this;
    }

    /**
     * @param mixed $idCategories
     * @return AbstractSearchArticles
     */
    public function setIdCategories($idCategories): self
    {
        $this->idCategories = $idCategories;

        return $this;
    }

    /**
     * @param mixed $idTags
     * @return AbstractSearchArticles
     */
    public function setIdTags($idTags): self
    {
        $this->idTags = $idTags;

        return $this;
    }

    /**
     * @return array
     */
    public function searchArticles(): array
    {
        $query =  Articles::find()->joinWith(['category'])->joinWith(['tags']);
            if($this->nameArticle){
                $query->where(['like', 'articles.name', $this->nameArticle]);
            }
            $query->andWhere(['or',
                ['tags.id' => $this->idTags],
                ['categories.id' => $this->idCategories],
            ]);

        return $query->all();
    }

}