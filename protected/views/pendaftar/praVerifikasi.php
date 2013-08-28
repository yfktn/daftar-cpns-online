<?php
/* @var $this PendaftarController */
/* @var $model Pendaftar */
$num = 0;
?>

<?php
$this->breadcrumbs = array(
//	'Pendaftar'=>array('index'),
    "Pelamar Atas Nama $model->nama dengan Kode Verifikasi $model->kode_verifikasi",
);
?>

<?php if (Yii::app()->user->hasFlash('pesan')): ?>
    <?php
    echo
    TbHtml::alert(
            TbHtml::ALERT_COLOR_INFO, TbHtml::labelTb('Perhatian!', $htmlOptions = array('color' => TbHtml::LABEL_COLOR_IMPORTANT))
            . ' ' . Yii::app()->user->getFlash('pesan'));
    ?>
<?php endif; ?>
<center>
    <h2><u>Formulir Pendaftaran CPNS Tahun <?php echo Yii::app()->params['yearTest']; ?></u><br>
        <span style="font-size: 20pt;">Pelamar Umum</span></h2>
    <br>
</center>
<TABLE class="table table-hover" WIDTH=665 CELLPADDING=4 CELLSPACING=0>
    <COLGROUP>
        <COL WIDTH=20>
        <COL WIDTH=257>
        <COL WIDTH=19>
        <COL WIDTH=204>
    </COLGROUP>
    <COLGROUP>
        <COL WIDTH=125>
    </COLGROUP>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Nomor KTP</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->no_ktp); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Kode Verifikasi</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->kode_verifikasi); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Nama Lengkap</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->nama); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Tempat, Tanggal Lahir</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode("{$model->tempat_lahir} / {$model->tanggal_lahir}"); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Alamat Lengkap Sekarang</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->alamat_sekarang); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>No. Telp/HP (yang bisa dihubungi)</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->no_hp); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Jenis Kelamin</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->jenisKelaminStr); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Instansi yang Dilamar</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD WIDTH=204 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->idFormasi->idInstansi->nama); ?>
            </P>
        </TD>
        <TD WIDTH=125 STYLE="text-align: center ; border: 1px solid #000000; padding: 0.1cm">
            <P>
<?php echo CHtml::encode($model->idFormasi->idInstansi->id); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Formasi Jabatan yang Dilamar</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD WIDTH=204 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->idFormasi->idJabatan->nama); ?>
            </P>
        </TD>
        <TD WIDTH=125 STYLE="text-align: center ; border: 1px solid #000000; padding: 0.1cm">
            <P>
<?php echo CHtml::encode($model->idFormasi->idJabatan->id); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Pendidikan Terakhir/Tahun Lulus</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD WIDTH=204 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode("{$model->idPendidikanTerakhir->nama} / {$model->tahun_lulus}"); ?>
            </P>
        </TD>
        <TD WIDTH=125 STYLE="text-align: center ; border: 1px solid #000000; padding: 0.1cm">
            <P>
<?php echo CHtml::encode($model->id_pendidikan_terakhir); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Jurusan</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->jurusan); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Nilai Rata-Rata Ijazah/IPK</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->IPK); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Tahun Lulus</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->tahun_lulus); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P><A NAME="__DdeLink__0_1997208997"></A>Nama
                Sekolah/Akademi/PTN/PTS Terakhir</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->nama_sekolah_terakhir); ?>
            </P>
        </TD>
    </TR>
    <TR VALIGN=TOP>
        <TD WIDTH=20 STYLE="border: none; padding: 0cm">
            <P><?php echo ++$num; ?>.</P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P>Alamat Sekolah/Akademi/PTN/PTS Terakhir</P>
        </TD>
        <TD WIDTH=19 STYLE="border: none; padding: 0cm">
            <P>:</P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P>
<?php echo CHtml::encode($model->alamat_sekolah_terakhir); ?>
            </P>
        </TD>
    </TR>
    <TR>
        <TD WIDTH=20 VALIGN=TOP STYLE="border: none; padding: 0cm">
            <P><BR>
            </P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P ALIGN=CENTER><BR>
            </P>
        </TD>
        <TD WIDTH=19 VALIGN=TOP STYLE="border: none; padding: 0cm">
            <P><BR>
            </P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P ALIGN=CENTER><BR>
            </P>
        </TD>
    </TR>
    <TR>
        <TD WIDTH=20 VALIGN=TOP STYLE="border: none; padding: 0cm">
            <P><BR>
            </P>
        </TD>
        <TD WIDTH=257 STYLE="border: none; padding: 0cm">
            <P ALIGN=right><br><br>( Tempelkan <br>Pasphoto 3x4<br>Disini )</P>
        </TD>
        <TD WIDTH=19 VALIGN=TOP STYLE="border: none; padding: 0cm">
            <P><BR>
            </P>
        </TD>
        <TD COLSPAN=2 WIDTH=337 STYLE="border: none; padding: 0cm">
            <P ALIGN=CENTER>…........................,
                ...................................... 2013</P>
            <P ALIGN=CENTER>Tanda Tangan Pelamar,</P>
            <P ALIGN=CENTER><BR>
            </P>
            <P ALIGN=CENTER><BR>
            </P>
            <P ALIGN=CENTER><BR>
            </P>
            <P ALIGN=CENTER>…........................................................................</P>
        </TD>
    </TR>
</TABLE>