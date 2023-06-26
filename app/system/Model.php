<?php

namespace Arfanasri\RadevFramework\System;

class Model
{
    protected $db;

    /**
     * Nama Tabel
     */
    protected $namaTabel;
    public function __construct()
    {
        $database = new Database();
        require_once __DIR__ . "/../config/database.php";
        $this->db = $database->getConnection($hostname, $dbname, $username, $password);
    }

    public function masukkanData(array $data)
    {
        $fields = "";
        $values = "";
        foreach ($data as $key => $value) {
            $fields .= ", $key";
            $values .= ", '$value'";
        }
        substr($fields, 1);
        substr($values, 1);
        $query = "INSERT INTO '$this->namaTabel' ($fields) VALUES ($values)";
        if ($this->db->query($query)) {
            return $this->db->insert_id;
        } else {
            return false;
        }
    }

    public function perbaharuiData(array $data, string $idField, string $whereValue)
    {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= ", $key = '$value'";
        }
        substr($fields, 1);
        $query = "UPDATE '$this->namaTabel' SET $fields WHERE $idField = '$whereValue'";
        return $this->db->query($query);
    }

    public function ambilSemuaData()
    {
        $query = "SELECT * FROM $this->namaTabel";
        $hasil = $this->db->query($query);
        $kembali = [];
        if ($hasil->num_rows > 0) {
            while ($baris = $hasil->fetch_assoc()) {
                $kembali[] = $baris;
            }
            return $kembali;
        } else {
            return false;
        }
    }

    public function ambilData(string $key, string $value)
    {
        $query = "SELECT * FROM $this->namaTabel WHERE $key='$value'";
        $hasil = $this->db->query($query);
        $kembali = [];
        if ($hasil->num_rows > 0) {
            while ($baris = $hasil->fetch_assoc()) {
                return $baris;
            }
            return false;
        } else {
            return false;
        }
    }

    public function hapusData(string $key, string $value)
    {
        $query = "DELETE FROM $this->namaTabel WHERE $key='$value'";
        return $this->db->query($query);
    }
}