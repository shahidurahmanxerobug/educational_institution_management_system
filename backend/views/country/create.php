<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Country */

$this->params['description'] = 'Enter the country and press create';
$this->title = Yii::t('app', 'Create Country');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="country-create">
            <?=
            $this->renderAjax('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
