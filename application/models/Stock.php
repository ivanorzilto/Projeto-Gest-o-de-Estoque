<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stock	extends CI_Model{

	public function tudo(){
		//consulta no BD todos os registros existentes na tabela produtos
		return $this->db->get('produtos')->result_array();
	}

	public function dados_produtos($id){
		//retorna dados do produto
		return $this->db->from('produtos')->where('id_produto',$id)->get()->result_array();
	}

	public function editar_produto($id){
		$descricao = $this->input->post('text-descricao');
		$resultado = $this->db->from('produtos')->where('id_produto<>',$id)->where('descricao',$descricao)->get();

		//verifica se já existe um produto cadastrado com o mesmo nome
		if($resultado->num_rows() !=0){
			return array(
				'tipo' => 'danger',
				'resultado' => false,
				'mensagem' => 'Já existe um produto cadastrado com o mesmo nome',
			);
		}

		//atualiza os dados do produto
		$this->db->set('descricao', $descricao)->where('id_produto', $id)->update('produtos');
		return array(
			'tipo' => 'success',
			'resultado' => true,
			'mensagem' => 'Dados atualizados com sucesso!',		
		);

	}

	public function novoProduto(){
		$descricao = $this->input->post('text-descricao');
		$resultado = $this->db->from('produtos')->where('descricao',$descricao)->get();

		//verifica se já existe um produto cadastrado com o mesmo nome
		if($resultado->num_rows() !=0){
			return array(
				'tipo' => 'danger',
				'resultado' => false,
				'mensagem' => 'Já existe um produto cadastrado com o mesmo nome',
			);
		}

		//salva o novo produto no BD na tabela produtos
		$dados=array(
			'descricao' => $this->input->post('text-descricao'),
			'quantidade' => $this->input->post('text-quantidade'),
		);

		$this->db->insert('produtos', $dados);
		return array(
			'tipo' => 'success',
			'resultado' => true,
			'mensagem' => 'Dados atualizados com sucesso!',		
		);

	}

	public function excluir($id){
		$this->db->delete('produtos', array('id_produto'=>$id));
	}

	public function alterarQuantidade($id, $quantidade){
		//altera a quantidade do produto selecionado e registra o log de alteraçao
		$this->db->where('id_produto',$id)->set('quantidade', 'quantidade +'.$quantidade, false)->update('produtos');

		//adiciona o registro de log na tabela movimentos
		$dados=array(
			'id_produto' => $id,
			'quantidade' => $quantidade,
			'data_hora' => date('Y-m-d H:i:s'),
		);
		$this->db->insert('movimento', $dados);
	}

	public function movimentos(){
		//retorna toda a tabela movimentos
		$resultado=$this->db->select('m.*, p.descricao descricao, p.quantidade temp')
							->from('movimento as m')
							->Join('produtos as p', 'm.id_produto = p.id_produto', 'left')
							->get();
		return $resultado->result_array();
	}

	public function excluir_movimentos(){
		$this->db->empty_table('movimento');
		$this->db->query('ALTER TABLE movimento AUTO_INCREMENT =1');
	}

}

?>
