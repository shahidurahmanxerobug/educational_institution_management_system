<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Documents */

$this->title = Yii::t('app', 'Create Documents');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
