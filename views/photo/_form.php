<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'public_id')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'version')->textInput() ?>

    <?= $form->field($model, 'signature')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'format')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'resource_type')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'bytes')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'etag')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'secure_url')->textInput(['maxlength' => 200]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
