<?php
/**
 * Created by PhpStorm.
 * User: aptor
 * Date: 22/08/16
 * Time: 10:31
 */

namespace Controllers;

use Model\Programa;

class IndexController extends Controller
{

    public function indexAction()
    {
        $programacao = new Programa();
        return $this->render('index.html.twig',
            array('teste' => false,'programa' => $programacao->getItensRaw())
        );
    }

    public function sendMailAction()
    {
        $Nome = $_POST["name"];    // Pega o valor do campo Nome
        $Fone = $_POST["phone"];    // Pega o valor do campo Telefone
        $Email = $_POST["email"];    // Pega o valor do campo Email
        $Mensagem = $_POST["message"];    // Pega os valores do campo Mensagem

        $corpo = $this->render('email-template.html.twig', array('nome' => $Nome,'fone' => $Fone, 'email' => $Email, 'msg' => $Mensagem));

        $mail = new \PHPMailerOAuth;
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->AuthType = 'XOAUTH2';
        $mail->oauthUserEmail = GUSER;
        $mail->oauthClientId = OAUTH_CLIENT_ID;
        $mail->oauthClientSecret = OAUTH_CLIENT_SECRET;
        $mail->oauthRefreshToken = OAUTH_REFRESH_TOKEN;
        $mail->setFrom($Email, $Nome);
        $mail->addAddress(GUSER);
        $mail->Subject = 'CEARO 2017 - '.$Nome;
        $mail->msgHTML($corpo);
        $mail->AltBody = $Nome.' - '.$Fone.' - '.$Email.' - '.$Mensagem;

        if (!$mail->send()) {
            $response = array(false);
        } else {
            $response = array(true);
        }
        return $this->renderJSON($response);
    }

    public function testAction()
    {
        $programacao = new Programa();
        return $this->render('index.html.twig', array('teste' => true , 'programa' => $programacao->getItensRaw()));
    }
}
