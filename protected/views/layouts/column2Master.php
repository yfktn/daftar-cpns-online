<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/mainMaster'); ?>

<div class="span8">
    <?php echo $content; ?>
</div><!-- content -->
<div class="span4">
    <?php if(isset($this->menu[0])): ?>
    <div class="well">
        <?php
        $this->menu = CMap::mergeArray(
            array(
                array('label'=>'Menu Item'),
                array('label'=>'-'),
            ), 
            $this->menu
        );
        echo TbHtml::navList(
            $items=$this->menu
        );
        ?>
    </div>
    <?php endif; ?>
    <div class="well">
        <?php
        echo TbHtml::navList(array(
            array('label'=>'Menu Master'),
            array('label'=>'-'),
            array('label'=>'Master Instansi', 'url'=>array('masterInstansi/index')),
            array('label'=>'Master Tenaga Dilamar', 'url'=>array('masterTenagaDilamar/index')),
            array('label'=>'Master Jabatan', 'url'=>array('masterJabatan/index')),
            array('label'=>'Master Kualifikasi Pendidikan', 'url'=>array('masterKualPend/index')),
            array('label'=>'Master Pendidikan Terakhir', 'url'=>array('masterPendTerakhir/index')),
            array('label'=>'-'),
            array('label'=>'User', 'url'=>array('user/index')),
            array('label'=>'-'),
            array('label'=>'Buat Formasi', 'url'=>array('formasi/index')),
            array('label'=>'Prasarat Formasi', 'url'=>array('prasarat/index')),
            array('label'=>'-'),
            array('label'=>'Status Pelamar', 'url'=>array('statusPelamar/index')),
            array('label'=>'List Pelamar', 'url'=>array('adminPelamar/index')),
        ));
        ?>
    </div>
</div>

<?php $this->endContent(); ?>