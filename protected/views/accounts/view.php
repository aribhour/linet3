<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$this->params["breadcrumbs"]=array(
	'Accounts'=>array('index'),
	$model->id,
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List Accounts'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Account'), 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>


<?php 
 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"View Account") ." #$model->id;",
    //'width' => '800',
)); 
echo kartik\detail\DetailView::widget( array(
	'model'=>$model,
	'attributes'=>array(
		'id',
		//'prefix',
		'type',
		'id6111',
		'pay_terms',
		'src_tax',
		'src_date',
		//'grp',
		'name',
		'contact',
		'department',
		'vatnum',
		'email',
		'phone',
		'dir_phone',
		'cellular',
		'fax',
		'web',
		'address',
		'city',
		'zip',
		'comments',
		'owner',
	),
)); 
 app\widgets\MiniForm::end(); 
 ?>
