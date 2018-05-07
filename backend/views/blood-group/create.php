<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BloodGroup */

$this->params['description'] = 'Enter the blood group and press create';
$this->title = Yii::t('app', 'Create Blood Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="blood-group-create">
            <?=
            $this->renderAjax('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
