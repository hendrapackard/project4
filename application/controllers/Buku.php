<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends MY_Controller
{

    protected function isLogin()
    {
        $isLogin = $this->session->userdata('is_login');
        if (!$isLogin) {
            redirect(base_url());
        }
    }

    public function create()
    {
        $this->isLogin();

        $this->load->model('Judul_model','judul',true);
        $this->load->model('Buku_model','buku',true);

        $isbn   = $this->input->post('isbn');
        $judul      =  $this->judul->select('judul.isbn,kode_buku,judul_buku,penulis,penerbit,kategori,letak,cover')->where('judul.isbn',$isbn)->join2('buku')->orderBy('kode_buku','DESC')->get();
//        $judul2      = $this->buku->where('buku.isbn',$isbn)->orderBy('kode_buku','DESC')->get();
        $input      = (object) $this->input->post(null,true);
        $main_view  = 'buku/form';
        $form_action= 'buku/create';
        $first_load = $this->input->post('first_load');

        if ($first_load) {
            $this->load->view('template',compact('main_view', 'form_action', 'input', 'judul'));
            return;
        }

        if (!$this->buku->validate()){
            $this->load->view('template',compact('main_view', 'form_action', 'input', 'judul'));
            return;
        }

        if ($this->buku->insert($input)) {
            $this->session->set_flashdata('success','Data buku berhasil disimpan');
        }else {
            $this->session->set_flashdata('success','Data buku berhasil disimpan');
        }

        redirect('judul');
    }

    public function alpha_numeric_coma_dash_dot_space($str)
    {
        if (!preg_match('/^[a-zA-Z0-9 .,\-]+$/i', $str)) {
            $this->form_validation->set_message('alpha_numeric_coma_dash_dot_space','Hanya boleh berisi huruf, spasi, tanda hubung(-), titik(.) dan koma(,).');
            return false;
        }
    }

    public function total($isbn = null)
    {
        if (is_null($isbn)) {
            redirect('judul');
        }

        $bukus      = $this->buku->total($isbn);
        $main_view  = 'buku/total';
        $this->load->view('template',compact('main_view', 'bukus'));
    }

    public function ada($isbn = null)
    {
        if (is_null($isbn)) {
            redirect('judul');
        }

        $bukus = $this->buku->ada($isbn);
        $main_view = 'buku/ada';
        $this->load->view('template',compact('main_view','bukus'));
    }

    public function dipinjam($isbn = null)
    {
        if (is_null($isbn)) {
            redirect('judul');
        }

        $bukus = $this->buku->dipinjam($isbn);
        $main_view = 'buku/dipinjam';
        $this->load->view('template',compact('main_view','bukus'));
    }

    public function delete()
    {
        $this->isLogin();

        $kode_buku = $this->input->post('kode_buku');
        $buku    = $this->buku->where('kode_buku',$kode_buku)->get();

        if (!$buku) {
            $this->session->set_flashdata('warning','Data buku tidak ada');
            redirect('judul');
        }

        if ($this->buku->where('kode_buku',$kode_buku)->delete()) {
            $this->session->set_flashdata('success', 'Data buku berhasil dihapus');
        } else {
            $this->session->set_flashdata('error','Data buku gagal dihapus');
        }

        redirect('judul');
    }
}