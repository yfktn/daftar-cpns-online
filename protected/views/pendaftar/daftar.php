<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */
?>

<?php
$this->breadcrumbs=array(
//	'Pendaftar'=>array('index'),
	'Pendaftaran CPNS',
);
?>

<h2>Formulir Pendaftaran CPNS Kalimantan Tengah</h2>

<?php $this->renderPartial('_formDaftar', array('model'=>$model)); ?>