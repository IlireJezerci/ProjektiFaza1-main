<?php
require_once('./dbcon.php');


class menujaCRUD extends dbCon
{
    private $produktiMID;
    private $emri;
    private $kategoria;
    private $foto;
    private $qmimi;
    private $kategoriaID;
    private $emriKategoris;
    private $pershkrimiKategoris;
    private $fotoKategoris;
    private $dbConn;

    public function __construct(
        $produktiMID = '',
        $emri = '',
        $kategoria = '',
        $foto = '',
        $qmimi = '',
        $kategoriaID = '',
        $emriKategoris = '',
        $pershkrimiKategoris = '',
        $fotoKategoris = ''
    )
    {
        $this->produktiMID = $produktiMID;
        $this->emri = $emri;
        $this->kategoria = $kategoria;
        $this->foto = $foto;
        $this->qmimi = $qmimi;
        $this->kategoriaID = $kategoriaID;
        $this->emriKategoris = $emriKategoris;
        $this->pershkrimiKategoris = $pershkrimiKategoris;
        $this->fotoKategoris = $fotoKategoris;
        $this->dbConn = $this->connDB();
    }

    public function shtoNeMenu()
    {
        try {
            $sql = "INSERT INTO `menuja`(`emri`, `kategoria`, `foto`, `qmimi`) VALUES (?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emri, $this->kategoria, $this->foto, $this->qmimi]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shfaqMenun()
    {
        try {
            $sql = 'SELECT * from menuja';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqMenun6Fundit()
    {
        try {
            $sql = 'SELECT * from menuja order by produktiMID DESC Limit 6';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shtoKat()
    {
        try {
            $sql = "INSERT INTO `kat`(`emriKategoris`, `pershkrimiKategoris`, `fotoKategoris`) VALUES (?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriKategoris, $this->pershkrimiKategoris, $this->fotoKategoris]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqKat()
    {
        try {
            $sql = 'SELECT * from kat order by emriKategoris ASC';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    public function getProduktiMID()
    {
        return $this->produktiMID;
    }

    public function setProduktiMID($produktiMID)
    {
        $this->produktiMID = $produktiMID;
    }

    public function getEmri()
    {
        return $this->emri;
    }

    public function setEmri($emri)
    {
        $this->emri = $emri;
    }

    public function getKategoria()
    {
        return $this->kategoria;
    }

    public function setKategoria($kategoria)
    {
        $this->kategoria = $kategoria;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getQmimi()
    {
        return $this->qmimi;
    }

    public function setQmimi($qmimi)
    {
        $this->qmimi = $qmimi;
    }

    public function getKategoriaID()
    {
        return $this->kategoriaID;
    }

    public function setKategoriaID($kategoriaID)
    {
        $this->kategoriaID = $kategoriaID;
    }

    public function getEmriKategoris()
    {
        return $this->emriKategoris;
    }

    public function setEmriKategoris($emriKategoris)
    {
        $this->emriKategoris = $emriKategoris;
    }

    public function getPershkrimiKategoris()
    {
        return $this->pershkrimiKategoris;
    }

    public function setPershkrimiKategoris($pershkrimiKategoris)
    {
        $this->pershkrimiKategoris = $pershkrimiKategoris;
    }

    public function getFotoKategoris()
    {
        return $this->fotoKategoris;
    }

    public function setFotoKategoris($fotoKategoris)
    {
        $this->fotoKategoris = $fotoKategoris;
    }
}

?>