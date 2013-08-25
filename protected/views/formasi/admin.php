<?php
/* @var $this FormasiController */
/* @var $model Formasi */


$this->breadcrumbs=array(
	'Formasi'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Formasi', 'url'=>array('index')),
	array('label'=>'Create Formasi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#formasi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Manage Formasi</h2>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'formasi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'tahun_test',
		'id_instansi',
		'id_tenaga_dilamar',
		'id_jabatan',
		'id_kual_pend',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>