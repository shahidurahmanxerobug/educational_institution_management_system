<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Addresses */

$this->title = Yii::t('app', 'Create Addresses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addresses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
