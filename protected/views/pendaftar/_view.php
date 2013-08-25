<?php
/* @var $this PendaftarController */
/* @var $data Pendaftar */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_ktp')); ?>:</b>
	<?php echo CHtml::encode($data->no_ktp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_sekarang')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_sekarang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_hp')); ?>:</b>
	<?php echo CHtml::encode($data->no_hp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_lulus')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_lulus); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jurusan')); ?>:</b>
	<?php echo CHtml::encode($data->jurusan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IPK')); ?>:</b>
	<?php echo CHtml::encode($data->IPK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_sekolah_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->nama_sekolah_terakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_sekolah_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_sekolah_terakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('terverifikasi')); ?>:</b>
	<?php echo CHtml::encode($data->terverifikasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_verifikator')); ?>:</b>
	<?php echo CHtml::encode($data->id_verifikator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_verifikasi')); ?>:</b>
	<?php echo CHtml::encode($data->kode_verifikasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->id_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tenaga_dilamar')); ?>:</b>
	<?php echo CHtml::encode($data->id_tenaga_dilamar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->id_jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_formasi')); ?>:</b>
	<?php echo CHtml::encode($data->id_formasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kual_pend')); ?>:</b>
	<?php echo CHtml::encode($data->id_kual_pend); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pendidikan_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->id_pendidikan_terakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lokasi_test')); ?>:</b>
	<?php echo CHtml::encode($data->id_lokasi_test); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_status_pelamar')); ?>:</b>
	<?php echo CHtml::encode($data->id_status_pelamar); ?>
	<br />

	*/ ?>

</div>