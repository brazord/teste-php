<?php
    class Cliente_model extends CI_Model {
        private $codigo;
        public $nome;
        public $rg;
        public $cpf;
        public $endereco;
        public $telefone;
        public $automoveis;

        public function gravar(){
            try
            {   
                $data = array(
                    'nome' => $this->nome,
                    'rg' => $this->rg,
                    'cpf' => $this->cpf,
                    'endereco' => $this->endereco,
                    'telefone' => $this->telefone,
                );
                $this->db->insert('cliente', $data);
                return $this->db->affected_rows();
            }
            catch(Exception $e)
            {
                #$e->getMessage()
                return -1;
            }
        }

        public function listar(){
            $this->db->order_by("nome", "asc");
            $query = $this->db->get('cliente');
            return $query->result_array();
        }

        public function detalhar($id){
            $this->db->order_by("nome", "asc");
            $query = $this->db->get('cliente');
            return $query->result_array();
        }

        public function alterar($codigo){
            try
            {   
                $data = array(
                    'nome' => $this->nome,
                    'rg' => $this->rg,
                    'cpf' => $this->cpf,
                    'endereco' => $this->endereco,
                    'telefone' => $this->telefone,
                );
                $this->db->update('cliente', $data, "codigo = $codigo");
                return $this->db->affected_rows();
            }
            catch(Exception $e)
            {
                #$e->getMessage()
                return -1;
            }
        }
    }   
