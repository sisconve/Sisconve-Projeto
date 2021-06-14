<?php

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->usuarioModel = $this->model('UsuarioModel');
    }

    public function cadastrar()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [

                'nome' => trim($formulario['nome']),
                'usuario' => trim($formulario['usuario']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirmar_senha' => trim($formulario['confirmar_senha']),

                'nome_erro' => '',
                'usuario_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirmar_senha_erro' => ''

            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = "Preencha o campo nome";
                endif;

                if (empty($formulario['usuario'])) :
                    $dados['usuario_erro'] = "Preencha o campo usuario";
                endif;

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = "Preencha o campo email";
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = "Preencha o campo senha";

                endif;

                if (empty($formulario['confirmar_senha_erro'])) :
                    $dados['confirmar_senha_erro'] = "Preencha o campo comfrimar Senha";

                endif;
            else :
                if (Validar::validarCampoString($formulario['nome'])) :
                    $dados['nome_erro'] = "Nome informado é invalido";

                elseif (Validar::validarCampoEmail($formulario['email'])) :
                    $dados['email_erro'] = "E-mail informado é invalido";

                elseif (Validar::validarCampoString($formulario['usuario'])) :
                    $dados['usuario_erro'] = "Usuario invalido";

                elseif ($this->usuarioModel->ValidarEmailUsuario($formulario['email'])) :
                    $dados['email_erro'] = "E-mail ja cadastrado";

                elseif ($this->usuarioModel->ValidarUsuario($formulario['usuario'])) :
                    $dados['usuario_erro'] = "Usuario invalido";

                elseif (strlen($formulario['senha']) < 6) :
                    $dados['senha_erro'] = "A senha deve ter no minino 6 caracteres";

                elseif ($formulario['senha'] != $formulario['confirmar_senha']) :
                    $dados['confirmar_senha_erro'] = "As senhas estao diferentes";

                else :
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if ($this->usuarioModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                endif;
            endif;

        else :
            $dados = [
                'nome' => '',
                'usuario' => '',
                'email' => '',
                'senha' => '',
                'confirmar_senha' => '',

                'nome_erro' => '',
                'usuario_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirmar_senha_erro' => ''
            ];

        endif;

        $this->view('usuarios/cadastrar', $dados);
    }
    public function login()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [

                'usuario' => trim($formulario['usuario']),
                'senha' => trim($formulario['senha']),

                'usuario_erro' => '',
                'senha_erro' => '',

            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['usuario'])) :
                    $dados['usuario_erro'] = "Preencha o campo usuario";
                endif;


                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = "Preencha o campo senha";

                endif;

            else :
                if (Validar::validarCampoString($formulario['usuario'])) :
                    $dados['usuario_erro'] = "Usuario invalido";

                else :
                    $login = $this->usuarioModel->login($formulario['usuario'], $formulario['senha']);

                    if ($login) :
                        $this->sesaoUsuario($login);
                    else :
                        echo "Usuarios ou senha invalidos <hr>";

                    endif;

                endif;
            endif;



            var_dump($formulario);

        else :
            $dados = [

                'usuario' => '',
                'senha' => '',

                'usuario_erro' => '',
                'senha_erro' => '',
            ];

        endif;

        $this->view('usuarios/login', $dados);
    }

    private function sesaoUsuario($login)
    {
        $_SESSION["USUARIO_ID"] = $login->id_usuario;
        $_SESSION["USUARIO_NOME_COMPLETO"] = $login->nome_completo;
        $_SESSION["USUARIO_USER"] = $login->usuario;
        $_SESSION["USUARIO_EMAIL"] = $login->email;
        $_SESSION["USUARIO_STATUS"] = $login->status;
        $_SESSION["USUARIO_NIVEL_ACESSO"] = $login->nivel_acesso;
        $_SESSION["USUARIO_DATA_CRIACAO"] = $login->criado_em;
    }

    public function sair()
    {
        unset($_SESSION["USUARIO_ID"]);
        unset($_SESSION["USUARIO_NOME_COMPLETO"]);
        unset($_SESSION["USUARIO_USER"]);
        unset($_SESSION["USUARIO_EMAIL"]);
        unset($_SESSION["USUARIO_STATUS"]);
        unset($_SESSION["USUARIO_NIVEL_ACESSO"]);
        unset($_SESSION["USUARIO_DATA_CRIACAO"]);

        session_destroy();
    }
}