<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Profession */

$this->title = Yii::t('app', 'Update Profession: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['description'] = 'Edit the profession and press update';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="profession-update">
            <?=
            $this->renderAjax('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
