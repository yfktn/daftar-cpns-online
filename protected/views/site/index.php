<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="hero-unit">
    <h2>Selamat datang ke aplikasi <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>
    <p>
        Disini Anda bisa melakukan proses pendaftaran secara online untuk penerimaan Calon Pegawai Negeri Sipil 
        Pemerintah Provinsi Kalimantan Tengah tahun 2013.
    </p>
    <?php
    echo TbHtml::linkButton(TbHtml::icon(TbHtml::ICON_WARNING_SIGN) . ' Baca Cara Pendaftaran', array(
        'url'=>array('/site/page', 'view'=>'about'),
        'color' => TbHtml::BUTTON_COLOR_INFO,
        'size' => TbHtml::BUTTON_SIZE_LARGE)
    );
    ?>
</div>

<div class="row">
    <div class="span12">
        <div class="row">
            <div class="span4">
                <p class="well well-large">Anda harus membaca terlebih dahulu proses pendaftaran yang dipersyaratkan.<br><br>
                    Setelah Anda mengerti barulah Anda memulai langkah pertama untuk melakukan pengisian formulir pendaftaran.<br><br>
                    <?php echo TbHtml::labelTb('PERHATIAN!', array('color'=>  TbHtml::LABEL_COLOR_IMPORTANT)); ?>Pastikan Anda mendapatkan <b>Kode Verifikasi</b> setelah mendaftar melalui pengisian formulir online.
                    <br>
                    <br>
                    <?php echo TbHtml::linkButton('Klik Untuk Mendaftar', 
                            $htmlOptions=array(
                                'url'=>array('/pendaftar/daftar'),
                                'color'=>  TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>  TbHtml::BUTTON_SIZE_LARGE)); ?>
                </p>
            </div>
            <div class="span4">
                <p class="well well-large">Jangan lupa bahwa setelah mendaftar secara online dengan melakukan pengisian formulir pendaftaran, Anda masih harus mengirimkan berkas yang dibutuhkan untuk di verifikasi.
                    <br>
                    <br>
                    Untuk itu Anda perlu mendapatkan informasi tentang detail berkas yang diperlukan untuk dikirimkan ke Panitia Penerimaan CPNS serta prasyarat lainnya.
                    <br><br>
                    <?php echo TbHtml::labelTb('NB!', array('color'=>  TbHtml::LABEL_COLOR_IMPORTANT)); ?>Pendaftaran secara online digunakan untuk pengisian formulir pendaftaran, berkas persyaratan masih harus dikirimkan melalui pos.
                    <br><br>
                    <?php echo TbHtml::linkButton('Klik Untuk Mengetahui Prasyarat Berkas', 
                            $htmlOptions=array(
                                'url'=>array('/site/page', 'view'=>'prasyaratBerkas'),
                                'color'=>  TbHtml::BUTTON_COLOR_WARNING, 'size'=>  TbHtml::BUTTON_SIZE_LARGE)); ?>
                </p>
            </div>
            <div class="span4">
                <p class="well well-large">Apabila pengisian formulir berhasil maka Anda bisa melakukan proses checking terhadap proses verifikasi berkas Anda.
                    <br><br>
                        <?php echo TbHtml::labelTb('INGAT!', array('color'=>  TbHtml::LABEL_COLOR_IMPORTANT)); ?>Untuk melakukan checking ini memerlukan <b>kode verifikasi</b> yang didapatkan dari proses Mendaftar.
                    <br><br>
                    <?php echo TbHtml::linkButton('Klik Untuk Check Status Verifikasi', 
                            $htmlOptions=array(
                                'url'=>array('/pendaftar/checkStatus'),
                                'color'=>  TbHtml::BUTTON_COLOR_INFO, 'size'=>  TbHtml::BUTTON_SIZE_LARGE)); ?>
                </p>
            </div>
        </div>
    </div>
</div>
