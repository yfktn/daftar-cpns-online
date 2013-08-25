<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="hero-unit">
    <h2>Selamat datang ke aplikasi <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>
    <p>
        Disini Anda bisa melakukan proses pendaftaran secara online untuk penerimaan Calon Pegawai Negeri Sipil 
        Pemerintah Provinsi Kalimantan Tengah tahun 2013.
    </p>
    <?php echo TbHtml::button(TbHtml::icon(TbHtml::ICON_WARNING_SIGN).' Baca Cara Pendaftaran', array(
        'color'=>  TbHtml::BUTTON_COLOR_INFO, 
        'size'=>  TbHtml::BUTTON_SIZE_LARGE)
    ); ?>
</div>

