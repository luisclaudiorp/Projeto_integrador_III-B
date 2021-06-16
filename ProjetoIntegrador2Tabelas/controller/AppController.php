<?php

class AppController extends Controller {

	public static function ErrorView() {
		Controller::CreateView("erro");
	}

    public static function DisfuncoesView() {
    	$disfuncoes = Disfuncao::listAll();
    	Controller::CreateView("disfuncoes", ['disfuncoes' => $disfuncoes]);
    }

	public static function DisfuncaoView() {

		$id_disfuncao = intval(Route::getBaseName());

		$disfuncao = new Disfuncao();
		$disfuncao->getDisfuncao($id_disfuncao);

		if ($disfuncao->getid_disfuncao() != null) {

			$tratamentosDisfuncao = Tratamento::listAllFromDisfuncao($id_disfuncao);
			$disfuncao = $disfuncao->getValues();
			Controller::CreateView("disfuncao", ['disfuncao' => $disfuncao, 'tratamentos' => $tratamentosDisfuncao]);

		} else {
			echo "ESSA DISFUNÇÃO É INVALIDA";
		}	
	}

	public static function adicionarDisfuncaoView() {
		Controller::CreateView("adicionar_disfuncao");
	}

	public static function adicionarDisfuncao() {

		if (!empty($_POST)) {
			$novoNome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
			if ($novoNome !=null && $novoNome != "") {
				$disfuncao = new Disfuncao();
				$disfuncao->setnome($novoNome);
				$disfuncao->save();
				header('Location: disfuncoes');
				exit;
			}
		}
		header('Location: erro');
		exit;
	}

	public static function editarDisfuncaoView() {

		$id_disfuncao = intval(Route::getBaseName());

		$disfuncao = new Disfuncao();
		$disfuncao->getDisfuncao($id_disfuncao);

		if ($disfuncao->getid_disfuncao() != null) {

			$tratamentosDisfuncao = Tratamento::listAllFromDisfuncao($id_disfuncao);
			$disfuncao = $disfuncao->getValues();
			$todosTratamentos = Tratamento::listAll();
			Controller::CreateView("editar_disfuncao", ['disfuncao' => $disfuncao, 'tratamentosDisfuncao' => $tratamentosDisfuncao, 'todosTratamentos' => $todosTratamentos]);

		} else {
			echo "ESSA DISFUNÇÃO É INVALIDA";
		}	
	}

	public static function editarDisfuncao() {

		if (!empty($_POST)) {
			if (isset($_POST['id_disfuncao'])) {
				$id_disfuncao = $_POST['id_disfuncao'];
				$disfuncao = new Disfuncao();
				$disfuncao->getDisfuncao($id_disfuncao);
				
				if (isset($_POST['nome'])) {
					$novoNome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
					if ($novoNome !=null && $novoNome != "") {
						$disfuncao->setnome($novoNome);
						$disfuncao->update();
					} else {
						header('Location: erro');
						exit;
					}
				}

				if (isset($_POST['arrayOfIDs'])) {
					$arrayOfIDs = explode(',', $_POST['arrayOfIDs']);
					foreach($arrayOfIDs as $id) {
						if (isset($_POST[strval($id)])) {
							$disfuncao->addTratamento(intval($id));
						} else {
							$disfuncao->deleteTratamento(intval($id));
						}
					}
					header('Location: disfuncoes');
					exit;
				}
			}
		}
		header('Location: erro');
		exit;
	}

	public static function apagarDisfuncaoView() {

		$id_disfuncao = intval(Route::getBaseName());

		$disfuncao = new Disfuncao();
		$disfuncao->getDisfuncao($id_disfuncao);

		if ($disfuncao->getid_disfuncao() != null) {
			$disfuncao = $disfuncao->getValues();
			Controller::CreateView("apagar_disfuncao", ['disfuncao' => $disfuncao]);
		}
	}

	public static function apagarDisfuncao() {

		if (!empty($_POST)) {
			if (isset($_POST['id_disfuncao'])) {
				$id_disfuncao = $_POST['id_disfuncao'];
				$disfuncao = new Disfuncao();
				$disfuncao->getDisfuncao($id_disfuncao);

				if ($disfuncao->getid_disfuncao() != null) {
					$disfuncao->delete();
					header('Location: disfuncoes');
					exit;
				}
			}
		}
		header('Location: erro');
		exit;
	}


///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////



	public static function TratamentosView() {
    	$tratamentos = Tratamento::listAll();
    	Controller::CreateView("tratamentos", ['tratamentos' => $tratamentos]);
    }

	public static function adicionarTratamentoView() {
		Controller::CreateView("adicionar_tratamento");
	}

	public static function adicionarTratamento() {

		if (!empty($_POST)) {
			$equipamento = filter_var($_POST['equipamento'], FILTER_SANITIZE_STRING);
			$parametros = filter_var($_POST['parametros'], FILTER_SANITIZE_STRING);
			$intervalo = filter_var($_POST['intervalo'], FILTER_SANITIZE_STRING);

			if ($equipamento !=null && $equipamento != "") {
				if ($parametros !=null && $parametros != "") {
					if ($intervalo !=null && $intervalo != "") {
						$tratamento = new Tratamento();
						$tratamento->setequipamento($equipamento);
						$tratamento->setparametros($parametros);
						$tratamento->setintervalo($intervalo);
						$tratamento->save();
						header('Location: tratamentos');
						exit;
					}
				}
			}
		}
		header('Location: erro');
		exit;
	}

	public static function editarTratamentoView() {

		$id_tratamento = intval(Route::getBaseName());

		$tratamento = new tratamento();
		$tratamento->getTratamento($id_tratamento);

		if ($tratamento->getid_tratamento() != null) {
			$tratamento = $tratamento->getValues();
			Controller::CreateView("editar_tratamento", ['tratamento' => $tratamento]);

		} else {
			echo "ESSE TRATAMENTO É INVALIDO";
		}	
	}

	public static function editarTratamento() {

		if (!empty($_POST)) {
			if (isset($_POST['id_tratamento'])) {
				$id_tratamento = $_POST['id_tratamento'];
				$tratamento = new Tratamento();
				$tratamento->getTratamento($id_tratamento);
				
				if (isset($_POST['equipamento'])) {
					$novoEquipamento = filter_var($_POST['equipamento'], FILTER_SANITIZE_STRING);
					if ($novoEquipamento !=null && $novoEquipamento != "") {
						$tratamento->setequipamento($novoEquipamento);
					} else {
						header('Location: erro');
						exit;
					}
				}

				if (isset($_POST['parametros'])) {
					$novosParametros = filter_var($_POST['parametros'], FILTER_SANITIZE_STRING);
					if ($novosParametros !=null && $novosParametros != "") {
						$tratamento->setparametros($novosParametros);
					} else {
						header('Location: erro');
						exit;
					}
				}

				if (isset($_POST['intervalo'])) {
					$novoIntervalo = filter_var($_POST['intervalo'], FILTER_SANITIZE_STRING);
					if ($novoIntervalo !=null && $novoIntervalo != "") {
						$tratamento->setintervalo($novoIntervalo);
					} else {
						header('Location: erro');
						exit;
					}
				}

				$tratamento->update();
				header('Location: tratamentos');
				exit;
			}
		}
		header('Location: erro');
		exit;
	}

	public static function apagarTratamentoView() {

		$id_tratamento = intval(Route::getBaseName());

		$tratamento = new Tratamento();
		$tratamento->getTratamento($id_tratamento);

		if ($tratamento->getid_tratamento() != null) {
			$tratamento = $tratamento->getValues();
			Controller::CreateView("apagar_tratamento", ['tratamento' => $tratamento]);
		}
	}

	public static function apagarTratamento() {

		if (!empty($_POST)) {
			if (isset($_POST['id_tratamento'])) {
				$id_tratamento = $_POST['id_tratamento'];
				$tratamento = new Tratamento();
				$tratamento->getTratamento($id_tratamento);

				if ($tratamento->getid_tratamento() != null) {
					$tratamento->delete();
					header('Location: tratamentos');
					exit;
				}
			}
		}
		header('Location: erro');
		exit;
		
	}
}

?>