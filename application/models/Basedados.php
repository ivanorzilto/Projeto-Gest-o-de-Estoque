<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basedados extends CI_Model{

	public function reset(){
		// funcao apaga toda a base de dados
		
		//apaga todos os dados da tabela
		$this->db->empty_table('usuarios');
		$this->db->empty_table('produtos');

		//reinicia a contagem do auto incremento
		$this->db->query('ALTER TABLE usuarios AUTO_INCREMENT=1');
		$this->db->query('ALTER TABLE produtos AUTO_INCREMENT=1');
		$this->db->query('ALTER TABLE movimento AUTO_INCREMENT=1');

	}

	public function inserir_usuarios(){
		//limpa os dados da tabela usuarios e reinicia o auto increment
		$this->db->empty_table('usuarios');
		$this->db->query('ALTER TABLE usuarios AUTO_INCREMENT=1');
		//insere os dados do array na tabela usuarios
		$dados=array(
			'usuario' => 'Ivanor',
			'senha' => md5('ivanor'),
		);
		$this->db->insert('usuarios',$dados);

		$dados=array(
			'usuario' => 'Murilo',
			'senha' => md5('Murilo'),
		);
		$this->db->insert('usuarios',$dados);

		$dados=array(
			'usuario' => 'José',
			'senha' => md5('José'),
		);

		$this->db->insert('usuarios',$dados);
	}

	public function inserir_produtos(){
		//limpa os dados da tabela produtos e reinicia o contador do auto increment
		$this->db->empty_table('produtos');
		$this->db->query('ALTER TABLE produtos AUTO_INCREMENT=1');
		//insere os dados do array na tabela produtos
		$dados=[
			['descricao' => 'conec rg06','quantidade' => 1000],
			['descricao' => 'cabo drop','quantidade' => 10000],
			['descricao' => 'cabo branco','quantidade' => 100000],
		];
		$this->db->insert_batch('produtos',$dados);

		//apaga os dados da tabela movimentos
		$this->db->empty_table('movimento');
		$this->db->query('ALTER TABLE movimento AUTO_INCREMENT=1');
		//insere os dados do array na tabela movimento
		$dadosmovimento=array(
			['id_produto' => 1, 'quantidade' => 1000, 'data_hora' => date('Y-m-d H:i:s')],
			['id_produto' => 2, 'quantidade' => 10000, 'data_hora' => date('Y-m-d H:i:s')],
			['id_produto' => 3, 'quantidade' => 100000, 'data_hora' => date('Y-m-d H:i:s')],
		);
		$this->db->insert_batch('movimento', $dadosmovimento);
	}
}
?>

