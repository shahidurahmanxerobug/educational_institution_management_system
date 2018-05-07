<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Profession */

$this->params['description'] = 'Enter the profession and press create';
$this->title = Yii::t('app', 'Create Profession');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="profession-create">
            <?=
            $this->renderAjax('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
