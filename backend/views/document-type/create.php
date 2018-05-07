<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DocumentType */

$this->title = Yii::t('app', 'Create Document Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
