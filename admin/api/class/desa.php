<?php

class desa
{
    protected $_kode;
    protected $_nama_desa_kel;
    protected $_id_kecamatan;
    protected $_db;

    public function __construct()
    {
        require_once "db.php";
        $this->_db = dbConn::getConnection();
    }


    public function setValue($id_kecamatan,$kode,$nama_desa_kel)
    {
        $this->_id_kecamatan=$id_kecamatan;
        $this->_kode=$kode;
        $this->_nama_desa_kel=$nama_desa_kel;
    }

    public function tambahDesa()
    {
        $sql='INSERT INTO desa_kelurahan(id_kecamatan,kode,nama_desa_kel) VALUES (:id_kecamatan,:kode,:nama_desa_kel)';
        try
        {
            $ex=$this->_db->prepare($sql);
            $ex->execute(array('id_kecamatan'=>$this->_id_kecamatan,'kode'=>$this->_kode,'nama_desa_kel'=>$this->_nama_desa_kel));
            $hasil=array('status'=>'berhasil','pesan'=>'Desa berhasil ditambahkan');
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('status'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }

    public function getDesaKel($id_desa_kel=null)
    {
        if($id_desa_kel==null)
        {
            $sql='SELECT * FROM v_desa_kecamatan';
        }
        else
        {
            $sql='SELECT * FROM v_desa_kecamatan WHERE id_desa_kel=:id_desa_kel';
        }
        try
        {
            $exe=$this->_db->prepare($sql);
            if($id_desa_kel==null)
            {
                $exe->execute();
            }
            else
            {
                $exe->execute(array('id_desa_kel'=>$id_desa_kel));
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

    public function updateDesa($id_desa,$id_kec,$kode_desa,$nama_desa)
    {
        $sql='UPDATE desa_kelurahan SET id_kecamatan=:id_kec,kode=:kode_desa,nama_desa_kel=:nama_desa WHERE id_desa_kel=:id_desa';
        try
        {
            $ex=$this->_db->prepare($sql);
            $ex->execute(array('id_kec'=>$id_kec,'kode_desa'=>$kode_desa,"nama_desa"=>$nama_desa,'id_desa'=>$id_desa));
            $hasil=array('status'=>'berhasil','pesan'=>'Desa berhasil diubah');
            echo json_encode($hasil);

        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }
    public function getDesaByNama()
    {
        $sql="SELECT CONCAT(nama_desa_kel,' Kec. ',nama_kecamatan) AS label, id_desa_kel FROM v_desa_kecamatan";
        if(isset($_GET['term']))
        {
            $nama_desa=$_GET['term'];
            $sql="SELECT CONCAT(nama_desa_kel,' Kec. ',nama_kecamatan) AS label, id_desa_kel FROM v_desa_kecamatan WHERE nama_desa_kel LIKE '%$nama_desa%'";
        }

        try
        {

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