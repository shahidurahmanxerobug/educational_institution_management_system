<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;
use yii\widgets\MaskedInput;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin(); ?>
    <?php
    $userType = isset($_GET['userType']) ? $_GET['userType'] : 'User Type Not Set!';
    $user_type = Yii::$app->util->decrypt($userType);
    echo $form->field($userDetails, 'user_type_id')->hiddenInput(['value' => $user_type])->label(false);
    ?>
    <?php
    $user_type = Yii::$app->util->decrypt($userType);
    switch ($user_type) {
        case 1:
            $user_type = 'Administrator';
            $cls = 'danger';
            break;
        case 2:
            $user_type = 'Office Admin';
            $cls = 'warning';
            break;
        case 3:
            $user_type = 'Employee';
            $cls = 'warning';
            break;
        case 4:
            $user_type = 'Teacher';
            $cls = 'success';
            break;
        case 5:
            $user_type = 'Student';
            $cls = 'info';
            break;
        case 6:
            $user_type = 'Parents/Guardian';
            $cls = 'primary';
            break;
    }
    ?>
    <div class="row">
        <div class="align-center">
            <span class="label label-pink"><strong>Creating User </strong></span>
            <span class="label label-<?= $cls ?>">
                <?= $user_type ?>
            </span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php
            echo $form->field($userDetails, 'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
            ]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2">
            <?php $items = ['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Sir' => 'Sir', 'Miss' => 'Miss', 'Madam' => 'Madam'] ?>
            <?=
            $form->field($userDetails, 'prefix', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-heart"></i>'
                    ]
                ]
            ])->widget(Select2::classname(), [
                'data' => $items,
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Prefix ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($userDetails, 'first_name', [
                'addon' => [
                    'prepend' => [
                        'content' => 'First'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
        <div class="col-sm-2">
            <?=
            $form->field($userDetails, 'middle_name', [
                'addon' => [
                    'prepend' => [
                        'content' => 'Mid'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($userDetails, 'last_name', [
                'addon' => [
                    'prepend' => [
                        'content' => 'Last'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <div class="col-sm-6">
            <?=
            $form->field($model, 'email', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-envelope"></i>'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
        <div class="col-sm-6">
            <?=
            $form->field($model, 'password_hash', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-lock"></i>'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <div class="col-sm-6">
            <?=
            $form->field($userDetails, 'mobile_number', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-phone"></i>'
                    ]
                ]
            ])->widget(MaskedInput::className(), [
                'mask' => ['9999-9999999', '9999-9999999'],
            ])->textInput(['maxlength' => true])
            ?>
        </div>
        <div class="col-sm-6">
            <?=
            $form->field($userDetails, 'cnic', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-certificate"></i>'
                    ]
                ]
            ])->widget(MaskedInput::className(), [
                'mask' => ['999999-9999999-9', '999999-9999999-9'],
            ])->textInput(['maxlength' => true])
            ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <div class="col-sm-4">
            <?php
            echo $form->field($userDetails, 'dob')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter birth date ...', 'value' => date('d/m/Y')],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd/mm/yyyy'
                ]
            ]);
            ?>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($userDetails, 'gender_id', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-user"></i>'
                    ]
                ]
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\backend\models\Gender::find()->all(), 'id', 'name'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Gender ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($userDetails, 'marital_status_id', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="glyphicon glyphicon-tag"></i>'
                    ]
                ]
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\backend\models\MaritalStatus::find()->all(), 'id', 'name'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Marital Status ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <div class="col-sm-4">
            <?=
            $form->field($userDetails, 'religion_id', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-slack"></i>'
                    ]
                ]
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\backend\models\Religion::find()->all(), 'id', 'name'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Religion ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($userDetails, 'blood_group_id', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-archive"></i>'
                    ]
                ]
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\backend\models\BloodGroup::find()->all(), 'id', 'name'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Blood Group ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($userDetails, 'birth_place', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-map-marker"></i>'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php if ($user_type === 'Teacher'): ?>
    <div class="form-group">
        <div class="col-md-6">
            <?php
            echo $form->field($teacherModel, 'join_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter Joining Date ...', 'value' => date('d/m/Y')],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm/yyyy'
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $form->field($teacherModel, 'department_id', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-external-link"></i>'
                    ]
                ]
            ])->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\backend\models\Department::find()->all(), 'id', 'name'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select a Department ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if ($user_type === 'Parents/Guardian'): ?>
        <div class="form-group">
            <div class="col-md-6">
                <?=
                $form->field($parentsModel, 'profession_id', [
                    'addon' => [
                        'prepend' => [
                            'content' => '<i class="fa fa-briefcase"></i>'
                        ]
                    ]
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\backend\models\Profession::find()->all(), 'id', 'name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a Profession ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-6">
                <?=
                $form->field($parentsModel, 'income', [
                    'addon' => [
                        'prepend' => [
                            'content' => '<i class="fa fa-credit-card"></i>'
                        ]
                    ]
                ])->textInput(['maxlength' => true])
                ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php $hintMessage = \Yii::t('app', 'Drag and drop images in the editor'); ?>
            <?=
            $form->field($userDetails, 'detail')->widget(TinyMce::className(), [
                'options' => ['rows' => 20, "themes" => "modern"],
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'images_upload_url' => Url::to(['/message-pot/upload']),
                    'paste_data_images' => true,
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ])->hint($hintMessage);
            ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <div class="col-sm-6">
            <?=
            $form->field($userDetails, 'nationality', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-map"></i>'
                    ]
                ]
            ])->textInput(['maxlength' => true])
            ?>
        </div>
        <div class="col-sm-6">
            <div class="pull-right">
                <?php
                $model->status = false;
                echo $form->field($model, 'status')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onText' => 'Active',
                        'offText' => 'Inactive',
                        'size' => 'large',
                        'onColor' => 'success',
                        'offColor' => 'danger',
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="form-group pull-right">
        <?= Html::resetButton('<i class="fa fa-refresh"></i> ' . Yii::t('app', 'Reset'), ['class' => 'btn btn-warning']) ?>
        &nbsp;&nbsp;
        <a href="<?= Url::to(['index']) ?>" class='btn btn-danger'><i class="fa fa-undo"></i> <?= Yii::t('app', 'Cancel') ?></a>
        &nbsp;&nbsp;
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> ' . Yii::t('app', 'Create') : '<i class="fa fa-save"></i> ' . Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        <div class='clearfix'></div>
    </div>

    <?php ActiveForm::end(); ?>
