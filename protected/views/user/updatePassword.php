<?php

$this->breadcrumbs=array(
	'User'=>array('index'),
     Yii::app()->user->username=>array('view','id'=>Yii::app()->user->id),
	'Update Password',
);
?>

<h2>Update Password User <?php echo Yii::app()->user->username; ?></h2>

<?php $this->renderPartial('_updatePasswordForm', array('model'=>$model)); ?>