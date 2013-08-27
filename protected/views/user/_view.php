<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_name),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->id_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />

	<?php /*


	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salt_key')); ?>:</b>
	<?php echo CHtml::encode($data->salt_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login_IP')); ?>:</b>
	<?php echo CHtml::encode($data->last_login_IP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	*/ ?>
    <br />
</div>