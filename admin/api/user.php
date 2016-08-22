<?php
session_start();
require('class/user.php');

$user= new user();

if($_GET['menu']=='loginadmin')
{
    $user->login($_POST['username'],$_POST['password'],1);
}
elseif($_GET['menu']=='login')
{
    $user->login($_POST['username'],$_POST['password']);
}
elseif($_GET['menu']=='tambahuser')
{
    $user->setValue($_POST['nip'],$_POST['password'],$_POST['nama_lengkap'],$_POST['status']);
    $user->tambahUser();

}
elseif($_GET['menu']=='hapususer')
{
    $user->hapusUser($_POST['nip']);
}
elseif($_GET['menu']=='daftaruser')
{
    $user->getNamaUser();
}
else
{
    echo "error, menu tidak ditemukan";
}