<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model
{
    protected $table = ['biodata','judul','buku','peminjaman'];

    public function grafikKelas()
    {
        $sql = "SELECT  nama_kelas AS kelas ,
                        tanggal_pinjam,
                COUNT(nama_kelas) AS jumlah
                FROM   peminjaman
                INNER JOIN   biodata
                ON            (peminjaman.no_induk = biodata.no_induk)
                INNER JOIN    kelas
                ON            (biodata.id_kelas = kelas.id_kelas)
                WHERE year(tanggal_pinjam) = year(curdate())
                GROUP BY nama_kelas
                ";

        return $this->db->query($sql)->result();
    }

    public function grafikBuku()
    {
        $sql = "SELECT judul_buku as judul,
                count(judul_buku) AS jumlah
                FROM   peminjaman
                INNER JOIN   biodata
                ON            (peminjaman.no_induk = biodata.no_induk)
                INNER JOIN    kelas
                ON            (biodata.id_kelas = kelas.id_kelas)
                INNER JOIN    buku
                ON            (buku.kode_buku = peminjaman.kode_buku)
                INNER JOIN    judul
                ON            (buku.isbn = judul.isbn)
                AND           (peminjaman.kode_buku = buku.kode_buku)
                WHERE year(tanggal_pinjam) = year(curdate())
                GROUP BY judul_buku
                ORDER BY jumlah DESC LIMIT 10";

        return $this->db->query($sql)->result();
    }

    public function getAllAnggotaCount()
    {
        $sql = "SELECT COUNT(biodata.no_induk) AS jmlAnggota FROM biodata INNER JOIN user ON user.username=biodata.username WHERE user.level = 'anggota' AND user.is_verified ='y'";
        return $this->db->query($sql)->row();
    }

    public function getAllJudulCount()
    {
        $sql = "SELECT COUNT(judul.isbn) AS jmlJudul FROM judul";
        return $this->db->query($sql)->row();
    }

    public function getAllBukuCount()
    {
        $sql = "SELECT COUNT(buku.isbn) AS jmlBuku FROM buku";
        return $this->db->query($sql)->row();
    }

    public function getAllKembaliCount()
    {
        $sql = "SELECT COUNT(peminjaman.kode_pinjam) AS jmlKembali FROM peminjaman  WHERE (peminjaman.status = '2') OR (peminjaman.status = '3')";
        return $this->db->query($sql)->row();
    }
}