<?php
session_start();
require('class/berkas.php');
$berkas = new berkas();
if(isset($_GET['menu']))
{
    if($_GET['menu']=='getdaftarberkas')
    {
        $berkas->getDaftarBerkas();
    }
    elseif($_GET['menu']=='tambahberkas')
    {
        $berkas->setNoBuku($_POST['no_buku']);
        $berkas->setBarcode($_POST['barcode']);
        $berkas->setIdDesaKel($_POST['id_desa_kel']);
        $berkas->setIdLoker($_POST['id_loker']);
        $berkas->setAsalHak($_POST['asal_hak']);
        $berkas->setNamaPemegangHak($_POST['nama_pemegang_hak']);
        $berkas->setJenisHak($_POST['jenis_hak']);
        $berkas->setNomorHak($_POST['nomor_hak']);
        $berkas->setDI307($_POST['d_i_307']);
        $berkas->setDI208($_POST['d_i_208']);
        $berkas->setSuratUkur($_POST['surat_ukur']);
        $berkas->setTanggalSuratUkur($_POST['tgl_surat_ukur']);
        $berkas->setLuas($_POST['luas']);
        $berkas->setTanggalTerbit($_POST['tgl_terbit']);
        $berkas->setPenerbit($_POST['penerbit']);
        $berkas->setPenunjuk($_POST['penunjuk']);
        $berkas->setStatusPinjam(1);

        $berkas->tambahBerkas();


    }
    elseif ($_GET['menu']=='cekuploadberkas')
    {
        $berkas->cekUploadBerkas($_GET['no_buku']);
    }
    elseif($_GET['menu']=='detailberkas')
    {
        $berkas->detailBerkas($_GET['no_buku']);
    }
    elseif($_GET['menu']=='uploadberkas')
    {
        $berkas->uploadBerkasBukuTanah($_FILES);
    }
    else
    {
        echo "error, menu tidak ditemukan";
    }
}
else
{
    echo "error, halaman tidak ditemukan";
}