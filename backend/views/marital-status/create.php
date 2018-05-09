<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaritalStatus */
$this->params['description'] = 'Enter the marital status and press create';
$this->title = Yii::t('app', 'Create Marital Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marital Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="panel panel-default">
    <div class="panel-body">            <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>

