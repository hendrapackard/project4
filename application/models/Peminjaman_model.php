<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends MY_Model
{
    protected $maxItem = 2; //Jumlah maksimum buku


    public function getAllPeminjaman($page = null)
    {

        $sql = "  SELECT
                         kode_pinjam,
                         tanggal_pinjam,
                         date(tanggal_pinjam+3) AS kembali,
                         peminjaman.no_induk,
                         nama,
                         nama_kelas,
                         peminjaman.kode_buku,
                         judul_buku,
                         status
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
            ORDER BY      peminjaman.tanggal_pinjam DESC , peminjaman.kode_pinjam DESC";


        return $this->db->query($sql)->result();
    }

    public function getAllPeminjamanCount()
    {
        return $this->db->query('SELECT COUNT(peminjaman.id_pinjam) AS jumlah FROM peminjaman')->row();
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'kode_pinjam',
                'label' => 'Kode_pinjam',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'tanggal_pinjam',
                'label' => 'Tanggal_pinjam',
                'rules' => 'trim|required|callback_is_format_tanggal_valid'
            ],
            [
                'field' => 'search_user',
                'label' => 'User',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_user',
                'label' => 'ID User',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'search_buku',
                'label' => 'Buku',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_buku',
                'label' => 'ID Buku',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'kode_pinjam' => '',
            'tanggal_pinjam' => '',
            'id_user' => '',
            'id_buku' => '',
            'search_user' => '',
            'search_buku' => '',
        ];
    }

    public function ubahStatusBuku($kode_buku, $status)
    {
        $this->db->where('kode_buku',$kode_buku);
        $this->db->update('buku',['is_ada' => $status]);
    }

    public function liveSearchUser($keywords)
    {
        return $this->db->where('is_verified','y')
            ->select('no_induk,nama')
            ->like('no_induk',$keywords)
            ->or_like('nama', $keywords)
            ->join('user','biodata.username=user.username')
            ->where('is_verified','y')
            ->limit(10)
            ->get('biodata')
            ->result();
    }

    public function liveSearchBuku($keywords)
    {
        $sql = "    SELECT  kode_buku, judul_buku
                    FROM    buku
                    INNER JOIN judul
                    ON      (judul.isbn = buku.isbn)
                    WHERE   is_ada = 'y'
                    AND     judul_buku LIKE '%$keywords%'
                    GROUP BY  judul.isbn #Otomatis pilih satu dari yang is_ada = 'y'
                    LIMIT 10 ";
        return $this->db->query($sql)->result();
    }

    public function cekMaxItem($no_induk)
    {
        $sql = "SELECT COUNT(kode_pinjam) AS jumlah_item
                FROM peminjaman
                WHERE no_induk = '$no_induk'
                AND status != '4'";
        $item = $this->db->query($sql)->row()->jumlah_item;

        if ($item < $this->maxItem) {
            return true;
        }

        return false;
    }




}