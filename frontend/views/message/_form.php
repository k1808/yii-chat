<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'creation_time')->textInput() ?>

    <?php //$form->field($model, 'user_id')->textInput() ?>

    <?php // $form->field($model, 'disabled')->textInput() ?>

    <?= $form->field($model, 'messages')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
