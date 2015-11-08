<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Chinese Vocab Application';
?>
<div class="site-index text-center">
    <h1>Chinese Symbols</h1>
    <br><br>    
        <div class="col-md-12 text-50 m-auto"> 
            <div class="row">  
                <div class="col-md-1">                    
                    <div class="col-md-1 overlap">
                            <?= Html::encode($symbols[$rand]['id']) ?>
                    </div>
                    <div class="col-md-1 overlap refresh" id="refresh_symbol">
                            <span class="glyphicon glyphicon-refresh hand-hover"></span>
                    </div>
                    <?= Html::encode($symbols[$rand]['symbol']) ?>
                </div>              
                <?php for($i=1; $i<11; $i++): ?>
                    <div class="col-md-1 box-invert">
                        <span class="text-20"><?= Html::encode($i) ?></span>
                    </div>
                <?php endfor; ?>
            </div>
            <?php $i=1; ?>
            <?php foreach($symbols as $symbol): ?>
                <?php if(($i%10)==1): ?>
                    <div class="row">
                        <div class="col-md-1 box-invert">
                            <span class="text-20"><?= Html::encode($i-1); ?></span>
                        </div>
                <?php endif; ?>
                
                <div class="col-md-1">
                    <div class="col-md-1 overlap">
                            <?= Html::encode($symbol['id']) ?>
                    </div>
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

<script>
    $('#refresh_symbol').click(function(){
        location.reload();
    })
</script>
