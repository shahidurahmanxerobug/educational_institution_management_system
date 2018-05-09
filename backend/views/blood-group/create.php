<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BloodGroup */

$this->params['description'] = 'Enter the blood group and press create';
$this->title = Yii::t('app', 'Create Blood Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
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
