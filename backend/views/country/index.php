<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['description'] = 'Here you can manage countries use thoughout the system';
$this->title = Yii::t('app', 'Countries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="country-index">
                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
                <p>
                    <?= Html::a(Yii::t('app', "<i class='fa fa-plus'></i> " . 'Create Country'), ['create'], ['class' => 'btn btn-primary btn-lg']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => "{items}",
                    'showFooter' => true,
                    'showHeader' => true,
                    'showOnEmpty' => true,
                    //    'emptyCell'=>'-',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        'name',
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
                                                'label' => '<i class="ace-icon fa fa-wrench  bigger-110 icon-only"></i>',
                                                'dropdown' => [
                                                    'encodeLabels' => false, // if you're going to use html on the items' labels
                                                    'items' => [
                                                        [
                                                            'label' => \Yii::t('yii', "<i class='fa fa-edit'></i> " . 'Update'),
                                                            'url' => ['update', 'id' => Yii::$app->util->encrypt($model->id)],
                                                            'visible' => Yii::$app->user->can('superadmin') ? true : false, // if you want to hide an item based on a condition, use this
                                                        ],
                                                        [
                                                            'label' => \Yii::t('yii', "<i class='fa fa-trash'></i> " . 'Delete'),
                                                            'linkOptions' => [
                                                                'data' => [
                                                                    'method' => 'get',
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
                    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                    'rowOptions' => function ($model, $key, $index, $grid) {
                        $class = $index % 2 ? 'odd' : 'even';
                        return array('key' => $key, 'index' => $index, 'class' => $class);
                    },
                ]);
                ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
