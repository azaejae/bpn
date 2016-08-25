<?php

class berkas
{
    protected $_no_buku;
    protected $_barcode;
    protected $_id_desa_kel;
    protected $_id_loker;
    protected $_asal_hak;
    protected $_nama_pemegang_hak;
    protected $_jenis_hak;
    protected $_nomor_hak;
    protected $_d_i_307;
    protected $_d_i_208;
    protected $_surat_ukur;
    protected $_tanggal_surat_ukur;
    protected $_luas;
    protected $_tanggal_terbit;
    protected $_penerbit;
    protected $_penunjuk;
    protected $_status_pinjam;
    protected $_db;

    /**
     * berkas constructor.
     */
    public function __construct()
    {
        require_once "db.php";
        $this->_db = dbConn::getConnection();

    }


    /**
     * @return mixed
     */
    public function getNoBuku()
    {
        return $this->_no_buku;
    }

    /**
     * @param mixed $no_buku
     */
    public function setNoBuku($no_buku)
    {
        $this->_no_buku = $no_buku;
    }

    /**
     * @return mixed
     */
    public function getBarcode()
    {
        return $this->_barcode;
    }

    /**
     * @param mixed $barcode
     */
    public function setBarcode($barcode)
    {
        $this->_barcode = $barcode;
    }

    /**
     * @return mixed
     */
    public function getIdDesaKel()
    {
        return $this->_id_desa_kel;
    }

    /**
     * @param mixed $id_desa_kel
     */
    public function setIdDesaKel($id_desa_kel)
    {
        $this->_id_desa_kel = $id_desa_kel;
    }

    /**
     * @return mixed
     */
    public function getIdLoker()
    {
        return $this->_id_loker;
    }

    /**
     * @param mixed $id_loker
     */
    public function setIdLoker($id_loker)
    {
        $this->_id_loker = $id_loker;
    }

    /**
     * @return mixed
     */
    public function getAsalHak()
    {
        return $this->_asal_hak;
    }

    /**
     * @param mixed $asal_hak
     */
    public function setAsalHak($asal_hak)
    {
        $this->_asal_hak = $asal_hak;
    }

    /**
     * @return mixed
     */
    public function getNamaPemegangHak()
    {
        return $this->_nama_pemegang_hak;
    }

    /**
     * @param mixed $nama_pemegang_hak
     */
    public function setNamaPemegangHak($nama_pemegang_hak)
    {
        $this->_nama_pemegang_hak = $nama_pemegang_hak;
    }

    /**
     * @return mixed
     */
    public function getJenisHak()
    {
        return $this->_jenis_hak;
    }

    /**
     * @param mixed $jenis_hak
     */
    public function setJenisHak($jenis_hak)
    {
        $this->_jenis_hak = $jenis_hak;
    }

    /**
     * @return mixed
     */
    public function getNomorHak()
    {
        return $this->_nomor_hak;
    }

    /**
     * @param mixed $nomor_hak
     */
    public function setNomorHak($nomor_hak)
    {
        $this->_nomor_hak = $nomor_hak;
    }

    /**
     * @return mixed
     */
    public function getDI307()
    {
        return $this->_d_i_307;
    }

    /**
     * @param mixed $d_i_307
     */
    public function setDI307($d_i_307)
    {
        $this->_d_i_307 = $d_i_307;
    }

    /**
     * @return mixed
     */
    public function getDI208()
    {
        return $this->_d_i_208;
    }

    /**
     * @param mixed $d_i_208
     */
    public function setDI208($d_i_208)
    {
        $this->_d_i_208 = $d_i_208;
    }

    /**
     * @return mixed
     */
    public function getSuratUkur()
    {
        return $this->_surat_ukur;
    }

    /**
     * @param mixed $surat_ukur
     */
    public function setSuratUkur($surat_ukur)
    {
        $this->_surat_ukur = $surat_ukur;
    }

    /**
     * @return mixed
     */
    public function getTanggalSuratUkur()
    {
        return $this->_tanggal_surat_ukur;
    }

    /**
     * @param mixed $tanggal_surat_ukur
     */
    public function setTanggalSuratUkur($tanggal_surat_ukur)
    {
        $this->_tanggal_surat_ukur = $tanggal_surat_ukur;
    }

    /**
     * @return mixed
     */
    public function getLuas()
    {
        return $this->_luas;
    }

    /**
     * @param mixed $luas
     */
    public function setLuas($luas)
    {
        $this->_luas = $luas;
    }

    /**
     * @return mixed
     */
    public function getTanggalTerbit()
    {
        return $this->_tanggal_terbit;
    }

    /**
     * @param mixed $tanggal_terbit
     */
    public function setTanggalTerbit($tanggal_terbit)
    {
        $this->_tanggal_terbit = $tanggal_terbit;
    }

    /**
     * @return mixed
     */
    public function getPenerbit()
    {
        return $this->_penerbit;
    }

    /**
     * @param mixed $penerbit
     */
    public function setPenerbit($penerbit)
    {
        $this->_penerbit = $penerbit;
    }

    /**
     * @return mixed
     */
    public function getPenunjuk()
    {
        return $this->_penunjuk;
    }

    /**
     * @param mixed $penunjuk
     */
    public function setPenunjuk($penunjuk)
    {
        $this->_penunjuk = $penunjuk;
    }

    /**
     * @return mixed
     */
    public function getStatusPinjam()
    {
        return $this->_status_pinjam;
    }

    /**
     * @param mixed $status_pinjam
     */
    public function setStatusPinjam($status_pinjam)
    {
        $this->_status_pinjam = $status_pinjam;
    }


    public function getDaftarBerkas()
    {
        $sql='SELECT no_buku,barcode,nama_pemegang_hak,jenis_hak,nomor_hak FROM buku_tanah';
        try
        {
            $exe=$this->_db->prepare($sql);
            $exe->execute();
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

    public function tambahBerkas()
    {
        $sql='
                INSERT INTO buku_tanah(no_buku,barcode,id_desa_kel,id_loker,asal_hak,nama_pemegang_hak,jenis_hak,nomor_hak,d_i_307,d_i_208,surat_ukur,tgl_surat_ukur,luas,tgl_terbit,penerbit,penunjuk,status_pinjam)
                VALUES(:no_buku,:barcode,:id_desa_kel,:id_loker,:asal_hak,:nama_pemegang_hak,:nomor_hak,:d_i_307,:d_i_208,:surat_ukur,:tgl_surat_ukur,:luas,:tgl_terbit,:penerbit,:penunjuk,:status_pinjam)';

        try
        {
            $exe=$this->_db->prepare($sql);
            $exe->execute(array(
                'no_buku'=>$this->getNoBuku(),
                'barcode'=>$this->getBarcode(),
                'id_desa_kel'=>$this->getIdDesaKel(),
                'id_loker'=>$this->getIdLoker(),
                'asal_hak'=>$this->getAsalHak(),
                'nama_pemegang_hak'=>$this->getNamaPemegangHak(),
                'nomor_hak'=>$this->getNomorHak(),
                'd_i_307'=>$this->getDI307(),
                'd_i_208'=>$this->getDI208(),
                'surat_ukur'=>$this->getSuratUkur(),
                'tgl_surat_ukur'=>$this->getTanggalSuratUkur(),
                'luas'=>$this->getLuas(),
                'tgl_terbit'=>$this->getTanggalTerbit(),
                'penerbit'=>$this->getPenerbit(),
                'penunjuk'=>$this->getPenunjuk(),
                'status_pinjam'=>$this->getStatusPinjam()
                ));

            $hasil=array('status'=>'berhasil','pesan'=>'Berkas berhasil ditambahkan');
            echo json_encode($hasil);

        }
        catch(PDOException $e)
        {
            $hasil=array('status'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }

}