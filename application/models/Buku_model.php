<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends MY_Model
{
    protected $table = 'buku';

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'kode_buku',
                'label' => 'Kode Buku',
                'rules' => "trim|required|min_length[1]|max_length[15]|callback_alpha_numeric_coma_dash_dot_space"
            ]
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return[
            'kode_buku' => ''
        ];
    }

    public function total($isbn)
    {
        $sql = "    SELECT kode_buku,
                           judul_buku,
                           penulis,
                           penerbit,
                           is_ada
                    FROM buku
                    INNER JOIN judul
                            ON (judul.isbn = buku.isbn)
                            WHERE buku.isbn = $isbn";

        return $this->db->query($sql)->result();
    }

    public function ada($isbn)
    {
        $sql = "    SELECT kode_buku,
                           judul_buku,
                           penulis,
                           penerbit
                    FROM   buku
                    INNER JOIN judul
                    ON         (judul.isbn = buku.isbn)
                    WHERE      buku.isbn = $isbn
                    AND is_ada = 'y' ";

        return $this->db->query($sql)->result();

    }

    public function dipinjam($isbn)
    {
        $sql = " SELECT buku.kode_buku,
                        judul_buku,
                        penulis,
                        penerbit,
                        nama AS peminjam,
                        nama_kelas
                 FROM   buku
          INNER JOIN    judul
                ON      (judul.isbn = buku.isbn)
          INNER JOIN    peminjaman
                ON      (peminjaman.kode_buku = buku.kode_buku)
          INNER JOIN    biodata
                ON      (biodata.no_induk = peminjaman.no_induk)
          INNER JOIN    kelas
                ON      (kelas.id_kelas = biodata.id_kelas)
                WHERE   buku.isbn = $isbn
                AND     buku.is_ada = 'n'
                AND     peminjaman.status != '4'";

        return $this->db->query($sql)->result();
    }
}
