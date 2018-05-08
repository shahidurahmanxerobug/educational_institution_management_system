<?php
$this->params['description'] = 'If you entered a web address please check it was correct.';
$this->title = $exception->statusCode .' Error';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12 text-center">
        <?php if($exception->statusCode === 404): ?>
        <img src="/img/404.png" alt="" class="responsiveimg"><br>
        <?php else: ?>
        <img src="/img/500.png" alt="" class="responsiveimg">
        <?php endif; ?>
        <br>
        <h1 class="page-header ">Sorry! There might be some error ...</h1>
        <br>
        <a class="btn btn-primary" href="<?= \yii\helpers\Url::to('/') ?>">
            <i class="fa fa-home"></i> Go Back to Home
        </a>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<br><br>
