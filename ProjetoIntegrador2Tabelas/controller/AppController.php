<?php

class AppController extends Controller {

	public static function isUsuarioLogged($function) {
		session_start();
		if(isset($_SESSION['email']) == true && isset($_SESSION['nome'])) {
			$function->__invoke();
		} else {
			header('Location: login');
			exit;
		}
	}

	public static function ErrorView() {
		Controller::CreateView("erro");
	}

    public static function DisfuncoesView() {
		self::isUsuarioLogged(function() {
			
			$limit = 5;
			if (isset($_GET["busca"])) {
				$busca = filter_var($_GET["busca"], FILTER_SANITIZE_STRING);
				if ($busca !=null && $busca != "") {
					$disfuncoes = Disfuncao::searchByNome($busca);
					Controller::CreateView("disfuncoes", ['disfuncoes' => $disfuncoes]);
				} else {
					$_GET["page"] = '1';
					$page = 1;
					$offset = ($page - 1) * $limit;
					$disfuncoes = Disfuncao::listPaginate($offset, $limit);
					$totalPages = Disfuncao::getNumberOfPages($limit);
					Controller::CreateView("disfuncoes", ['disfuncoes' => $disfuncoes, 'page' => $page, 'totalPages' => $totalPages]);
				}
			} else {			
				if (isset($_GET["page"])) {
					$page = filter_var($_GET["page"], FILTER_SANITIZE_STRING);
					$page = intval($page);
					$offset = ($page - 1) * $limit;
					$disfuncoes = Disfuncao::listPaginate($offset, $limit);
					$totalPages = Disfuncao::getNumberOfPages($limit);
					Controller::CreateView("disfuncoes", ['disfuncoes' => $disfuncoes, 'page' => $page, 'totalPages' => $totalPages]);
				} else {
					$_GET["page"] = '1';
					$page = 1;
					$offset = ($page - 1) * $limit;
					$disfuncoes = Disfuncao::listPaginate($offset, $limit);
					$totalPages = Disfuncao::getNumberOfPages($limit);
					Controller::CreateView("disfuncoes", ['disfuncoes' => $disfuncoes, 'page' => $page, 'totalPages' => $totalPages]);
				}
			}
		});
    }

	public static function DisfuncaoView() {
		self::isUsuarioLogged(function() {
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
		});
	}

	public static function adicionarDisfuncaoView() {
		self::isUsuarioLogged(function() {
			Controller::CreateView("adicionar_disfuncao");
		});
	}

	public static function adicionarDisfuncao() {
		self::isUsuarioLogged(function() {
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
		});
	}

	public static function editarDisfuncaoView() {
		self::isUsuarioLogged(function() {
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
		});
	}

	public static function editarDisfuncao() {
		self::isUsuarioLogged(function() {
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
		});
	}

	public static function apagarDisfuncaoView() {
		self::isUsuarioLogged(function() {
			$id_disfuncao = intval(Route::getBaseName());

			$disfuncao = new Disfuncao();
			$disfuncao->getDisfuncao($id_disfuncao);

			if ($disfuncao->getid_disfuncao() != null) {
				$disfuncao = $disfuncao->getValues();
				Controller::CreateView("apagar_disfuncao", ['disfuncao' => $disfuncao]);
			}
		});
	}

	public static function apagarDisfuncao() {
		self::isUsuarioLogged(function() {
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
		});
	}


///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////



	public static function TratamentosView() {
		self::isUsuarioLogged(function() {
			$limit = 5;
			if (isset($_GET["busca"])) {
				$busca = filter_var($_GET["busca"], FILTER_SANITIZE_STRING);
				if ($busca !=null && $busca != "") {
					$tratamentos = Tratamento::searchByEquipamento($busca);
					Controller::CreateView("tratamentos", ['tratamentos' => $tratamentos]);
				} else {
					$_GET["page"] = '1';
					$page = 1;
					$offset = ($page - 1) * $limit;
					$tratamentos = Tratamento::listPaginate($offset, $limit);
					$totalPages = Tratamento::getNumberOfPages($limit);
					Controller::CreateView("tratamentos", ['tratamentos' => $tratamentos, 'page' => $page, 'totalPages' => $totalPages]);
				}
			} else {			
				if (isset($_GET["page"])) {
					$page = filter_var($_GET["page"], FILTER_SANITIZE_STRING);
					$page = intval($page);
					$offset = ($page - 1) * $limit;
					$tratamentos = Tratamento::listPaginate($offset, $limit);
					$totalPages = Tratamento::getNumberOfPages($limit);
					Controller::CreateView("tratamentos", ['tratamentos' => $tratamentos, 'page' => $page, 'totalPages' => $totalPages]);
				} else {
					$_GET["page"] = '1';
					$page = 1;
					$offset = ($page - 1) * $limit;
					$tratamentos = Tratamento::listPaginate($offset, $limit);
					$totalPages = Tratamento::getNumberOfPages($limit);
					Controller::CreateView("tratamentos", ['tratamentos' => $tratamentos, 'page' => $page, 'totalPages' => $totalPages]);
				}
			}
		});
    }

	public static function adicionarTratamentoView() {
		self::isUsuarioLogged(function() {
			Controller::CreateView("adicionar_tratamento");
		});
	}

	public static function adicionarTratamento() {
		self::isUsuarioLogged(function() {
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
		});
	}

	public static function editarTratamentoView() {
		self::isUsuarioLogged(function() {
			$id_tratamento = intval(Route::getBaseName());

			$tratamento = new tratamento();
			$tratamento->getTratamento($id_tratamento);

			if ($tratamento->getid_tratamento() != null) {
				$tratamento = $tratamento->getValues();
				Controller::CreateView("editar_tratamento", ['tratamento' => $tratamento]);

			} else {
				echo "ESSE TRATAMENTO É INVALIDO";
			}	
		});
	}

	public static function editarTratamento() {
		self::isUsuarioLogged(function() {
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
		});
	}

	public static function apagarTratamentoView() {
		self::isUsuarioLogged(function() {
			$id_tratamento = intval(Route::getBaseName());

			$tratamento = new Tratamento();
			$tratamento->getTratamento($id_tratamento);

			if ($tratamento->getid_tratamento() != null) {
				$tratamento = $tratamento->getValues();
				Controller::CreateView("apagar_tratamento", ['tratamento' => $tratamento]);
			}
		});
	}

	public static function apagarTratamento() {
		self::isUsuarioLogged(function() {
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
		});
		
	}
}

?>