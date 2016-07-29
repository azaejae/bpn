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
    else
    {
        echo "error, menu tidak ditemukan";
    }
}
else
{
    echo "error, halaman tidak ditemukan";
}