<?php

class LoginController extends Controller {

	public static function Deslogar() {
		session_start();
		session_destroy();
		header('Location: login');
	}

	public static function LoginView() {
		session_start();
		if(isset($_SESSION['email']) == true) {
			header('Location: disfuncoes');
			exit;
		}
		else {
			Controller::CreateView("login");
		}
	}

	public static function logarUsuario() {

		session_start();

		if (!empty($_POST)) {
			$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
			$senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);

			if ($email !=null && $email != "") {
				if ($senha !=null && $senha != "") {
					if (Usuario::getLogin($email, $senha) == true) {
						$_SESSION['email'] = $email;
						$_SESSION['nome'] = Usuario::getNomeUsuarioFromEmail($email);
						header('Location: disfuncoes');
						exit;
					} 
				}
			}	
		}
		unset ($_SESSION['email']);
		$_SESSION['msg'] = "Credenciais inválidas ou conta inexistente!";
		header('Location: login');
		exit;
	}

	public static function RegisterView() {
		session_start();
		if(isset($_SESSION['email']) == true) {
			header('Location: disfuncoes');
			exit;
		} else {
			Controller::CreateView("registrar");
		}
	}

	public static function registrarUsuario() {

		session_start();

		if (!empty($_POST)) {
			$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
			$senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);

			if ($nome !=null && $nome != "") {
				if ($email !=null && $email != "") {
					if ($senha !=null && $senha != "") {

						$usuario = new Usuario();

						$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

						$usuario->setnome($nome);
						if (Usuario::isEmailRegistered($email) == false) {
							$usuario->setemail($email);
							$usuario->setsenha($senhaSegura);
							$usuario->save();
							$_SESSION['email'] = $email;
							$_SESSION['nome'] = $nome;
							header('Location: login');
							exit;
						} else {
							$_SESSION['msg'] = "Este e-mail já está sendo utilizado!";
						}
					}
				}
			}
		}
		unset($_SESSION['email']);
		header('Location: registrar');
		exit;
	}

}

?>