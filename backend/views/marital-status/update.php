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
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="marital-status-update">
            <?=
            $this->renderAjax('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
