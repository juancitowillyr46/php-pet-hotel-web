<?php
namespace App\Shared\Utility;


class EmailTplContact
{

    public string $email;
    public string $name;
    public string $message;
    public string $path;
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getContent() {
        $body = '<!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
          </head>
          <body style="background:#eaeaea; display:block!important; margin:0!important; padding:0!important; min-width:100%!important; width:100%!important; -webkit-text-size-adjust:none; text-align:center">
            <table width="680" border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
              <tbody>
                <tr>
                  <td bgcolor="#FFFFFF">
                    <table width="680" border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td width="678" align="center" valign="top" bgcolor="#F8F8F8"><img src="'.$this->getPath().'/img/mailing/mailing-logo.png" width="180" height="75" alt=""/></td>
                        </tr>
                        <tr>
                          <td height="139" align="center" valign="top" style="line-height: 0">
                            <img src="'.$this->getPath().'/img/mailing/header-contacto.png" width="680" height="139" alt=""/>
                          </td>
                        </tr>
                        <tr>
                          <td height="193" align="center" valign="top" style="line-height: 0"><img src="'.$this->path.'/img/mailing/mailing-pet.png" width="488" height="193" alt=""/><br>
                          </td>
                        </tr>
                        <tr>
                          <td height="69" align="center" valign="middle" style="color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 20px; font-weight: 500">Gracias por contactarte con nosotros<br>En breve nos comunicaremos contigo<br>¡Nos vemos!</td>
                        </tr>
                       
                        <tr>
                          <td height="54">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="98" align="center" valign="middle" bgcolor="#3f4140">
                            <table width="93" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                  <td height="25" colspan="2" align="center" valign="top" style="color: #FFFFFF; font-size: 12px; font-family: Arial, Verdana, \'sans-serif\' !important"><strong>SÍGUENOS</strong></td>
                                </tr>
                                <tr>
                                  <td width="40" align="center" valign="center"><a href="#"><img src="'.$this->path.'/img/mailing/mailing-facebook.png" width="21" height="25" alt=""/></a></td>
                                  <td width="37" align="center" valign="center"><a href="#"><img src="'.$this->path.'/img/mailing/mailing-instagram.png" width="21" height="25" alt=""/></a></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="45" align="center" valign="middle" bgcolor="#3f4140" style="border-top:1px solid #535453; color: #848484; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 11px">© 2020 Pet Hotel Shangrila. Todos los Derechos Reservados</td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </body>
        </html>';
        return utf8_decode($body);
    }
}