<?php

class kecamatan
{
    protected $_kode;
    protected $_nama_kecamatan;
    protected $_db;

    public function __construct()
    {
        require_once "db.php";
        $this->_db = dbConn::getConnection();
    }

    public function setValue($kode,$nama_kecamatan)
    {
        $this->_kode = $kode;
        $this->_nama_kecamatan = $nama_kecamatan;

    }

    public function tambahKecamatan()
    {
        $sql="INSERT INTO kecamatan(kode,nama_kecamatan) VALUES (:kode,:nama_kecamatan)";
        try
        {
            $ex=$this->_db->prepare($sql);
            $ex->execute(array('kode'=>$this->_kode,'nama_kecamatan'=>$this->_nama_kecamatan));
            $hasil=array('status'=>'berhasil','pesan'=>'Kecamatan berhasil ditambahkan');
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('status'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }

    public function getNamaKecamatan($id = null)
    {
        if($id==null)
        {
            $sql='SELECT * FROM kecamatan';
        }
        else
        {
            $sql='SELECT * FROM kecamatan WHERE id_kecamatan=:id_kecamatan';
        }

        try
        {
            $exe=$this->_db->prepare($sql);
            if($id==null)
            {
                $exe->execute();
            }
            else
            {
                $exe->execute(array('id_kecamatan'=>$id));
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

    public function getKecamatanByNama()
    {
        $sql="select nama_kecamatan as label,id_kecamatan FROM kecamatan";
        if(isset($_GET['term']))
        {
            $nama_kec=$_GET['term'];
            $sql = "select nama_kecamatan as label,id_kecamatan FROM kecamatan WHERE nama_kecamatan LIKE '%$nama_kec%'";
        }
        try{

            $hasil=$this->_db->query($sql);
            $data=$hasil->fetchAll(PDO::FETCH_ASSOC);
            //$data=array('data'=>$data);
            echo json_encode($data);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }


}