<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo extends CI_Controller {
	
	public function index()
	{
		$this->load->model('cliente_model');
		$data["clientes"] = $this->cliente_model->listar();

		$this->load->model('veiculo_model');
		$data["veiculos"] = $this->veiculo_model->listar();

		$this->load->view('veiculo/veiculo_form',$data);
	}

	public function gravar(){
		$this->load->model('veiculo_model'); 

		$this->veiculo_model->placa = $this->input->post('placa');
        $this->veiculo_model->renavam = $this->input->post('renavam');
        $this->veiculo_model->fabricante = $this->input->post('fabricante');
        $this->veiculo_model->modelo = $this->input->post('modelo');
		$this->veiculo_model->ano = $this->input->post('ano');		
		$this->veiculo_model->codigo_cliente = $this->input->post('codigo_cliente');		

		$retorno = $this->veiculo_model->gravar();

		redirect("veiculo?retorno=$retorno");
	}
}

