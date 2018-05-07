<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Religion */

$this->params['description'] = 'Enter the religion and press create';
$this->title = Yii::t('app', 'Create Religion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Religions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = "Create";
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="religion-create">
            <?=
            $this->renderAjax('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
