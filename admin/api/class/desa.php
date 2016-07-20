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
        $sql="INSERT INTO desa_kelurahan(id_kecamatan,kode,nama_desa_kel) VALUES (:id_kecamatan,:kode,:nama_desa_kel)";
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
}