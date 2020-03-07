<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ocorrencia extends CI_Controller {
	
	public function index()
	{
		$this->load->model('veiculo_model');
		$data["veiculos"] = $this->veiculo_model->listar();

		$this->load->model('ocorrencia_model');
		$data["ocorrencias"] = $this->ocorrencia_model->listar();

		$this->load->view('ocorrencia/ocorrencia_form', $data);
	}

	public function gravar(){
		$this->load->model('ocorrencia_model'); 

		$this->ocorrencia_model->data = $this->input->post('data');
		$this->ocorrencia_model->local = $this->input->post('local');
        $this->ocorrencia_model->descricao = $this->input->post('descricao');
        $this->ocorrencia_model->placa = $this->input->post('placa');

		$retorno = $this->ocorrencia_model->gravar();

		redirect("ocorrencia?retorno=$retorno");
	}
}