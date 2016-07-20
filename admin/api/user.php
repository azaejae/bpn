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

}
else
{
    echo "error, menu tidak ditemukan";
}