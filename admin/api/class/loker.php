<?php
class loker{

    protected $_kode;
    protected $_keterangan;
    protected $db;


    public function __construct()
    {
        require_once "db.php";
        $this->_db = dbConn::getConnection();
    }

    public function setValue($kode,$keterangan)
    {
        $this->_kode = $kode;
        $this->_keterangan = $keterangan;

    }

    public function getLoker($id=null)
    {
        if($id==null)
        {
            $sql='SELECT * FROM loker';
        }
        else
        {
            $sql='SELECT * FROM loker WHERE id_loker=:id_loker';
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
                $exe->execute(array('id_loker'=>$id));
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

    public function tambahLoker()
    {
        $sql="INSERT INTO loker(kode_loker,keterangan) VALUES (:kode_loker,:keterangan)";

        try
        {
            $ex=$this->_db->prepare($sql);
            $ex->execute(array('kode_loker'=>$this->_kode,'keterangan'=>$this->_keterangan));
            $hasil=array('status'=>'berhasil','pesan'=>'Loker berhasil ditambahkan');
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('status'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }
}
