<?php
class Mahasiswa
{
    private $nama;
    private $nim;
    private $pass;
    private $pilihan;
    public function __construct($nama, $nim, $pass)
    {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->pass = $pass;
    }
    public function get_nama()
    {
        return $this->nama;
    }
    public function get_nim()
    {
        return $this->nim;
    }
    public function get_pass()
    {
        return $this->pass;
    }
    public function validasi($nama, $nim, $pass)
    {
        if ($this->nama == $nama && $this->nim = $nim && $this->pass = $pass) {
            return true;
        } else {
            return false;
        }
    }
}
