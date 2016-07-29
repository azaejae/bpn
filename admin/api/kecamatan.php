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
    elseif($_GET['menu']=='daftar_kec')
    {
        $kec= new kecamatan();
        $kec->getKecamatanByNama();
    }
    elseif($_GET['menu']=='ubah_kecamatan')
    {
        $kecamatan->updateKecamatan($_POST['id_kecamatan'],$_POST['kode'],$_POST['nama_kecamatan']);
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
