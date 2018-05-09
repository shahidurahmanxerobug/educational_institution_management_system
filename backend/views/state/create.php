<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\State */

$this->params['description'] = 'Enter the required data and press create';
$this->title = Yii::t('app', 'Create State');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
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