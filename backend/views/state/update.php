<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\State */

$this->title = Yii::t('app', 'Update State: {nameAttribute}', [
            'nameAttribute' => $model->name,
        ]);
$this->params['description'] = 'Enter the required data and press update';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>