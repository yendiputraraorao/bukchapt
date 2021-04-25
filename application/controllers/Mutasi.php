<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mutasi_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mutasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mutasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mutasi/index.html';
            $config['first_url'] = base_url() . 'mutasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mutasi_model->total_rows($q);
        $mutasi = $this->Mutasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mutasi_data' => $mutasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
			'konten'=>'mutasi/mutasi_list',
			'judul'=>'List Data mutasi',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Mutasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mutasi' => $row->id_mutasi,
		'id_atlit' => $row->id_atlit,
		'id_dojang_lama' => $row->id_dojang_lama,
		'id_dojang_baru' => $row->id_dojang_baru,
		'surat_melepas' => $row->surat_melepas,
		'surat_menerima' => $row->surat_menerima,
		'scan_kk_baru' => $row->scan_kk_baru,
		'disetujui' => $row->disetujui,
		'konten'=>'mutasi/mutasi_read', );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mutasi/create_action'),
		    'id_mutasi' => set_value('id_mutasi'),
		    'id_atlit' => set_value('id_atlit'),
		    'id_dojang_lama' => set_value('id_dojang_lama'),
		    'id_dojang_baru' => set_value('id_dojang_baru'),
		    'surat_melepas' => set_value('surat_melepas'),
		    'surat_menerima' => set_value('surat_menerima'),
		    'scan_kk_baru' => set_value('scan_kk_baru'),
		    'disetujui' => set_value('disetujui'),
			'konten'=>'mutasi/mutasi_form',
			 'judul'=>'Tambah Data mutasi',
			 );
            $this->load->view('v_index', $data);
        $this->load->view('mutasi/mutasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
				$nmfile = "barang_".time();
        $config['upload_path'] = './image/barang';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '20000';
        $config['file_name'] = $nmfile;
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1
        $this->upload->do_upload('foto_barang');
        $result1 = $this->upload->data();
        $result = array('gambar'=>$result1);
        $dfile = $result['gambar']['file_name'];
            $data = array(
				'id_atlit' => $this->input->post('id_atlit',TRUE),
				'id_dojang_lama' => $this->input->post('id_dojang_lama',TRUE),
				'id_dojang_baru' => $this->input->post('id_dojang_baru',TRUE),
				'surat_melepas' => $this->input->post('surat_melepas',TRUE),
				'surat_menerima' => $this->input->post('surat_menerima',TRUE),
				'scan_kk_baru' => $this->input->post('scan_kk_baru',TRUE),
				'disetujui' => $this->input->post('disetujui',TRUE),
			   //jika ada foto maka ganti menjadi 'foto'=>Sdfile,
			);

            $this->Mutasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mutasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mutasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mutasi/update_action'),
				'id_mutasi' => set_value('id_mutasi', $row->id_mutasi),
				'id_atlit' => set_value('id_atlit', $row->id_atlit),
				'id_dojang_lama' => set_value('id_dojang_lama', $row->id_dojang_lama),
				'id_dojang_baru' => set_value('id_dojang_baru', $row->id_dojang_baru),
				'surat_melepas' => set_value('surat_melepas', $row->surat_melepas),
				'surat_menerima' => set_value('surat_menerima', $row->surat_menerima),
				'scan_kk_baru' => set_value('scan_kk_baru', $row->scan_kk_baru),
				'disetujui' => set_value('disetujui', $row->disetujui),
				'konten'=>'mutasi/mutasi_form',
			 	'judul'=>'Update Data mutasi',
			 );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mutasi', TRUE));
        } else {
			
		$nmfile = "foto_".time();
        $config['upload_path'] = './image';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '20000';
        $config['file_name'] = $nmfile;
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1
        $this->upload->do_upload('foto');
        $result1 = $this->upload->data();
        $result = array('gambar'=>$result1);
        $dfile = $result['gambar']['file_name'];
			
            $data = array(
			'id_atlit' => $this->input->post('id_atlit',TRUE),
			'id_dojang_lama' => $this->input->post('id_dojang_lama',TRUE),
			'id_dojang_baru' => $this->input->post('id_dojang_baru',TRUE),
			'surat_melepas' => $this->input->post('surat_melepas',TRUE),
			'surat_menerima' => $this->input->post('surat_menerima',TRUE),
			'scan_kk_baru' => $this->input->post('scan_kk_baru',TRUE),
			'disetujui' => $this->input->post('disetujui',TRUE),
			   //jika ada foto maka ganti menjadi 'foto'=>Sdfile,
			);

            $this->Mutasi_model->update($this->input->post('id_mutasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mutasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mutasi_model->get_by_id($id);

        if ($row) {
            $this->Mutasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mutasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_atlit', 'id atlit', 'trim|required');
	$this->form_validation->set_rules('id_dojang_lama', 'id dojang lama', 'trim|required');
	$this->form_validation->set_rules('id_dojang_baru', 'id dojang baru', 'trim|required');
	$this->form_validation->set_rules('surat_melepas', 'surat melepas', 'trim|required');
	$this->form_validation->set_rules('surat_menerima', 'surat menerima', 'trim|required');
	$this->form_validation->set_rules('scan_kk_baru', 'scan kk baru', 'trim|required');
	$this->form_validation->set_rules('disetujui', 'disetujui', 'trim|required');

	$this->form_validation->set_rules('id_mutasi', 'id_mutasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mutasi.xls";
        $judul = "mutasi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Atlit");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dojang Lama");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dojang Baru");
	xlsWriteLabel($tablehead, $kolomhead++, "Surat Melepas");
	xlsWriteLabel($tablehead, $kolomhead++, "Surat Menerima");
	xlsWriteLabel($tablehead, $kolomhead++, "Scan Kk Baru");
	xlsWriteLabel($tablehead, $kolomhead++, "Disetujui");

	foreach ($this->Mutasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_atlit);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_dojang_lama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_dojang_baru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->surat_melepas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->surat_menerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->scan_kk_baru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->disetujui);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=mutasi.doc");

        $data = array(
            'mutasi_data' => $this->Mutasi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mutasi/mutasi_doc',$data);
    }

}

/* End of file Mutasi.php */
/* Location: ./application/controllers/Mutasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-25 19:57:03 */
/* http://harviacode.com */