<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['description'] = 'Here you can manage users, useing thoughout the system';
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
        <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-primary" aria-expanded="true">
                <i class='fa fa-user-plus'></i>
                <?= Yii::t('app', 'Create Users') ?>
                <i class="fa fa-angle-down"></i>
            </button>

            <ul class="dropdown-menu dropdown-primary">
                <?php
                $userTypes = \backend\models\UserType::find()->all();
                foreach ($userTypes as $type) { ?>
                    <?php if ($type->id !== 1) { ?>
                        <li>
                            <a href="<?= Url::to(['user/create', 'userType' => Yii::$app->util->encrypt($type->id)]) ?>">
                                <i class='fa fa-angle-double-right'></i>
                                <?= Yii::t('app', " " . 'Create ' . $type->name) ?>
                            </a>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
        <br><br>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout'=>"{items}{pager}{summary}",
            'showFooter' => true,
            'showHeader' => true,
            'showOnEmpty' => true,
            //    'emptyCell'=>'-',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                //'username',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
                [
                    'attribute' => 'Full Name',
                    'value' => 'fullName',
                    'filter' => true,
                ],
                'email:email',
                [
                    'attribute' => 'Mobile #',
                    'value' => 'userDetail.mobile_number',
                ],
                [
                    'contentOptions' => ['class' => 'text-center'],
                    'attribute' => 'status',
                    'value' => 'statusHTML',
                    'format' => 'html',
                    'filter' => \yii\helpers\ArrayHelper::map([['id' => 0, 'name' => 'Inactive'], ['id' => 1, 'name' => 'Active'], ['id' => 2, 'name' => 'Deleted']], 'id', 'name'),
                    'contentOptions' => ['style'=>'padding:0px 0px 0px 30px;vertical-align: middle;'],
                ],
                [
                    'contentOptions' => ['class' => 'text-center'],
                    'attribute' => 'type',
                    'value' => 'userTypeHTML',
                    'format' => 'html',
                    'filter' => \yii\helpers\ArrayHelper::map(\backend\models\UserType::find()->all(), 'id', 'name'),
                    'contentOptions' => ['style'=>'padding:0px 0px 0px 30px;vertical-align: middle;'],
                ],
                //'created_at:datetime',
                //'created_by',
                //'updated_at',
                //'updated_by',
                [
                    'contentOptions' => ['class' => 'text-center'],
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'headerOptions' => ['width' => '100'],
                    'template' => '{all}',
                    'buttons' => [
                        'all' => function ($url, $model, $key) {
                            return ButtonDropdown::widget([
                                'encodeLabel' => false, // if you're going to use html on the button label
                                'label' => "<i class='fa fa-wrench'></i>",
                                'dropdown' => [
                                    'encodeLabels' => false, // if you're going to use html on the items' labels
                                    'items' => [
                                        [
                                            'label' => \Yii::t('yii', "<i class='fa fa-eye'></i> " . 'View'),
                                            'url' => ['view', 'id' => Yii::$app->util->encrypt($model->id)],
                                            //  'visible' => Yii::$app->user->can('superadmin') ? true : false,
                                        ],
                                        [
                                            'label' => \Yii::t('yii', "<i class='fa fa-edit'></i> " . 'Update'),
                                            'url' => ['update', 'id' => Yii::$app->util->encrypt($model->id)],
                                            'visible' => false, // if you want to hide an item based on a condition, use this
                                        ],
                                        [
                                            'label' => \Yii::t('yii', "<i class='fa fa-lock'></i> " . 'Password'),
                                            'url' => ['password', 'id' => Yii::$app->util->encrypt($model->id)],
                                            'visible' => Yii::$app->user->can('superadmin') ? true : false, // if you want to hide an item based on a condition, use this
                                        ],
                                        [
                                            'label' => \Yii::t('yii', "<i class='fa fa-trash'></i> " . 'Delete'),
                                            'linkOptions' => [
                                                'data' => [
                                                    'method' => 'post',
                                                    'confirm' => \Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                ],
                                            ],
                                            'url' => ['delete', 'id' => Yii::$app->util->encrypt($model->id)],
                                            'visible' => Yii::$app->user->can('superadmin') ? true : false, // same as above
                                        ],
                                    ],
                                    'options' => [
                                        'class' => 'dropdown-menu pull-right', // right dropdown
                                    ],
                                ],
                                'options' => [
                                    'class' => 'btn btn-primary', // btn-success, btn-info, et cetera
                                ],
                                //    'split' => true, // if you want a split button
                            ]);
                        },
                    ],
                ],
            ],
            'tableOptions' => ['class' => 'table'],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>
