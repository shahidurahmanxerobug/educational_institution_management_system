<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaritalStatus */

$this->title = Yii::t('app', 'Update Marital Status: {nameAttribute}', [
            'nameAttribute' => $model->name,
        ]);
$this->params['description'] = 'Enter the Marital Status and press Update';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marital Statuses'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="panel panel-default">
    <div class="panel-body">            <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
