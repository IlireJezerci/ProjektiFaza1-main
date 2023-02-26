<?php
require_once('./dbcon.php');


class userCRUD extends dbCon
{
    private $userID;
    private $emri;
    private $mbiemri;
    private $username;
    private $email;
    private $password;
    private $aksesi;
    private $nrKontaktit;
    private $adresa;
    private $dbConn;

    public function __construct($userID = '', $emri = '', $mbiemri = '', $username = '', $email = '', $password = '', $aksesi = '')
    {
        $this->userID = $userID;
        $this->emri = $emri;
        $this->mbiemri = $mbiemri;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->aksesi = $aksesi;

        $this->dbConn = $this->connDB();
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getEmri()
    {
        return $this->emri;
    }

    public function setEmri($emri)
    {
        $this->emri = $emri;
    }

    public function getMbiemri()
    {
        return $this->mbiemri;
    }

    public function setMbiemri($mbiemri)
    {
        $this->mbiemri = $mbiemri;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAksesi()
    {
        return $this->aksesi;
    }

    public function setAksesi($aksesi)
    {
        $this->aksesi = $aksesi;
    }

    public function getNrKontaktit()
    {
        return $this->nrKontaktit;
    }

    public function setNrKontaktit($nrKontaktit)
    {
        $this->nrKontaktit = $nrKontaktit;
    }

    public function getAdresa()
    {
        return $this->adresa;
    }

    public function setAdresa($adresa)
    {
        $this->adresa = $adresa;
    }

    public function shtoUser()
    {
        try {
            $sql = "INSERT INTO `user`(`emri`, `mbiemri`, `username`, `email`, `password`, `nrTel`, `adresa`) VALUES (?,?,?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emri, $this->mbiemri, $this->username, $this->email, $this->password, $this->nrKontaktit, $this->adresa]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqTeGjithePerdoruesit()
    {
        try {
            $sql = 'SELECT * from user';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function shfaqUserSipasID()
    {
        try {
            $sql = 'SELECT * from user where userID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function kontrolloUser()
    {
        try {
            $sql = 'SELECT * from user WHERE username = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->username]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function kontrolloLlogarin()
    {
        try {
            $sql = 'SELECT * from user WHERE username = ? and password = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->username, $this->password]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function ndryshoAksesin()
    {
        try {
            $sql = "UPDATE user set  `aksesi` = 1   where userID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>