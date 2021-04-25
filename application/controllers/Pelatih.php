<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelatih extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pelatih_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pelatih/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pelatih/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pelatih/index.html';
            $config['first_url'] = base_url() . 'pelatih/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pelatih_model->total_rows($q);
        $pelatih = $this->Pelatih_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pelatih_data' => $pelatih,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
			'kontent'=>pelatih/pelatih_list
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Pelatih_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pelatih' => $row->id_pelatih,
		'email' => $row->email,
		'namadepan' => $row->namadepan,
		'namabelakang' => $row->namabelakang,
		'panggilan' => $row->panggilan,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jenis_kelamin' => $row->jenis_kelamin,
		'primaryposision' => $row->primaryposision,
		'secondaryposision' => $row->secondaryposision,
		'negara' => $row->negara,
		'provinsi' => $row->provinsi,
		'kabkota' => $row->kabkota,
		'club' => $row->club,
		'profesi' => $row->profesi,
		'alamat_provinsi' => $row->alamat_provinsi,
		'alamat_kabkota' => $row->alamat_kabkota,
		'alamat_kecamatan' => $row->alamat_kecamatan,
		'alamat_desa' => $row->alamat_desa,
		'kodepos' => $row->kodepos,
		'rangking_nasional' => $row->rangking_nasional,
		'rangking_provinsi' => $row->rangking_provinsi,
		'warna_sabuk' => $row->warna_sabuk,
		'tinggi' => $row->tinggi,
		'berat' => $row->berat,
		'golongan_darah' => $row->golongan_darah,
		'foto' => $row->foto,
	    );
            $this->load->view('pelatih/pelatih_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelatih'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelatih/create_action'),
	    'id_pelatih' => set_value('id_pelatih'),
	    'email' => set_value('email'),
	    'namadepan' => set_value('namadepan'),
	    'namabelakang' => set_value('namabelakang'),
	    'panggilan' => set_value('panggilan'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'primaryposision' => set_value('primaryposision'),
	    'secondaryposision' => set_value('secondaryposision'),
	    'negara' => set_value('negara'),
	    'provinsi' => set_value('provinsi'),
	    'kabkota' => set_value('kabkota'),
	    'club' => set_value('club'),
	    'profesi' => set_value('profesi'),
	    'alamat_provinsi' => set_value('alamat_provinsi'),
	    'alamat_kabkota' => set_value('alamat_kabkota'),
	    'alamat_kecamatan' => set_value('alamat_kecamatan'),
	    'alamat_desa' => set_value('alamat_desa'),
	    'kodepos' => set_value('kodepos'),
	    'rangking_nasional' => set_value('rangking_nasional'),
	    'rangking_provinsi' => set_value('rangking_provinsi'),
	    'warna_sabuk' => set_value('warna_sabuk'),
	    'tinggi' => set_value('tinggi'),
	    'berat' => set_value('berat'),
	    'golongan_darah' => set_value('golongan_darah'),
	    'foto' => set_value('foto'),
	);
        $this->load->view('pelatih/pelatih_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'namadepan' => $this->input->post('namadepan',TRUE),
		'namabelakang' => $this->input->post('namabelakang',TRUE),
		'panggilan' => $this->input->post('panggilan',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'primaryposision' => $this->input->post('primaryposision',TRUE),
		'secondaryposision' => $this->input->post('secondaryposision',TRUE),
		'negara' => $this->input->post('negara',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabkota' => $this->input->post('kabkota',TRUE),
		'club' => $this->input->post('club',TRUE),
		'profesi' => $this->input->post('profesi',TRUE),
		'alamat_provinsi' => $this->input->post('alamat_provinsi',TRUE),
		'alamat_kabkota' => $this->input->post('alamat_kabkota',TRUE),
		'alamat_kecamatan' => $this->input->post('alamat_kecamatan',TRUE),
		'alamat_desa' => $this->input->post('alamat_desa',TRUE),
		'kodepos' => $this->input->post('kodepos',TRUE),
		'rangking_nasional' => $this->input->post('rangking_nasional',TRUE),
		'rangking_provinsi' => $this->input->post('rangking_provinsi',TRUE),
		'warna_sabuk' => $this->input->post('warna_sabuk',TRUE),
		'tinggi' => $this->input->post('tinggi',TRUE),
		'berat' => $this->input->post('berat',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Pelatih_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelatih'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pelatih_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelatih/update_action'),
		'id_pelatih' => set_value('id_pelatih', $row->id_pelatih),
		'email' => set_value('email', $row->email),
		'namadepan' => set_value('namadepan', $row->namadepan),
		'namabelakang' => set_value('namabelakang', $row->namabelakang),
		'panggilan' => set_value('panggilan', $row->panggilan),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'primaryposision' => set_value('primaryposision', $row->primaryposision),
		'secondaryposision' => set_value('secondaryposision', $row->secondaryposision),
		'negara' => set_value('negara', $row->negara),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kabkota' => set_value('kabkota', $row->kabkota),
		'club' => set_value('club', $row->club),
		'profesi' => set_value('profesi', $row->profesi),
		'alamat_provinsi' => set_value('alamat_provinsi', $row->alamat_provinsi),
		'alamat_kabkota' => set_value('alamat_kabkota', $row->alamat_kabkota),
		'alamat_kecamatan' => set_value('alamat_kecamatan', $row->alamat_kecamatan),
		'alamat_desa' => set_value('alamat_desa', $row->alamat_desa),
		'kodepos' => set_value('kodepos', $row->kodepos),
		'rangking_nasional' => set_value('rangking_nasional', $row->rangking_nasional),
		'rangking_provinsi' => set_value('rangking_provinsi', $row->rangking_provinsi),
		'warna_sabuk' => set_value('warna_sabuk', $row->warna_sabuk),
		'tinggi' => set_value('tinggi', $row->tinggi),
		'berat' => set_value('berat', $row->berat),
		'golongan_darah' => set_value('golongan_darah', $row->golongan_darah),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('pelatih/pelatih_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelatih'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelatih', TRUE));
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'namadepan' => $this->input->post('namadepan',TRUE),
		'namabelakang' => $this->input->post('namabelakang',TRUE),
		'panggilan' => $this->input->post('panggilan',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'primaryposision' => $this->input->post('primaryposision',TRUE),
		'secondaryposision' => $this->input->post('secondaryposision',TRUE),
		'negara' => $this->input->post('negara',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabkota' => $this->input->post('kabkota',TRUE),
		'club' => $this->input->post('club',TRUE),
		'profesi' => $this->input->post('profesi',TRUE),
		'alamat_provinsi' => $this->input->post('alamat_provinsi',TRUE),
		'alamat_kabkota' => $this->input->post('alamat_kabkota',TRUE),
		'alamat_kecamatan' => $this->input->post('alamat_kecamatan',TRUE),
		'alamat_desa' => $this->input->post('alamat_desa',TRUE),
		'kodepos' => $this->input->post('kodepos',TRUE),
		'rangking_nasional' => $this->input->post('rangking_nasional',TRUE),
		'rangking_provinsi' => $this->input->post('rangking_provinsi',TRUE),
		'warna_sabuk' => $this->input->post('warna_sabuk',TRUE),
		'tinggi' => $this->input->post('tinggi',TRUE),
		'berat' => $this->input->post('berat',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Pelatih_model->update($this->input->post('id_pelatih', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelatih'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pelatih_model->get_by_id($id);

        if ($row) {
            $this->Pelatih_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelatih'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelatih'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('namadepan', 'namadepan', 'trim|required');
	$this->form_validation->set_rules('namabelakang', 'namabelakang', 'trim|required');
	$this->form_validation->set_rules('panggilan', 'panggilan', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('primaryposision', 'primaryposision', 'trim|required');
	$this->form_validation->set_rules('secondaryposision', 'secondaryposision', 'trim|required');
	$this->form_validation->set_rules('negara', 'negara', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kabkota', 'kabkota', 'trim|required');
	$this->form_validation->set_rules('club', 'club', 'trim|required');
	$this->form_validation->set_rules('profesi', 'profesi', 'trim|required');
	$this->form_validation->set_rules('alamat_provinsi', 'alamat provinsi', 'trim|required');
	$this->form_validation->set_rules('alamat_kabkota', 'alamat kabkota', 'trim|required');
	$this->form_validation->set_rules('alamat_kecamatan', 'alamat kecamatan', 'trim|required');
	$this->form_validation->set_rules('alamat_desa', 'alamat desa', 'trim|required');
	$this->form_validation->set_rules('kodepos', 'kodepos', 'trim|required');
	$this->form_validation->set_rules('rangking_nasional', 'rangking nasional', 'trim|required');
	$this->form_validation->set_rules('rangking_provinsi', 'rangking provinsi', 'trim|required');
	$this->form_validation->set_rules('warna_sabuk', 'warna sabuk', 'trim|required');
	$this->form_validation->set_rules('tinggi', 'tinggi', 'trim|required');
	$this->form_validation->set_rules('berat', 'berat', 'trim|required');
	$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_pelatih', 'id_pelatih', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pelatih.xls";
        $judul = "pelatih";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Namadepan");
	xlsWriteLabel($tablehead, $kolomhead++, "Namabelakang");
	xlsWriteLabel($tablehead, $kolomhead++, "Panggilan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Primaryposision");
	xlsWriteLabel($tablehead, $kolomhead++, "Secondaryposision");
	xlsWriteLabel($tablehead, $kolomhead++, "Negara");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kabkota");
	xlsWriteLabel($tablehead, $kolomhead++, "Club");
	xlsWriteLabel($tablehead, $kolomhead++, "Profesi");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Kabkota");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Desa");
	xlsWriteLabel($tablehead, $kolomhead++, "Kodepos");
	xlsWriteLabel($tablehead, $kolomhead++, "Rangking Nasional");
	xlsWriteLabel($tablehead, $kolomhead++, "Rangking Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Warna Sabuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tinggi");
	xlsWriteLabel($tablehead, $kolomhead++, "Berat");
	xlsWriteLabel($tablehead, $kolomhead++, "Golongan Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");

	foreach ($this->Pelatih_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namadepan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namabelakang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->panggilan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->primaryposision);
	    xlsWriteLabel($tablebody, $kolombody++, $data->secondaryposision);
	    xlsWriteLabel($tablebody, $kolombody++, $data->negara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kabkota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->club);
	    xlsWriteLabel($tablebody, $kolombody++, $data->profesi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_kabkota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_kecamatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_desa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kodepos);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rangking_nasional);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rangking_provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->warna_sabuk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tinggi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->berat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->golongan_darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pelatih.doc");

        $data = array(
            'pelatih_data' => $this->Pelatih_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pelatih/pelatih_doc',$data);
    }

}

/* End of file Pelatih.php */
/* Location: ./application/controllers/Pelatih.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-15 10:04:41 */
/* http://harviacode.com */