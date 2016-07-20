<?php
session_start();
require('class/kecamatan.php');

$kecamatan= new kecamatan();

if(isset($_GET['menu']))
{
    if ($_GET['menu'] == 'getnamakecamatan')
    {
        if (isset($_GET['id_kecamatan']))
        {
            $kecamatan->getNamaKecamatan($_GET['id_kecamatan']);
        }
        else
        {
            $kecamatan->getNamaKecamatan();
        }

    }
    elseif($_GET['menu'] == 'tambah_kecamatan')
    {
        $kecamatan->setValue($_POST['kode'],$_POST['nama_kecamatan']);
        $kecamatan->tambahKecamatan();
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
