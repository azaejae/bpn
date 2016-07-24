<?php
session_start();
require('class/loker.php');

$loker=new loker();
if(isset($_GET['menu']))
{
    if ($_GET['menu'] == 'getloker')
    {
        if (isset($_GET['id_loker']))
        {
            $loker->getLoker($_GET['id_loker']);
        }
        else
        {
            $loker->getLoker();
        }

    }
    elseif($_GET['menu']=='tambahloker')
    {
        $loker->setValue($_POST['kode'],$_POST['keterangan']);
        $loker->tambahLoker();
    }

}
else
{
    echo "error, halaman tidak ditemukan";
}
