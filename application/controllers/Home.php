<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('Aacontoh_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
       /* $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'aacontoh/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'aacontoh/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'aacontoh/index.html';
            $config['first_url'] = base_url() . 'aacontoh/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Aacontoh_model->total_rows($q);
        $aacontoh = $this->Aacontoh_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
		*/

        $data = array(
            /*'aacontoh_data' => $aacontoh,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,*/
			'konten'=>'home',
			//'judul'=>'List Data aacontoh',
        );
        $this->load->view('v_index', $data);
    }

    /*public function read($id) 
    {
        $row = $this->Aacontoh_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_contoh' => $row->id_contoh,
		'nama' => $row->nama,
		'foto_barang' => $row->foto_barang,
		'stok' => $row->stok,
		'konten'=>'aacontoh/aacontoh_read', );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aacontoh'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('aacontoh/create_action'),
		    'id_contoh' => set_value('id_contoh'),
		    'nama' => set_value('nama'),
		    'foto_barang' => set_value('foto_barang'),
		    'stok' => set_value('stok'),
			'konten'=>'aacontoh/aacontoh_form',
			 'judul'=>'Tambah Data aacontoh',
			 );
            $this->load->view('v_index', $data);
        $this->load->view('aacontoh/aacontoh_form', $data);
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
				'nama' => $this->input->post('nama',TRUE),
				'foto_barang' => $dfile,
				'stok' => $this->input->post('stok',TRUE),
			   //jika ada foto maka ganti menjadi 'foto'=>Sdfile,
			);

            $this->Aacontoh_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('aacontoh'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Aacontoh_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('aacontoh/update_action'),
				'id_contoh' => set_value('id_contoh', $row->id_contoh),
				'nama' => set_value('nama', $row->nama),
				'foto_barang' => set_value('foto_barang', $row->foto_barang),
				'stok' => set_value('stok', $row->stok),
				'konten'=>'aacontoh/aacontoh_form',
			 	'judul'=>'Update Data aacontoh',
			 );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aacontoh'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_contoh', TRUE));
        } else {
			
		$nmfile = "foto_".time();
        $config['upload_path'] = './image';
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
			'nama' => $this->input->post('nama',TRUE),
			'foto_barang' => $this->input->post('foto_barang',TRUE),
			'stok' => $this->input->post('stok',TRUE),
			   //jika ada foto maka ganti menjadi 'foto'=>Sdfile,
			);

            $this->Aacontoh_model->update($this->input->post('id_contoh', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('aacontoh'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Aacontoh_model->get_by_id($id);

        if ($row) {
            $this->Aacontoh_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('aacontoh'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aacontoh'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	//$this->form_validation->set_rules('foto_barang', 'foto barang', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');

	$this->form_validation->set_rules('id_contoh', 'id_contoh', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "aacontoh.xls";
        $judul = "aacontoh";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");

	foreach ($this->Aacontoh_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=aacontoh.doc");

        $data = array(
            'aacontoh_data' => $this->Aacontoh_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('aacontoh/aacontoh_doc',$data);
    }
	*/

}

/* End of file Aacontoh.php */
/* Location: ./application/controllers/Aacontoh.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-15 12:22:14 */
/* http://harviacode.com */