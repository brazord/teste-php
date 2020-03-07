<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
	public $codigo;
	public $nome;
	public $rg;
	public $cpf;
	public $endereco;
	public $telefone;
	public $automoveis;
	public $acao;

	public function index()
	{
		$this->acao = site_url('Cliente/gravar');
		$this->load->model('cliente_model');
		$data["clientes"] = $this->cliente_model->listar();
		$this->load->view('cliente/cliente_form', $data);
	}

	public function gravar(){
		$this->load->model('cliente_model'); 

		$this->cliente_model->nome = $this->input->post('nome');
        $this->cliente_model->rg = $this->input->post('rg');
        $this->cliente_model->cpf = $this->input->post('cpf');
        $this->cliente_model->endereco = $this->input->post('endereco');
		$this->cliente_model->telefone = $this->input->post('telefone');		

		$retorno = $this->cliente_model->gravar();

		redirect("cliente?retorno=$retorno");
	}

	public function detalhar($codigo)
	{
		$this->codigo = $codigo;

		$this->acao = site_url("cliente/alterar/$codigo");

		$this->load->model('veiculo_model');
		$veiculos_gravados = $this->veiculo_model->listar(); 
		$data["veiculos"] = array_values(array_filter(array_map(array($this,'filtrarVeiculos'), $veiculos_gravados)));
		

		$this->load->model('cliente_model');
		$clientes_gravados = $this->cliente_model->listar();
		$cliente = array_values(array_filter(array_map(array($this,'filtrarCliente'), $clientes_gravados)))[0];

		$this->nome = $cliente["nome"];
		$this->rg = $cliente["rg"];
		$this->cpf = $cliente["cpf"];
		$this->endereco = $cliente["endereco"];
		$this->telefone = $cliente["telefone"];

		$this->load->view('cliente/cliente_form', $data);
	}

	public function filtrarVeiculos($veiculo){
		if($veiculo["codigo_cliente"] == $this->codigo){
			return $veiculo;
		}
	}

	public function filtrarCliente($cliente){
		if($cliente["codigo"] == $this->codigo){
			return $cliente;
		}
	}

	public function alterar($codigo){
		$this->load->model('cliente_model'); 

		#$this->cliente_model->codigo = $this->input->post('codigo');
		$this->cliente_model->nome = $this->input->post('nome');
        $this->cliente_model->rg = $this->input->post('rg');
        $this->cliente_model->cpf = $this->input->post('cpf');
        $this->cliente_model->endereco = $this->input->post('endereco');
		$this->cliente_model->telefone = $this->input->post('telefone');		

		$retorno = $this->cliente_model->alterar($codigo);

		redirect("cliente/detalhar/$codigo?retorno=$retorno");
	}
}
