<?php
session_start();
require('class/desa.php');

$desa= new desa();

if(isset($_GET['menu']))
{
    if ($_GET['menu'] == 'getnamadesa')
    {
        if (isset($_GET['id_desa_kel']))
        {
            $desa->getDesaKel($_GET['id_desa_kel']);
        }
        else
        {
            $desa->getDesaKel();
        }

    }
    elseif($_GET['menu']=='tambah_desa')
    {
        $desa->setValue($_POST['id_kecamatan'],$_POST['kode'],$_POST['nama_desa']);
        $desa->tambahDesa();
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