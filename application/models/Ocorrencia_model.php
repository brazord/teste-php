<?php
    class Ocorrencia_model extends CI_Model {
        public $num_ocorrencia;
        public $data;
        public $local;
        public $descricao;
        public $placa;

        public function gravar(){
            try
            {   
                $this->db->db_debug = FALSE;
                $data = array(
                    'num_ocorrencia' => $this->num_ocorrencia,
                    'data' => $this->data,
                    'local' => $this->local,
                    'descricao' => $this->descricao,
                    'placa' => $this->placa
                );
                $this->db->insert('ocorrencia', $data);
                return $this->db->affected_rows();
            }
            catch(Exception $e)
            {
                #$e->getMessage()
                return -1;
            }
        }

        public function listar(){
            $sql = 'SELECT o.*, v.modelo, c.nome FROM ocorrencia o INNER JOIN veiculo v ON o.placa = v.placa INNER JOIN cliente c ON v.codigo_cliente = c.codigo';
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    } 