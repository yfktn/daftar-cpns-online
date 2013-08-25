<?php
/**
 * Load isian untuk pilihan formasi 
 * dipanggila dari pendaftar/renderIsianPilihanFormasi
 */
$curr_tenaga = '';
$curr_jabatan = '';

/**
 * Generate nama dari field
 * @param string $model_name
 * @param string $attribute_name
 * @return string
 */
function generateFieldName($model_name, $attribute_name) {
    return sprintf("%s[%s]", $model_name, $attribute_name);
}
?>
<table id="table-formasi" class="table table-striped">
    <thead>
        <tr>
            <th>Jabatan</th>
            <th>Kualifikasi Pendidikan</th>
            <th>Kolom Pemilihan Formasi</th>
        </tr>
    </thead>
    <?php foreach ($data as $item): ?>
        <?php if ($curr_tenaga != $item['tenaga_dilamar']): // GROUPING TENAGA DILAMAR ?>
            <tr>
                <td colspan="3"><h4><?php echo $item['tenaga_dilamar']; ?></h4></td>
            </tr>
            <?php $curr_tenaga = $item['tenaga_dilamar']; ?>
        <?php endif; ?>
        <tr>
            <?php if ($curr_jabatan != $item['jabatan']): // GROUPING JABATAN?>
                <td>
                    <?php
                    echo $item['jabatan'];
                    $curr_jabatan = $item['jabatan'];
                    ?>
                </td>
            <?php else: ?>
                <td>
                    &nbsp;
                </td>
            <?php endif; ?>
            <td>
                <?php echo $item['kual_pend']; // Kualifikasi Pendidikan?>
            </td>
            <td><center>
                <?php
                echo TbHtml::radioButton(
                        generateFieldName($model_name, $attribute_name), 
                        $checked = strcmp($value,$item['id'])==0, 
                        $htmlOptions = array('value' => $item['id']));
                ?>
                </center>
            </td>
        </tr>
<?php endforeach; ?>
</table>
<style>
    .highlight-row { font-weight: bold; }
</style>
    
<script lang="javascript">
    var $table = $('#table-formasi');
    $('#table-formasi tr').click(function() {
        var $this = $(this);
        var $last = $table.data('last-highlight');
        if($last && $last.length) $last.children('td').removeClass('highlight-row');
        $this.find('input[type=radio]').prop('checked', true);
        $this.children('td').addClass('highlight-row');
        $table.data('last-highlight', $this);
    //    $('#tableSelect tr td').css('background-color','#FFF');
    //    $(this).children('td').css('background-color','#000');
    });
</script>
