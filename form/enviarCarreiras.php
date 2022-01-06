<?php

include('../config.php');
$data = [];

$token = isset($_POST['g-token']) ? $_POST['g-token'] : false;

if (!$token) {
    $data['menssagem'] = 'RECAPTCHA inválido!';
    $data['sucesso'] = false;
} else {
    $apiUrl = "https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response=" . $token . "&remoteip=" . $_SERVER['REMOTE_ADDR'];
    $res = file_get_contents($apiUrl);
    //Retorna um JSON informando se está ok
    $res = json_decode($res, true);
    if ((!$res['success'])) {
        $data['menssagem'] = "reCAPTCHA inválido!";
        $data['sucesso'] = false;
    } else {
        $nome = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $telefone = strip_tags($_POST['phone']);
        $cargo = strip_tags($_POST['cargo']);
        $mensagem = strip_tags($_POST['message']);
        $arquivoNome = json_decode($_POST['arquivo']);
                $corpo = "
                <table style='background-color: #FFFFFF;' width='744' border='0' align='center' cellpadding='0' cellspacing='0'>
                    <tbody>
                        <tr>
                            <td height='20' align='center' valign='middle'>
                                
                            </td>
                        </tr>
                        <tr>
                            <td align='center' valign='top'>
                                <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                                    <tbody>
                                        <tr>
                                            <td align='left' style='background: #ffffff; text-align:center'>
                                                <img src='https://res.cloudinary.com/dgkhfljp9/image/upload/v1637078932/small_logo_youcon_9babfa75b9.png' width='250' height='100' alt='Logomarca'>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height='20' align='center' valign='middle'>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                                    <tbody>
                                        <tr>
                                            <td height='4' align='center' valign='middle'>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height='20' align='center' valign='middle'>
                                
                            </td>
                        </tr>
                        <tr>
                            <td align='center' valign='top'>
                                <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                                    <tbody>
                                        <tr>
                                            <td style='font-family: Trebuchet MS,Verdana,Arial; text-align: justify; color: #5D5E5E; font-size: 16px;'>
                                            Olá!<br><br>

                                            Abaixo dados enviados através do formulário <strong>CARREIRAS</strong>

                                            <p><strong>Nome:</strong> $nome</p>
                                            <p><strong>Email:</strong> $email</p>
                                            <p><strong>Telefone:</strong> $telefone</p>
                                            <p><strong>Cargo:</strong> $cargo</p>
                                            <p><strong>Mensagem:</strong> $mensagem</p>

                                                <table border='0' cellpadding='0' cellspacing='0' style='width:100%;padding:20px;color:#253543;background-color:#e6e7e8'>  
                                                    <tbody>    
                                                        <tr>      
                                                            <th style='text-align:center;font-family:Ubuntu,sans-serif;font-weight:bold;font-size:20px' colspan='2'>       
                                                                <p style='margin:5px 0 15px'>Formulário de Carreiras</p>      
                                                            </th>    
                                                        </tr>    
                                                    </tbody>
                                                </table>
                                                <table>
                                                    <tr>
                                                        
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height='20' align='center' valign='middle'>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                                    <tbody>
                                        <tr>
                                            <td height='4' align='center' valign='middle'>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height='20' align='center' valign='middle'>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>";

                $info = array('assunto' => MAIL_TITLE,'corpo' => $corpo);
                $mail = new Email(SMTP_HOST, MAIL_SENDER, MAIL_PASS, 'Carreiras do Site');
                $mail->addAdress(MAIL_RECEIVE_CARREIRAS, NAME_RECEIVE_CARREIRAS);
                $mail->anexo(DIR_UPLOAD . '/' . $arquivoNome);
                $mail->formatarEmail($info);
        if ($mail->enviarEmail()) {
            Utils::deleteFile($arquivoNome);
                $data['sucesso'] = true;
                $data['menssagem'] = 'Enviado com sucesso!';
        } else {
            Utils::deleteFile($arquivoNome);
            $data['menssagem'] = 'Ocorreu um erro ao enviar!';
            $data['sucesso'] = false;
        }
    }
}

die(json_encode($data));
