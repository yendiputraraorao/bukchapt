<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'member/index.html';
            $config['first_url'] = base_url() . 'member/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Member_model->total_rows($q);
        $member = $this->Member_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'member_data' => $member,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
			'konten' => 'member/member_list',
            'judul' => 'Data Member',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Member_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_member' => $row->kode_member,
		'nama' => $row->nama,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'type_mobil' => $row->type_mobil,
		'kode_mesin' => $row->kode_mesin,
		'tahun' => $row->tahun,
		'no_rangka' => $row->no_rangka,
		'no_mesin' => $row->no_mesin,
		'plat_nomor' => $row->plat_nomor,
		'warna' => $row->warna,
		'alamat' => $row->alamat,
		'pekerjaan' => $row->pekerjaan,
		'hp' => $row->hp,
		'email' => $row->email,
		'medsos' => $row->medsos,
		'foto_member' => $row->foto_member,
		'foto_unit' => $row->foto_unit,
		'konten' => 'member/member_read',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('member/create_action'),
	    'id' => set_value('id'),
	    'kode_member' => $this->No_urut->buat_kode_member(),
	    'nama' => set_value('nama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'type_mobil' => set_value('type_mobil'),
	    'kode_mesin' => set_value('kode_mesin'),
	    'tahun' => set_value('tahun'),
	    'no_rangka' => set_value('no_rangka'),
	    'no_mesin' => set_value('no_mesin'),
	    'plat_nomor' => set_value('plat_nomor'),
	    'warna' => set_value('warna'),
	    'alamat' => set_value('alamat'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'hp' => set_value('hp'),
	    'email' => set_value('email'),
	    'medsos' => set_value('medsos'),
	    //'foto_member' => set_value('foto_member'),
	    'foto_unit' => set_value('foto_unit'),
		'konten' => 'member/member_form',
        'judul' => 'Entry Data Member',
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			
        $nmfile = "member".time();
        $config['upload_path'] = './image/member';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '20000';
        $config['file_name'] = $nmfile;
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1
        $this->upload->do_upload('foto_member');
        $result1 = $this->upload->data();
        $result = array('gambar'=>$result1);
        $dfile = $result['gambar']['file_name'];
            $data = array(
			
		'kode_member' => $this->input->post('kode_member',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'type_mobil' => $this->input->post('type_mobil',TRUE),
		'kode_mesin' => $this->input->post('kode_mesin',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'no_rangka' => $this->input->post('no_rangka',TRUE),
		'no_mesin' => $this->input->post('no_mesin',TRUE),
		'plat_nomor' => $this->input->post('plat_nomor',TRUE),
		'warna' => $this->input->post('warna',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'medsos' => $this->input->post('medsos',TRUE),
		'foto_member' => $dfile,
		'foto_unit' => $this->input->post('foto_unit',TRUE),
	    );

            $this->Member_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('member'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Member_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('member/update_action'),
		'id' => set_value('id', $row->id),
		'kode_member' => set_value('id', $row->kode_member),
		'nama' => set_value('nama', $row->nama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'type_mobil' => set_value('type_mobil', $row->type_mobil),
		'kode_mesin' => set_value('kode_mesin', $row->kode_mesin),
		'tahun' => set_value('tahun', $row->tahun),
		'no_rangka' => set_value('no_rangka', $row->no_rangka),
		'no_mesin' => set_value('no_mesin', $row->no_mesin),
		'plat_nomor' => set_value('plat_nomor', $row->plat_nomor),
		'warna' => set_value('warna', $row->warna),
		'alamat' => set_value('alamat', $row->alamat),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'hp' => set_value('hp', $row->hp),
		'email' => set_value('email', $row->email),
		'medsos' => set_value('medsos', $row->medsos),
		'foto_member' => set_value('foto_member', $row->foto_member),
		'foto_unit' => set_value('foto_unit', $row->foto_unit),
		'konten' => 'member/member_form',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_member' => $this->input->post('kode_member',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'type_mobil' => $this->input->post('type_mobil',TRUE),
		'kode_mesin' => $this->input->post('kode_mesin',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'no_rangka' => $this->input->post('no_rangka',TRUE),
		'no_mesin' => $this->input->post('no_mesin',TRUE),
		'plat_nomor' => $this->input->post('plat_nomor',TRUE),
		'warna' => $this->input->post('warna',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'medsos' => $this->input->post('medsos',TRUE),
		'foto_member' => $this->input->post('foto_member',TRUE),
		'foto_unit' => $this->input->post('foto_unit',TRUE),
	    );

            $this->Member_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('member'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Member_model->get_by_id($id);

        if ($row) {
            $this->Member_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('member'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_member', 'kode_member', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('type_mobil', 'type mobil', 'trim|required');
	$this->form_validation->set_rules('kode_mesin', 'kode mesin', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('no_rangka', 'no rangka', 'trim|required');
	$this->form_validation->set_rules('no_mesin', 'no mesin', 'trim|required');
	$this->form_validation->set_rules('plat_nomor', 'plat nomor', 'trim|required');
	$this->form_validation->set_rules('warna', 'warna', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('medsos', 'medsos', 'trim|required');
	$this->form_validation->set_rules('foto_member', 'foto member', 'trim|required');
	$this->form_validation->set_rules('foto_unit', 'foto unit', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "member.xls";
        $judul = "member";
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
	xlsWriteLabel($tablehead, $kolomhead++, "kode_member");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Type Mobil");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Mesin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "No Rangka");
	xlsWriteLabel($tablehead, $kolomhead++, "No Mesin");
	xlsWriteLabel($tablehead, $kolomhead++, "Plat Nomor");
	xlsWriteLabel($tablehead, $kolomhead++, "Warna");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Medsos");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto Member");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto Unit");

	foreach ($this->Member_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_member);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->type_mobil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_mesin);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_rangka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_mesin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->plat_nomor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->warna);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->medsos);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_member);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_unit);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=member.doc");

        $data = array(
            'member_data' => $this->Member_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('member/member_doc',$data);
    }

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-09 15:48:32 */
/* http://harviacode.com */