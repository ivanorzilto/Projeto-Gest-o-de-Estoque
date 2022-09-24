<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gestao extends CI_Controller{

	public function home(){
		if($this->session->has_userdata('id_usuario')){
			$this->load->view('layout/header');
			$this->load->view('layout/cabecalho');
			$this->load->model('stock');
			$dados['produtos']=$this->stock->tudo();
			$this->load->view('stock/inicio', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/footer');
			}else{
				redirect('geral');

			}
		
	}

	public function editar($id){
		$this->load->view('layout/header');
		$this->load->view('layout/cabecalho');
		
		$this->load->model('stock');
		$dados['produto']=$this->stock->dados_produtos($id)[0];
		$this->load->view('stock/editar',$dados);
		
		$this->load->view('layout/rodape');
		$this->load->view('layout/footer');
	}

	public function editarSalvar($id){
		$this->load->model('stock');
		$resultado = $this->stock->editar_produto($id);
		
		//valida a operaçao da model 
		//if(!$resultado['resultado']){
			$this->load->view('layout/header');
			$this->load->view('layout/cabecalho');

			$this->load->model('stock');
			$dados['produto'] = $this->stock->dados_produtos($id)[0];
			$dados['mensagem'] = $resultado['mensagem'];
			$dados['tipo'] = $resultado['tipo'];
			
			if($resultado['resultado']){
				$this->load->view('layout/mensagem', $dados);
				$this->load->view('stock/inicio');
			}else{
				$this->load->view('stock/editar', $dados);
			}
			
			$this->load->view('layout/rodape');
			$this->load->view('layout/footer');
		//}else{
			//retorna a pagina inicial dos produtos
			//$this->home();
		//}
	}

	public function novo(){
		$this->load->view('layout/header');
		$this->load->view('layout/cabecalho');
		$this->load->view('stock/novo');
		$this->load->view('layout/rodape');
		$this->load->view('layout/footer');
	}

	public function novoSalvar(){
		$this->load->model('stock');
		$resultado = $this->stock->novoProduto();
		$dados['mensagem'] = $resultado['mensagem'];
		$dados['tipo'] = $resultado['tipo'];
		$this->load->view('layout/header');
		$this->load->view('layout/cabecalho');
		$this->load->view('stock/novo', $dados);
		$this->load->view('layout/rodape');
		$this->load->view('layout/footer');
	}

	public function excluir($id, $resposta=false){
		$this->load->model('stock');

		//exibe a view antes da resposta do usuario
		if(!$resposta){
			//busca as informacoes do produto pelo ID
			$dados['produto'] = $this->stock->dados_produtos($id)[0];
			//exibe a view com a pergunta
			$this->load->view('layout/header');
			$this->load->view('layout/cabecalho');
			$this->load->view('stock/excluir', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/footer');
		}else{
			$this->stock->excluir($id);
			$this->load->view('layout/header');
			$this->load->view('layout/cabecalho');
			$resultado['mensagem'] = 'Dados excluidos com sucesso!';
			$resultado['tipo'] = 'success';
			$this->load->view('layout/mensagem', $resultado);
			$this->load->model('stock');
			$dados['produtos']=$this->stock->tudo();
			$this->load->view('stock/inicio', $dados);
			$this->load->view('layout/rodape');
			$this->load->view('layout/footer');
		}
	}

	public function adicionar($id){
		if(is_null($this->input->post('count_quantidade'))){
			//carrega a view para adicionar as quantidades
		$this->load->view('layout/header');
		$this->load->view('layout/cabecalho');

		//carrega o formulario da view de adicionar quantidade
		$this->load->model('stock');
		$dados['produto']=$this->stock->dados_produtos($id)[0];
		$this->load->view('stock/adicionar', $dados);
		
		$this->load->view('layout/rodape');
		$this->load->view('layout/footer');
		}else{
			//adiciona a quantidade
			$this->load->model('stock');
			$this->stock->alterarQuantidade($id,$this->input->post('count_quantidade'));
			$this->home();
		}

		
	}

	public function subtrair($id){
		if(is_null($this->input->post('count_quantidade'))){
			//carrega a view para subtrair as quantidades
			$this->load->view('layout/header');
			$this->load->view('layout/cabecalho');

			//carrega o formulario da view de subtrair as quantidades
			$this->load->model('stock');
			$dados['produto']=$this->stock->dados_produtos($id)[0];
			$this->load->view('stock/subtrair', $dados);

			$this->load->view('layout/rodape');
			$this->load->view('layout/footer');
		}else{
			//subtrai a quantidade
			$this->load->model('stock');
			$this->stock->alterarQuantidade($id, -$this->input->post('count_quantidade'));
			$this->home();
		}
	}

	public function movimentos(){
		$this->load->view('layout/header');
		$this->load->view('layout/cabecalho');

		$this->load->model('stock');
		$dados['movimentos']=$this->stock->movimentos();
		$this->load->view('stock/movimentos', $dados);

		$this->load->view('layout/rodape');
		$this->load->view('layout/footer');
		
	}

	public function excluirMovimentos(){
		$this->load->model('stock');
		$this->stock->excluir_movimentos();
		$this->movimentos();
	}

}
?>
