<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AddressType */

$this->params['description'] = 'Enter the address type and press create';
$this->title = Yii::t('app', 'Create Address Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Address Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="address-type-create">
            <?=
            $this->renderAjax('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
