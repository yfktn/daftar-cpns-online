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
                TbHtml::menuDivider(),
            ), 
            $this->menu
        );
        echo TbHtml::navList(
            $items=$this->menu
        );
        ?>
    </div>
    <?php endif; ?>
</div>

<?php $this->endContent(); ?>