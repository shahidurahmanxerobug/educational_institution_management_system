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
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="user-view">
            <div>
                <div class="user-profile row">
                    <div class="col-xs-12 col-sm-3 center">
                        <div>
                            <span class="profile-picture">
                                <?php
                                if (!empty($model->userDetail->image)) {
                                    $ulrProfilePic = $model->userDetail->image;
                                } else {
                                    $ulrProfilePic = 'theme-assets/images/genral/users.png';
                                }
                                ?>
                                <img id="avatar" class="editable img-responsive" alt="Alex's Avatar"
                                     src="<?= Url::to('/' . $ulrProfilePic) ?>"/>
                                <a style="position: absolute; top: 5px; right: 18px; z-index: 1500"
                                   class="btn btn-white btn-bold btn-xs" href="#">
                                    <i class="ace-icon fa fa-camera  bigger-110 icon-only"></i>
                                </a>
                            </span>

                            <div class="space-4"></div>

                            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                <div class="inline position-relative">
                                    <span class="white text-uppercase">
                                         <?= $model->userDetail->prefix . ' ' . $model->fullName ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="space-6"></div>

                        <div class="profile-contact-info">
                            <div class="profile-contact-links align-left">
                                <a href="#" class="btn btn-link">
                                    <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
                                    Add as a friend
                                </a>

                                <a href="#" class="btn btn-link">
                                    <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                                    Send a message
                                </a>

                                <a href="#" class="btn btn-link">
                                    <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                                    www.alexdoe.com
                                </a>
                            </div>

                            <div class="space-6"></div>

                            <div class="profile-social-links align-center">
                                <a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
                                    <i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
                                </a>

                                <a href="#" class="tooltip-info" title="" data-original-title="Visit my Twitter">
                                    <i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
                                </a>

                                <a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
                                    <i class="middle ace-icon fa fa-pinterest-square fa-2x red"></i>
                                </a>
                            </div>
                        </div>
                        <div class="hr hr12 dotted"></div>
                        <div class="hr hr16 dotted"></div>
                    </div>

                    <div class="col-xs-12 col-sm-9">
                        <span class="label label-xlg label-primary arrowed arrowed-right width-100">
                            <strong><?= $model->userDetail->userType->name ?> Profile </strong>
                        </span>
                        <div class="space-12"></div>
                        <div class="widget-header widget-header-small">
                            <h3 class="widget-title blue smaller">
                                <i class="ace-icon fa fa-check-square-o orange"></i>
                                Personal Information
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
                            <div class="profile-info-row">
                                <div class="profile-info-name"> C N I C</div>
                                <div class="profile-info-value">
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
                                <div class="profile-info-name"> Email</div>
                                <div class="profile-info-value">
                                    <span>
                                        <?= isset($model->email) ? $model->email : ''; ?>
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
</div>

