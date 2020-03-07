<?php
    class Veiculo_model extends CI_Model {
        public $placa;
        public $renavam;
        public $fabricante;
        public $modelo;
        public $ano;
        public $codigo_cliente;

        public function gravar(){
            try
            {   
                $this->db->db_debug = FALSE;
                $data = array(
                    'placa' => $this->placa,
                    'renavam' => $this->renavam,
                    'fabricante' => $this->fabricante,
                    'modelo' => $this->modelo,
                    'ano' => $this->ano,
                    'codigo_cliente' => $this->codigo_cliente
                );
                $this->db->insert('veiculo', $data);
                return $this->db->affected_rows();
            }
            catch(Exception $e)
            {
                #$e->getMessage()
                return -1;
            }
        }

        public function listar(){
            $sql = 'SELECT v.placa, v.renavam, v.fabricante, v.modelo, v.ano, c.nome, v.codigo_cliente from veiculo v inner join cliente c on v.codigo_cliente = c.codigo';
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }   

   
 