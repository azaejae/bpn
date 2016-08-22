<?php

class user
{

    //atribut
    protected $_nip;
    protected $_password;
    protected $_nama_lengkap;
    protected $_db;

    //int
    protected $_status;


    public function __construct()
    {
        require_once "db.php";
        $this->_db = dbConn::getConnection();
    }

    public function setValue($nip,$password,$nama_lengkap, $status = 2)
    {
        $this->_nip=$nip;
        $this->_password = hash('sha256',$password);
        $this->_nama_lengkap = $nama_lengkap;
        $this->_status = $status;
    }


    public function login($nip,$password,$status = null)
    {
        $pass=hash('MD5',$password);
        $username =$nip;
        if($status==null)
        {
           $sql='SELECT * FROM user WHERE nip=:username AND password=:password AND status <> 1';
        }
        else
        {
            $sql='SELECT * FROM user WHERE nip=:username AND password=:password';
        }

        try
        {
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('username'=>$username,'password'=>$pass));
            $data=$exe->fetchColumn();
            if($exe->rowCount()>0)
            {
                $_SESSION['username']=$username;
                $hasil=array('hasil'=>'berhasil');
                echo json_encode($hasil);
            }
            else
            {
                $pesan=array('hasil'=>'gagal','pesan'=>'username atau password salah');
                echo json_encode($pesan);
            }

        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'error','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }

    public function tambahUser()
    {
        $sql="INSERT INTO user(nip,password,status,nama_lengkap) VALUES (:nip,:password,:status,:nama_lengkap)";

        try
        {
            $ex=$this->_db->prepare($sql);
            $ex->execute(array('nip'=>$this->_nip,'password'=>$this->_password,'status'=>$this->_status,'nama_lengkap'=>$this->_nama_lengkap));
            $hasil=array('status'=>'berhasil','pesan'=>'Pengguna berhasil ditambahkan');
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('status'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);

        }
    }

    public function  getNamaUser($nip=null)
    {
        if($nip==null)
        {
            $sql='SELECT nip,nama_lengkap,status FROM user';
        }
        else
        {
            $sql='SELECT nip,nama_lengkap,status FROM user WHERE nip = :nip';
        }


        try
        {
            $exe=$this->_db->prepare($sql);
            if($nip==null)
            {
                $exe->execute();
            }
            else
            {
                $exe->execute(array('nip'=>$nip));
            }
            $data=$exe->fetchAll(PDO::FETCH_ASSOC);
            if($exe->rowCount()>0)
            {
                $hasil=array('data'=>$data);
                echo json_encode($hasil);
            }
            else
            {
                $pesan=array('hasil'=>'gagal','pesan'=>'Data Tidak ditemukan');
                echo json_encode($pesan);
            }
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'error','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }

    }
    public function hapusUser($nip)
    {
        $sql='DELETE FROM user WHERE nip=:nip';
        try
        {
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('nip'=>$nip));
            $pesan=array('hasil'=>'sukses','pesan'=>'User berhasil dihapus');
            echo json_encode($pesan);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'error','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }

    }

}
