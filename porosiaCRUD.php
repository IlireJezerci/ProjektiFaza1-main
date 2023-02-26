<?php
require_once('./dbcon.php');

class porosiaCRUD extends dbCon
{
    private $porosiaID;
    private $produktiMID;
    private $userID;
    private $emriKlientit;
    private $mbiemriKlientit;
    private $emailKlientit;
    private $nrKontaktit;
    private $adresaKlientit;
    private $dataPorosis;
    private $qmimiProd;
    private $sasiaPorositur;
    private $qmimiTotal;
    private $dbConn;

    public function __construct($porosiaID = '', $produktiMID = '', $userID = '', $emriKlientit = '', $mbiemriKlientit = '', $emailKlientit = '', $nrKontaktit = '', $adresaKlientit = '', $dataPorosis = '', $qmimiProd = '', $sasiaPorositur = '', $qmimiTotal = '')
    {
        $this->porosiaID = $porosiaID;
        $this->produktiMID = $produktiMID;
        $this->userID = $userID;
        $this->emriKlientit = $emriKlientit;
        $this->mbiemriKlientit = $mbiemriKlientit;
        $this->emailKlientit = $emailKlientit;
        $this->nrKontaktit = $nrKontaktit;
        $this->adresaKlientit = $adresaKlientit;
        $this->sasiaPorositur = $qmimiProd;
        $this->sasiaPorositur = $sasiaPorositur;
        $this->dataPorosis = $dataPorosis;
        $this->qmimiTotal = $qmimiTotal;

        $this->dbConn = $this->connDB();
    }



    public function getPorosiaID()
    {
        return $this->porosiaID;
    }

    public function setPorosiaID($porosiaID)
    {
        $this->porosiaID = $porosiaID;
    }

    public function getProduktiID()
    {
        return $this->produktiMID;
    }

    public function setProduktiID($produktiMID)
    {
        $this->produktiMID = $produktiMID;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getEmriKlientit()
    {
        return $this->emriKlientit;
    }

    public function setEmriKlientit($emriKlientit)
    {
        $this->emriKlientit = $emriKlientit;
    }

    public function getMbiemriKlientit()
    {
        return $this->mbiemriKlientit;
    }

    public function setMbiemriKlientit($mbiemriKlientit)
    {
        $this->mbiemriKlientit = $mbiemriKlientit;
    }

    public function getEmailKlientit()
    {
        return $this->emailKlientit;
    }

    public function setEmailKlientit($emailKlientit)
    {
        $this->emailKlientit = $emailKlientit;
    }

    public function getNrKontaktit()
    {
        return $this->nrKontaktit;
    }

    public function setNrKontaktit($nrKontaktit)
    {
        $this->nrKontaktit = $nrKontaktit;
    }

    public function getAdresaKlientit()
    {
        return $this->adresaKlientit;
    }

    public function setAdresaKlientit($adresaKlientit)
    {
        $this->adresaKlientit = $adresaKlientit;
    }

    public function getDataPorosis()
    {
        return $this->dataPorosis;
    }

    public function setDataPorosis($dataPorosis)
    {
        $this->dataPorosis = $dataPorosis;
    }

    public function getQmimiProd()
    {
        return $this->qmimiProd;
    }

    public function setQmimiProd($qmimiProd)
    {
        $this->qmimiProd = $qmimiProd;
    }
    public function getSasiaPorositur()
    {
        return $this->sasiaPorositur;
    }

    public function setSasiaPorositur($sasiaPorositur)
    {
        $this->sasiaPorositur = $sasiaPorositur;
    }

    public function getQmimiTotal()
    {
        return $this->qmimiTotal;
    }

    public function setQmimiTotal($qmimiTotal)
    {
        $this->qmimiTotal = $qmimiTotal;
    }

    public function shtoPorosin()
    {
        try {
            $sql = "INSERT INTO `porosit`(`idKlienti`, `TotaliPorosis`) VALUES (?, ?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID, $this->qmimiTotal]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shtoTeDhenatPorosis()
    {
        try {
            $sql = "INSERT INTO `tedhenatporosis`(`idPorosia`, `idProdukti`, `qmimiProd`, `sasiaPorositur`, `qmimiTotal`) VALUES (?, ?, ?, ?, ?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->porosiaID, $this->produktiMID, $this->qmimiProd, $this->sasiaPorositur, $this->qmimiTotal]);
            $stm->closeCursor();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqPorositEKlientit()
    {
        try {
            $sql = "SELECT * from porosit p  where p.idKlienti = ? ORDER BY nrPorosis DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID]);

            ?>
            <table>
                <tr>
                    <th>Numri i Porosis</th>
                    <th>Qmimi total</th>
                    <th>Data e porosis</th>
                    <th>Funksione</th>
                </tr>

                <?php
                foreach ($stm as $porosia) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $porosia['nrPorosis'] ?>
                        </td>
                        <td>
                            <?php echo $porosia['TotaliPorosis'] ?> €
                        </td>
                        <td>
                            <?php echo $porosia['dataPorosis'] ?>
                        </td>

                        <td>
                            <button class="edito"><a
                                    href="./detajetPorosis.php?porosiaID=<?php echo $porosia['nrPorosis'] ?>">Detajet
                                    e Porosis</a></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </th>
            </table>
            <?php
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function shfaqTeGjithaPorosite()
    {
        try {
            $sql = "SELECT p.nrPorosis, u.emri, u.mbiemri, 
                    u.nrTel, u.Adresa, p.dataPorosis, p.TotaliPorosis
                    from porosit p 
                    inner join user u on u.userID = p.idKlienti 
                    ORDER BY nrPorosis DESC;";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqPorosinSipasID()
    {
        try {
            $sql = "SELECT p.nrPorosis, p.idKlienti, p.TotaliPorosis, p.dataPorosis, 
            t.idProdukti,  t.qmimiProd, t.sasiaPorositur, t.qmimiTotal, 
            pr.foto, pr.emri, u.emri, u.mbiemri, u.email, u.nrTel, u.Adresa  
             from porosit p inner join tedhenatporosis t on p.nrPorosis = t.idPorosia 
             inner join menuja pr on t.idProdukti = pr.produktiMID inner join user u on u.userID = p.idKlienti 
            where nrPorosis = ? 
            ORDER BY nrPorosis DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->porosiaID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqProduktetEPorosisSipasID()
    {
        try {
            $sql = "SELECT p.nrPorosis, p.idKlienti, t.idProdukti, pr.emri, 
            t.qmimiProd, t.sasiaPorositur, t.qmimiTotal, pr.foto, p.dataPorosis, p.TotaliPorosis 
            from porosit p 
            inner join tedhenatporosis t on p.nrPorosis = t.idPorosia 
            inner join menuja pr on t.idProdukti = pr.produktiMID 
            inner join user u on u.userID = p.idKlienti 
            where nrPorosis = ? ORDER BY nrPorosis DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->porosiaID]);

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function numriIPorosisNeKonfirmim()
    {
        try {
            $sql = "SELECT nrPorosis from `porosit` ORDER BY nrPorosis DESC LIMIT 1";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}
?>