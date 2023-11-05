<?php

/** @var yii\web\View $this */

$this->title = 'Random image';
?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="card">
                <img id="img-elem" src="" class="card-img-top d-none" />
                <div id="img-spinner">
                    <div class="spinner-border text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="card-body">
                    <div id="reject-img" class="btn btn-danger btn-lg"><?=Yii::t('app', 'Reject');?></div>
                    <div id="approve-img" class="btn btn-success btn-lg"><?=Yii::t('app', 'Approve');?></div>
                </div>
            </div>
        </div>
    </div>
</div>
