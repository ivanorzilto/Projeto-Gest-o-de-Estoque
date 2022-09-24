<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model{
	
	public function verificar_login(){
		//verifica se os dados do login são validos na base de dados
		//Metodo sem query builder
		// $parametros=[
		// 	$this->input->post('text_usuario'),
		// 	md5($this->input->post('text_senha'))
		// ];
		// $resultado = $this->db->query('SELECT * FROM usuarios WHERE usuario= ? and senha = ?', $parametros);

		//carrega a biblioteca SESSION
		$this->load->library('session');	

		//metodo com query builder
		$this->db->from('usuarios');
		$this->db->where('usuario', $this->input->post('text_usuario'));
		$this->db->where('senha', $this->input->post('text_senha'));
		$resultado = $this->db->get();

		//outro metodo com query builder
		// $resultado=$this->db->from('usuarios')
		// 					->where('usuario', $this->input->post('text_usuario'))
		// 					->where('senha', $this->input->post('text_senha'))
		// 					->get();

		if($resultado->num_rows()==0){
			//login invalido
			return false;
		}
		else{
			//login valido
			//abre a sessao com os dados do usuario
			$dados_usuario = $resultado->row();
			$this->session->set_userdata('id_usuario', $dados_usuario->id_usuario);
			$this->session->set_userdata('usuario', $dados_usuario->usuario);
			return true;
		}
	}

	
}

?>
