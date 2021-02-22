<?php

/* @var $this yii\web\View */

/** @var $formSearch SearchArticlesForm */

/** @var $articles AbstractSearchArticles */

use app\forms\SearchArticlesForm;
use app\helpers\AbstractSearchArticles;
use app\models\Categories;
use app\models\Tags;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->title = 'Aligiway task';
?>
<div class="site-index">
    <?php
    $form = ActiveForm::begin();
    ?>
    <div class="row">
        <div class="col">
            <?= $form->field($formSearch, 'nameArticles')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($formSearch, 'idCategories')->dropDownList(
                Categories::getListCategories(),
                [
                    'multiple' => 'multiple',
                ]
            ) ?>
        </div>
        <div class="col">
            <?= $form->field($formSearch, 'idTags')->dropDownList(
                Tags::getListTags(),
                [
                    'multiple' => 'multiple',
                ]
            ) ?>
        </div>
    </div>

    <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>

    <?php
    ActiveForm::end();
    ?>

    <?php
    if (isset($articles)){
    ?>

    <?= Html::tag('h1','Result search:') ?>
    <div class="row">
        <?php
        foreach ($articles as $article) {
            ?>

            <div class="col-lg-4 col-sm-4">
                <?= Html::tag('h3', "Name Article: {$article->name}")?>
                <?= Html::tag('p', "Article description: {$article->description}")?>
            </div>
            <?php
        }
        }
    else{
        echo 'Not found';
    }
        ?>
    </div>

</div>
