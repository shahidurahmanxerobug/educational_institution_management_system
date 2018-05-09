<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AddressType */

$this->params['description'] = 'Enter the address type and press create';
$this->title = Yii::t('app', 'Create Address Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Address Types'), 'url' => ['index']];
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
