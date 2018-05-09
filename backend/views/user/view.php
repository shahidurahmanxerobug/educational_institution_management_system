<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->params['description'] = 'Here you can see user details:';
$this->title = Yii::t('app', 'User Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12 text-center ">
        <div class="panel panel-default">
            <div class="userprofile social">
                <div class="userpic">
                    <?php
                    if (!empty($model->userDetail->image)) {
                        $ulrProfilePic = Url::to('/' . $model->userDetail->image);
                    } else {
                        $ulrProfilePic = Url::to('@web/img/user.png');
                    }
                    ?>
                    <img src="<?= $ulrProfilePic ?>" alt="User Profile Image" class="userpicimg">
                    <a href="" class="btn btn-primary settingbtn" title="Change Image">
                        <i class="fa fa-camera"></i>
                    </a>
                </div>
                <h3 class="username"><?= \Yii::$app->util->fullName; ?></h3>
                <p><?= \Yii::$app->util->roleName; ?></p>
                <div class="socials tex-center">
                    <a href="" class="btn btn-circle btn-primary ">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="" class="btn btn-circle btn-danger ">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a href="" class="btn btn-circle btn-info ">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="" class="btn btn-circle btn-warning ">
                        <i class="fa fa-envelope"></i>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="page-header small">Personal Details</h1>
            </div>
            <div class="col-md-12">
                <dl class="dl-horizontal">
                    <dt>Full Name</dt>
                    <dd><?= $model->fullName ?></dd>
                    <dt>Email</dt>
                    <dd><?= $model->email ?></dd>
                    <dt>Phone</dt>
                    <dd><?= $model->userDetail->mobile_number ?></dd>
                    <dt>C N I C</dt>
                    <dd><?= $model->userDetail->cnic ?></dd>
                </dl>
            </div>
            <div class="clearfix"></div>
        </div>



    </div>
</div>















                                    <span>
                                        <?= isset($model->userDetail->cnic) ? $model->userDetail->cnic : ''; ?>
                                    </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Date of Birth</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?php if (isset($model->userDetail->dob)) {
                                            $dateOB = date_create($model->userDetail->dob);
                                            echo date_format($dateOB, 'l, d F-Y');
                                        }
                                        ?>
                                    </span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Phone Number</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= isset($model->userDetail->mobile_number) ? $model->userDetail->mobile_number : ''; ?>
                                    </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Gender</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= isset($model->userDetail->gender->name) ? $model->userDetail->gender->name : ''; ?>
                                    </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Marital Status</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= isset($model->userDetail->maritalStatus->name) ? $model->userDetail->maritalStatus->name : ''; ?>
                                    </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Religion</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= isset($model->userDetail->religion->name) ? $model->userDetail->religion->name : ''; ?>
                                    </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Blood Group</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= isset($model->userDetail->bloodGroup->name) ? $model->userDetail->bloodGroup->name : ''; ?>
                                    </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Birth Place</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= isset($model->userDetail->birth_place) ? $model->userDetail->birth_place : ''; ?>
                                    </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nationality</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= isset($model->userDetail->nationality) ? $model->userDetail->nationality : ''; ?>
                                    </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> About Me</div>
                            <div class="profile-info-value">
                                <span><?= isset($model->userDetail->detail) ? $model->userDetail->detail : ''; ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="widget-header widget-header-small">
                        <h3 class="widget-title blue smaller">
                            <i class="ace-icon fa fa-check-square-o orange"></i>
                            Addresses
                            <a class="btn btn-white btn-bold btn-xs pull-right" href="#">
                                <i class="ace-icon fa fa-edit"></i> edit
                            </a>
                        </h3>
                    </div>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Full Name</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= $model->fullName ?>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="widget-header widget-header-small">
                        <h3 class="widget-title blue smaller">
                            <i class="ace-icon fa fa-check-square-o orange"></i>
                            Documents
                            <a class="btn btn-white btn-bold btn-xs pull-right" href="#">
                                <i class="ace-icon fa fa-edit"></i> edit
                            </a>
                        </h3>
                    </div>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Full Name</div>
                            <div class="profile-info-value">
                                    <span>
                                        <?= $model->fullName ?>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

