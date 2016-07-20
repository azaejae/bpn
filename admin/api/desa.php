<?php
session_start();
require('class/desa.php');

$kecamatan= new desa();

if(isset($_GET['menu']))
{
    if ($_GET['menu'] == 'getnamadesa')
    {
        if (isset($_GET['id_desa_kel']))
        {
            $kecamatan->getDesaKel($_GET['id_desa_kel']);
        }
        else
        {
            $kecamatan->getDesaKel();
        }

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