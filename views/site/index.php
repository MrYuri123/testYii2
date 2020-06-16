<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>

<ul>
    <?php for($i; $i < rand(100, 1000); $i++): ?>

    <li style="cursor:pointer" data-toggle="modal" data-target="#w0">Get Gif</li>

    <?php endfor; ?>
</ul>

<?php
Modal::begin();
?>

<?php 
    $activeform = ActiveForm::begin([
        'options' => ['class' => 'modal-form'],
    ]) ?>
        <div class="captcha-wrapper">
            <?= $activeform->field($form, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>
        </div>


    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-submit']) ?>

<?php ActiveForm::end() ?>

<?php
Modal::end();
?>
</body>
</html>
