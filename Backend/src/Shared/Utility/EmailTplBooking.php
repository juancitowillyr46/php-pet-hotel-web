<?php
namespace App\Shared\Utility;

class EmailTplBooking
{
    public array $pets;
    public string $checkIn;
    public string $checkOut;
    public array $services;
    public string $total;

    public function getPets(): string
    {
        $body = '';
        foreach ($this->pets as $pet) {
            $body .= '<tr>';
                $body .= '<td bgcolor="#f5f5f5" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">'.$pet.'</td>';
            $body .= '</tr>';

        }
        return $body;
    }

    /**
     * @param array $pets
     */
    public function setPets(array $pets): void
    {
        $this->pets = $pets;
    }

    /**
     * @return string
     */
    public function getCheckIn(): string
    {
        return $this->checkIn;
    }

    /**
     * @param string $checkIn
     */
    public function setCheckIn(string $checkIn): void
    {
        $this->checkIn = $checkIn;
    }

    /**
     * @return string
     */
    public function getCheckOut(): string
    {
        return $this->checkOut;
    }

    /**
     * @param string $checkOut
     */
    public function setCheckOut(string $checkOut): void
    {
        $this->checkOut = $checkOut;
    }

    /**
     * @return string
     */
    public function getTotal(): string
    {
        $body = '';
        $body .= '<tr>';
            $body .= '<td align="right" bgcolor="#f5f5f5" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px" colspan="3">Total</td>';
            $body .= '<td align="right" bgcolor="#f5f5f5" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px" colspan="1">'.$this->total.'</td>';
        $body .= '</tr>';

        return $body;
    }

    /**
     * @param string $total
     */
    public function setTotal(string $total): void
    {
        $this->total = $total;
    }


    public function getServices(): string
    {
        $body = '';

        $body .= '<tr>';
            $body .= '<td align="left" bgcolor="#008192" style="padding: 13px; padding-left: 25px; color: #ffa827; font-weight: 600; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">Servicios</td>';
            $body .= '<td bgcolor="#008192" style="padding: 13px; padding-left: 25px; color: #ffa827; font-weight: 600; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">Precio</td>';
            $body .= '<td bgcolor="#008192" style="padding: 13px; padding-left: 25px; color: #ffa827; font-weight: 600; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">Cantidad</td>';
            $body .= '<td bgcolor="#008192" style="padding: 13px; padding-left: 25px; color: #ffa827; font-weight: 600; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">Subtotal</td>';
        $body .= '</tr>';

        foreach ($this->services as $service) {

            $service = (array) $service;

            $body .= '<tr>';
                $body .= '<td bgcolor="#f5f5f5" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">'.$service['serviceName'].'</td>';
                $body .= '<td align="center"  bgcolor="#f5f5f5" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">'.$service['price'].'</td>';
                $body .= '<td align="right"  bgcolor="#f5f5f5" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">'.$service['quantity'].'</td>';
                $body .= '<td align="right"  bgcolor="#f5f5f5" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">'.$service['subtotal'].'</td>';
            $body .= '</tr>';
        }

        return $body;
    }

    /**
     * @param array $services
     */
    public function setServices(array $services): void
    {
        $this->services = $services;
    }



    public function getContent() {
        $body = '';
        $body .= '<!DOCTYPE html>
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
                          <td width="678" align="center" valign="top" bgcolor="#F8F8F8"><img src="http://www.pethotelshangrila.pe/wp-content/themes/pethotel//img/mailing/mailing-logo.png" width="180" height="75" alt=""></td>
                        </tr>
                        <tr>
                          <td height="139" align="center" valign="top" style="line-height: 0">
                            <img src="http://www.pethotelshangrila.pe/wp-content/themes/pethotel//img/mailing/header-reserva.png" width="680" height="139" alt="">
                          </td>
                        </tr>
                        <tr>
                          <td height="193" align="center" valign="top" style="line-height: 0"><img src="http://www.pethotelshangrila.pe/wp-content/themes/pethotel//img/mailing/mailing-pet.png" width="488" height="193" alt=""><br>
                          </td>
                        </tr>
                        <tr>
                          <td height="69" align="center" valign="middle" style="color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 20px; font-weight: 500">Te indicamos tus datos de acceso a nuestra web:</td>
                        </tr>
                        <tr>
                          <td align="center" valign="middle">
                            <br>
                            <table width="420" border="0" cellpadding="0" cellspacing="0" style="-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px; overflow: hidden;">
                              <tbody>
                                <tr>
                                  <td width="105" bgcolor="#008192" style="padding: 13px; padding-left: 25px; color: #ffa827; font-weight: 600; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">Check-In</td>
                                  <td width="299" bgcolor="#f5f5f5" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">'.$this->getCheckIn().'</td>
                                </tr>
                                <tr>
                                  <td bgcolor="#007b8c" style="padding: 13px; padding-left: 25px; color: #ffa827; font-weight: 600; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">Check-Out</td>
                                  <td bgcolor="#eaeaea" style="padding: 13px; padding-left: 25px; color: #008193; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">'.$this->getCheckOut().'</td>
                                </tr>
                                
                              </tbody>
                            </table>

                          </td>
                        </tr>
                        <tr><td height="20">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">
                                <table width="420" border="0" cellpadding="0" cellspacing="0" style="-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px; overflow: hidden;">
                                    <tbody>
                                        <tr>
                                            <td bgcolor="#008192" style="padding: 13px; padding-left: 25px; color: #ffa827; font-weight: 600; font-family: Arial, Verdana, \'sans-serif\' !important; font-size: 15px">Mascotas</td>        
                                        </tr>';
                                    $body .= $this->getPets();
                                    $body .= '</tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                          <td height="20">&nbsp;</td>
                        </tr>
                        <tr>
                        <td align="center">
                            <table width="420" border="0" cellpadding="0" cellspacing="0" style="-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px; overflow: hidden;">
                              <tbody>';

                        $body .= $this->getServices();

                        $body .= $this->getTotal();

                        $body .= '</tbody>
                            </table>
                        </td>
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
                              <td width="40" align="center" valign="center"><a href="#"><img src="http://www.pethotelshangrila.pe/wp-content/themes/pethotel//img/mailing/mailing-facebook.png" width="21" height="25" alt=""></a></td>
                              <td width="37" align="center" valign="center"><a href="#"><img src="http://www.pethotelshangrila.pe/wp-content/themes/pethotel//img/mailing/mailing-instagram.png" width="21" height="25" alt=""></a></td>
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