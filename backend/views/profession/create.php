<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Profession */

$this->params['description'] = 'Enter the profession and press create';
$this->title = Yii::t('app', 'Create Profession');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
