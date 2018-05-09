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
<div class="panel panel-default">
    <div class="panel-body">
        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
