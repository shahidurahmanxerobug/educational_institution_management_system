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

    <div class="col-lg-6 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="page-header small">Personal Details</h1>
            </div>
            <div class="col-md-12">
                <dl class="dl-horizontal">
                    <dt>Full Name</dt>
                    <dd><?= $model->fullName ?></dd>
                    <dt>Gender</dt>
                    <dd><?= $model->userDetail->gender->name ?></dd>
                    <dt>Email</dt>
                    <dd><?= $model->email ?></dd>
                    <dt>Mobile Number</dt>
                    <dd><?= $model->userDetail->mobile_number ?></dd>
                    <dt>C N I C</dt>
                    <dd><?= $model->userDetail->cnic ?></dd>
                    <dt>Date of Birth</dt>
                    <dd>
                        <?php if (isset($model->userDetail->dob)) {
                            $dateOB = date_create($model->userDetail->dob);
                            echo date_format($dateOB, 'l, d F-Y');
                        }
                        ?>
                    </dd>
                    <dt>Marital Status</dt>
                    <dd><?= $model->userDetail->maritalStatus->name ?></dd>
                    <dt>Religion</dt>
                    <dd><?= $model->userDetail->religion->name ?></dd>
                    <dt>Blood Group</dt>
                    <dd><?= $model->userDetail->bloodGroup->name ?></dd>
                    <dt>Birth Place</dt>
                    <dd><?= $model->userDetail->birth_place ?></dd>
                    <dt>Nationality</dt>
                    <dd><?= $model->userDetail->nationality ?></dd>
                    <p class="border">
                    <strong>Details:- </strong>
                        <?= $model->userDetail->detail ?>
                    </p>
                </dl>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="page-header small">Addresses</h1>
            </div>
            <div class="col-md-12">
                <dl class="dl-horizontal">
                    <dt></dt>
                    <dd></dd>
                </dl>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="page-header small">Educational Information</h1>
            </div>
            <div class="col-md-12">
                <dl class="dl-horizontal">
                    <dt></dt>
                    <dd></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
