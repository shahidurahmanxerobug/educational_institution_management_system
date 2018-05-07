<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BloodGroup */

$this->title = Yii::t('app', 'Update Blood Group: {nameAttribute}', [
            'nameAttribute' => $model->name,
        ]);
$this->params['description'] = 'Enter the blood group and press update';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Groups'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="blood-group-update">
            <?=
            $this->renderAjax('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
