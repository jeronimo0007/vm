<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pontos extends MY_Controller {



	public function __construct(){



		parent::__construct();

		auth_check(); // check login auth

		$this->rbac->check_module_access();



		$this->load->model('admin/ponto_model', 'ponto_model');

	}



	//-----------------------------------------------------------

	public function index(){



		$this->load->view('admin/includes/_header');

		$this->load->view('admin/pontos/ponto_list');

		$this->load->view('admin/includes/_footer');

	}

	

	public function datatable_json(){				   					   

		$records = $this->ponto_model->get_all_pontos();

		$data = array();



		$i=0;

		foreach ($records['data']  as $row) 

		{  

			$status = ($row['is_active'] == 1)? 'checked': '';

			$data[]= array(

				++$i,

				$row['ponto'],

				$row['email'],

				$row['telefone'],

				date_time($row['created_at']),	

				'<input class="tgl_checkbox tgl-ios" 

				data-id="'.$row['id'].'" 

				id="cb_'.$row['id'].'"

				type="checkbox"  

				'.$status.'><label for="cb_'.$row['id'].'"></label>',		



				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pontos/edit/'.$row['id']).'"> <i class="fa fa-eye"></i></a>

				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/pontos/edit/'.$row['id']).'"> <i class="fa fa-pencil-square-o"></i></a>

				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/pontos/delete/".$row['id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'

			);

		}

		$records['data']=$data;

		echo json_encode($records);						   

	}



	//-----------------------------------------------------------

	function change_status()

	{   

		$this->ponto_model->change_status();

	}



	//---------------------------------------------------------------

	public function add(){

		

		$this->rbac->check_operation_access(); // check opration permission



		if($this->input->post('submit')){		
			
			$this->form_validation->set_rules('ponto', 'Ponto', 'trim|required');

			$this->form_validation->set_rules('nomefan', 'Nomefan');

			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			
			$this->form_validation->set_rules('responsavel', 'responsavel', 'trim|required');
			
			$this->form_validation->set_rules('telefone', 'telefone', 'trim|required');
			
			$this->form_validation->set_rules('endereco', 'endereco', 'trim|required');
			
			$this->form_validation->set_rules('numero', 'numero', 'trim|required');
			
			$this->form_validation->set_rules('cidade', 'cidade', 'trim|required');
			
			$this->form_validation->set_rules('estado', 'estado', 'trim|required');
			
			



			if ($this->form_validation->run() == FALSE) {

				$data = array(

					'errors' => validation_errors()

				);

				$this->session->set_flashdata('errors', $data['errors']);

				redirect(base_url('admin/pontos/add'),'refresh');

			}

			else{

				$data = array(
					'ponto' => $this->input->post('ponto'),

					'nomefan' => $this->input->post('nomefan'),

					'email' => $this->input->post('email'),

					'responsavel' => $this->input->post('responsavel'),

					'telefone' => $this->input->post('telefone'),

					'endereco' => $this->input->post('endereco'),
					
					'numero' => $this->input->post('numero'),
					
					'cidade' => $this->input->post('cidade'),
					
					'estado' => $this->input->post('estado'),
					
					'created_at' => date('Y-m-d : h:m:s'),

					'updated_at' => date('Y-m-d : h:m:s'),
					
				
				);

				$data = $this->security->xss_clean($data);

				$result = $this->ponto_model->add_ponto($data);

				if($result){

					$this->session->set_flashdata('success', 'Ponto has been added successfully!');

					redirect(base_url('admin/pontos'));

				}

			}

		}

		else{

			$this->load->view('admin/includes/_header');

			$this->load->view('admin/pontos/ponto_add');

			$this->load->view('admin/includes/_footer');

		}

		

	}



	//---------------------------------------------------------------

	public function edit($id = 0){



		$this->rbac->check_operation_access(); // check opration permission



		if($this->input->post('submit')){		
			
			$this->form_validation->set_rules('ponto', 'Ponto', 'trim|required');
			$this->form_validation->set_rules('nomefan', 'Nomefan', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('responsavel', 'Responsavel', 'trim|required');
			$this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
			$this->form_validation->set_rules('endereco', 'Endereco', 'trim|required');
			$this->form_validation->set_rules('numero', 'Numero', 'trim|required');
			$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
			$this->form_validation->set_rules('estado', 'Estado', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			
			

			if ($this->form_validation->run() == FALSE) {

					$data = array(

						'errors' => validation_errors()

					);

					$this->session->set_flashdata('errors', $data['errors']);

					redirect(base_url('admin/pontos/ponto_edit/'.$id),'refresh');

			}

			else{

				$data = array(			
					
					'ponto' => $this->input->post('ponto'),
					'nomefan' => $this->input->post('nomefan'),
					'email' => $this->input->post('email'),
					'responsavel' => $this->input->post('responsavel'),
					'telefone' => $this->input->post('telefone'),
					'endereco' => $this->input->post('endereco'),
					'numero' => $this->input->post('numero'),
					'cidade' => $this->input->post('cidade'),
					'estado' => $this->input->post('estado'),
					'is_active' => $this->input->post('status'),
					'updated_at' => date('Y-m-d : h:m:s'),
					
					

				);

				$data = $this->security->xss_clean($data);

				$result = $this->ponto_model->edit_ponto($data, $id);

				if($result){

					$this->session->set_flashdata('success', 'ponto has been updated successfully!');

					redirect(base_url('admin/pontos'));

				}

			}

		}

		else{

			$data['ponto'] = $this->ponto_model->get_ponto_by_id($id);

			

			$this->load->view('admin/includes/_header');

			$this->load->view('admin/pontos/ponto_edit', $data);

			$this->load->view('admin/includes/_footer');

		}

	}



	//---------------------------------------------------------------

	public function delete($id = 0)

	{

		$this->rbac->check_operation_access(); // check opration permission

		

		$this->db->delete('ci_pontos', array('id' => $id));

		$this->session->set_flashdata('success', 'Use has been deleted successfully!');

		redirect(base_url('admin/pontos'));

	}





	//---------------------------------------------------------------

	//  Export pontos PDF 

	public function create_pontos_pdf(){



		$this->load->helper('pdf_helper'); // loaded pdf helper

		$data['all_pontos'] = $this->ponto_model->get_pontos_for_export();

		$this->load->view('admin/pontos/pontos_pdf', $data);

	}



	//---------------------------------------------------------------	

	// Export data in CSV format 

	public function export_csv(){ 



	   // file name 

		$filename = 'pontos_'.date('Y-m-d').'.csv'; 

		header("Content-Description: File Transfer"); 

		header("Content-Disposition: attachment; filename=$filename"); 

		header("Content-Type: application/csv; ");



	   // get data 

		$ponto_data = $this->ponto_model->get_pontos_for_export();



	   // file creation 

		$file = fopen('php://output', 'w');


		$header = array("ID", "Ponto", "Nomefan", "Email", "Responsavel", "Telefone", "cidade", "Created Date"); 
		



		fputcsv($file, $header);

		foreach ($ponto_data as $key=>$line){ 

			fputcsv($file,$line); 

		}

		fclose($file); 

		exit; 

	}



}





?>