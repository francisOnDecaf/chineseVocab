<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Chinese Vocab Application';
?>
<div class="site-index text-center">
    <h1>Chinese</h1>
        <div class="col-md-12 text-50 m-auto"> 
            <div class="row">  
                <div class="col-md-1">
                    &nbsp;
                </div>              
                <?php for($i=1; $i<11; $i++): ?>
                    <div class="col-md-1 box-invert">
                        <?= Html::encode($i) ?>
                    </div>
                <?php endfor; ?>
            </div>
            <?php $i=1; ?>
            <?php foreach($symbols as $symbol): ?>
                <?php if(($i%10)==1): ?>
                    <div class="row">
                        <div class="col-md-1 box-invert">
                            <?= Html::encode($i-1); ?>
                        </div>
                <?php endif; ?>

                <div class="col-md-1">
                    <?= Html::encode($symbol['symbol']) ?>
                </div>

                <?php if(($i%10)==0): ?>
                        <div class="col-md-1">
                            &nbsp;
                        </div>
                    </div>
                <?php endif; ?>

            <?php $i++; ?>
            <?php endforeach; ?>

        </div>
    </div>
</div>
