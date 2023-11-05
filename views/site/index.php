<?php

/** @var yii\web\View $this */

$this->title = 'Random image';
?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-md-1 col-lg-1 col-xs-0"></div>
                <div class="col-md-10 col-lg-10 col-xs-12">
                    <img id="img-elem" src="" class="card-img-top d-none" />
                    <div id="img-spinner">
                        <div class="spinner-border text-success" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-lg-1 col-xs-0"></div>
        </div>
        <div class="row">
            <div class="col-md-1 col-lg-1 col-xs-0"></div>
            <div class="col-md-5 col-xs-6" style="padding-top: 10px">
                <div id="reject-img" class="btn btn-danger btn-lg btn-block"><?=Yii::t('app', 'Reject');?></div>
            </div>
            <div class="col-xs-12"></div>
            <div class="col-md-5 col-xs-6" style="padding-top: 10px">
                <div id="approve-img" class="btn btn-success btn-lg btn-block"><?=Yii::t('app', 'Approve');?></div>
            </div>
            <div class="col-md-1 col-lg-1 col-xs-0"></div>
        </div>
    </div>
</div>
