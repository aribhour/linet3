<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'bank-name-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->field($model,'id'); ?>

	<?php echo $form->field($model,'name'); ?>

	<div class="form-actions">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>
