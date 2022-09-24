<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geral extends CI_Controller{

	public function index(){

		if($this->session->has_userdata('id_usuario')){
			$this->menuInicial();
		}else{
			$this->quadroLogin();
		}
		
		// $this->load->view('layout/header');
		// $this->load->view('layout/cabecalho');
		// $this->load->view('usuarios/login');
		// $this->load->view('layout/rodape');
		// $this->load->view('layout/footer');
	}

	public function quadroLogin(){
		if($this->session->has_userdata('id_usuario')){
			$this->menuInicial();
			}
				$this->load->view('layout/header');
				$this->load->view('layout/cabecalho');
				$this->load->view('usuarios/login');
				$this->load->view('layout/rodape');
				$this->load->view('layout/footer');
			
	}

	public function menuInicial(){
		if(!$this->session->has_userdata('id_usuario')){
			$this->menuInicial();
		}else{
			redirect('gestao/home');
		}
	}

	public function setup(){
		$this->load->view('layout/header');
		$this->load->view('setup/setup');
		$this->load->view('layout/footer');
	}

	public function verificarLogin(){
		//verifica se existe sessao já iniciada
		if($this->session->has_userdata('id_usuario')){
			//carrega a função Menu Inicial
			$this->menuInicial();
		}else{
			//carrega o modelo para conferir o login dentro da base de dados
			$this->load->model('usuarios');
			//verifica se existe login cadastrado no BD
			if($this->usuarios->verificar_login()){
				$this->menuInicial();
			}else{
				$this->loginInvalido();
			}
		}

		
	}

	public function loginInvalido(){
		//retorna mensagem de erro ao logar no sistema
		if($this->session->has_userdata('id_usario')){
			$this->menuInicial();
		}else{
			$this->load->view('layout/header');
			$this->load->view('layout/cabecalho');
			
			$dados=[
				'mensagem' => 'Login inválido',
				'tipo' => 'danger',
				'link' => 'geral'
			];

			$this->load->view('layout/mensagem', $dados);
			$this->load->view('usuarios/login');
			$this->load->view('layout/rodape');
			$this->load->view('layout/footer');
		}
	}

	public function logout(){
		//verifica se existe sessao iniciada
		if($this->session->has_userdata('id_usuario')){
			//apaga a sessao iniciada
			$this->session->unset_userdata('id_usuario');
			$this->session->unset_userdata('usuario');
		}
		//carrega o menuInicial e verifica se ainda existe sessao iniciada
		$this->quadroLogin();
	}

	public function resetdb(){
		//carrega o modelo basedados da pasta Model
		$this->load->model('basedados');

		//executa a funcao reset do modelo basedados
		$this->basedados->reset();

		//retorna mensagem ao usuario com a view
		$this->load->view('layout/header');
		$this->load->view('setup/setup');
		
		$dados=array(
			'mensagem' => 'Base de dados apagada com sucesso!',
			'tipo' => 'success',
		);

		$this->load->view('layout/mensagem', $dados);
		$this->load->view('layout/footer');
	}

	public function inserirusuario(){
		$this->load->model('basedados');
		$this->basedados->inserir_usuarios();

		//retorna mensagem ao usuario com a view
		$this->load->view('layout/header');
		$this->load->view('setup/setup');
		
		$dados=array(
			'mensagem' => 'Inserido 3 usuários com sucesso!',
			'tipo' => 'success',
		);

		$this->load->view('layout/mensagem', $dados);
		$this->load->view('layout/footer');
	}

	public function inserirproduto(){
		$this->load->model('basedados');
		$this->basedados->inserir_produtos();

		//retorna mensagem ao usuario com a view
		$this->load->view('layout/header');
		$this->load->view('setup/setup');

		$dados=array(
			'mensagem' => 'Produtos cadastrados com sucesso!',
			'tipo' => 'success',
		);

		$this->load->view('layout/mensagem',$dados);
		$this->load->view('layout/footer');
	}
}
?>

