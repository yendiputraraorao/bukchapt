<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination'); // untuk membuat pagination
        $this->pagination->initialize($config);

        $data = array(
            'anggota_data' => $anggota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'anggota/anggota_list',
            'judul' => 'Data Anggota',
        );
        $this->load->view('v_index', $data);
    }
	

    public function read($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_anggota' => $row->id_anggota,
		'kode_anggota' => $row->kode_anggota,
		'nama_anggota' => $row->nama_anggota,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'konten' => 'anggota/anggota_read',
        'judul' => 'Data Anggota',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function create() 
    {
        $data = array(
        'button' => 'Create',
        'action' => site_url('anggota/create_action'),
	    'id_anggota' => set_value('id_anggota'),
	    'kode_anggota' => $this->No_urut->buat_kode_anggota(),
	    'nama_anggota' => set_value('nama_anggota'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'golongan_darah' => set_value('golongan_darah'),
	    'tempat_lahir' => set_value('tempat_lahir'),
        'tanggal_lahir' => set_value('tanggal_lahir'),
        'type_mobil' => set_value('type_mobil'),
        'no_mesin' => set_value('no_mesin'),
	    'no_rangka' => set_value('no_rangka'),
	    'tahun' => set_value('tahun'),
	    'plat_nomor' => set_value('plat_nomor'),
	    'warna_mobil' => set_value('warna_mobil'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'alamat' => set_value('alamat'),
	    'hp' => set_value('hp'),
	    'email' => set_value('email'),
	    'medsos' => set_value('medsos'),
        'konten' => 'anggota/anggota_form',
        'judul' => 'Data Anggota',
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

        $nmfile = "anggota".time();
        $config['upload_path'] = './image/anggota';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '20000';
        $config['file_name'] = $nmfile;
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1
        $this->upload->do_upload('foto_anggota');
        $result1 = $this->upload->data();
        $result = array('gambar'=>$result1);
        $dfile = $result['gambar']['file_name'];

            $data = array(
		'kode_anggota' => $this->input->post('kode_anggota',TRUE),
		'nama_anggota' => $this->input->post('nama_anggota',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
        'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
        'type_mobil' => $this->input->post('type_mobil',TRUE),
        'no_mesin' => $this->input->post('no_mesin',TRUE),
        'no_rangka' => $this->input->post('no_rangka',TRUE),
        'tahun' => $this->input->post('tahun',TRUE),
        'plat_nomor' => $this->input->post('plat_nomor',TRUE),
        'warna_mobil' => $this->input->post('warna_mobil',TRUE),
        'pekerjaan' => $this->input->post('pekerjaan',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'hp' => $this->input->post('hp',TRUE),
        'email' => $this->input->post('email',TRUE),
        'medsos' => $this->input->post('medsos',TRUE),		
		'foto_anggota' => $dfile,
	    );

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('anggota/update_action'),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'kode_anggota' => set_value('kode_anggota', $row->kode_anggota),
		'nama_anggota' => set_value('nama_anggota', $row->nama_anggota),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'golongan_darah' => set_value('golongan_darah', $row->golongan_darah),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
        'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
        'type_mobil' => set_value('type_mobil', $row->type_mobil),
        'no_mesin' => set_value('no_mesin', $row->no_mesin),
		'no_rangka' => set_value('no_rangka', $row->no_rangka),
		'tahun' => set_value('tahun', $row->tahun),
		'plat_nomor' => set_value('plat_nomor', $row->plat_nomor),
		'warna_mobil' => set_value('warna_mobil', $row->warna_mobil),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'alamat' => set_value('alamat', $row->alamat),
		'hp' => set_value('hp', $row->hp),
		'email' => set_value('email', $row->email),
		'medsos' => set_value('medsos', $row->medsos),	
		
        'konten' => 'anggota/anggota_form',
        'judul' => 'Data Anggota',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_anggota', TRUE));
        } else {
        if ($_FILES == '') {
            
            $data = array(
        'kode_anggota' => $this->input->post('kode_anggota',TRUE),
        'nama_anggota' => $this->input->post('nama_anggota',TRUE),
        'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
        'golongan_darah' => $this->input->post('golongan_darah',TRUE),
        'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
        'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
        'type_mobil' => $this->input->post('type_mobil',TRUE),
        'no_mesin' => $this->input->post('no_mesin',TRUE),
        'no_rangka' => $this->input->post('no_rangka',TRUE),
        'tahun' => $this->input->post('tahun',TRUE),
        'plat_nomor' => $this->input->post('plat_nomor',TRUE),
        'warna_mobil' => $this->input->post('warna_mobil',TRUE),
        'pekerjaan' => $this->input->post('pekerjaan',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'hp' => $this->input->post('hp',TRUE),
        'email' => $this->input->post('email',TRUE),
        'medsos' => $this->input->post('medsos',TRUE),		
        );

            $this->Anggota_model->update($this->input->post('id_anggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota'));

        } else {

            $nmfile = "anggota_".time();
            $config['upload_path'] = './image/anggota';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '20000';
            $config['file_name'] = $nmfile;
            // load library upload
            $this->load->library('upload', $config);
            // upload gambar 1
            $this->upload->do_upload('foto_anggota');
            $result1 = $this->upload->data();
            $result = array('gambar'=>$result1);
            $dfile = $result['gambar']['file_name'];

             $data = array(
			'kode_anggota' => $this->input->post('kode_anggota',TRUE),
			'nama_anggota' => $this->input->post('nama_anggota',TRUE),
			'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
			'golongan_darah' => $this->input->post('golongan_darah',TRUE),
			'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
			'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
			'type_mobil' => $this->input->post('type_mobil',TRUE),
			'no_mesin' => $this->input->post('no_mesin',TRUE),
			'no_rangka' => $this->input->post('no_rangka',TRUE),
			'tahun' => $this->input->post('tahun',TRUE),
			'plat_nomor' => $this->input->post('plat_nomor',TRUE),
			'warna_mobil' => $this->input->post('warna_mobil',TRUE),
			'pekerjaan' => $this->input->post('pekerjaan',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'hp' => $this->input->post('hp',TRUE),
			'email' => $this->input->post('email',TRUE),
			'medsos' => $this->input->post('medsos',TRUE),		
			'foto_anggota' => $dfile,
			);

            $this->Anggota_model->update($this->input->post('id_anggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota'));
			}      
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $this->Anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_anggota', 'kode anggota', 'trim|required');
	$this->form_validation->set_rules('nama_anggota', 'nama anggota', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'trim|required');

	$this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

