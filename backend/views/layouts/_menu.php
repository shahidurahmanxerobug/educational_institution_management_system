<?php

use yii\helpers\Url;

?>
<?php

$adminRole = Yii::$app->authManager->getRole('admin');

?>
<ul class="nav" id="side-menu">
    <li>
        <a href="<?= Url::to(['/']) ?>" class="<?= \Yii::$app->util->startsWith($view, "/") ? "active" : "" ?>">
            <i class="fa fa-dashboard fa-fw"></i>
            <?= Yii::t('app', 'Dashboard') ?>
        </a>
    </li>
    <?php if (\Yii::$app->user->can('superadmin')) { ?>
        <li>
            <a href="<?= Url::to(['/user']) ?>"
               class="<?= \Yii::$app->util->startsWith($view, "user") ? "active" : "" ?>">
                <i class="fa fa-users fa-fw"></i>
                <?= Yii::t('app', 'Users') ?>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="menudropdown">
                <i class="fa fa-cogs fa-fw"></i>
                <?= Yii::t('app', 'General Settings') ?>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?= Url::to(['/marital-status']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "marital-status") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'Marital Status') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/blood-group']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "blood-group") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'Blood Group') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/address-type']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "address-type") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'Address Type') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/country']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "country") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'Countries') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/state']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "state") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'States') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/city']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "city") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'Cities') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/religion']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "religion") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'Religions') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/department']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "department") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'Departments') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/profession']) ?>"
                       class="<?= \Yii::$app->util->startsWith($view, "profession") ? "active" : "" ?>">
                        <i class="fa fa-arrow-right"></i>
                        <?= Yii::t('app', 'Professions') ?>
                    </a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
    <?php } ?>
</ul>