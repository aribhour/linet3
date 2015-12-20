<?php
$this->params["breadcrumbs"]=array(
	'Items',
);

$this->params["menu"]=array(
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);
?>

<h1>Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
