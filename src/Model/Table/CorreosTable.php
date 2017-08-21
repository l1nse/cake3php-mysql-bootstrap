<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
/**
 * Correo Entity
 *
 * @property int $id
 * @property string $nombre
 *
 */
class CorreosTable extends Table
{

    public function enviarcorreo($tipo, $id, $nombre_persona,$email_user, $descripcion){
        //$this->loadModel('Log');
        $this->Log = TableRegistry::get('Log');
        if($email_user!=''){
            $Email = new Email('default');            
            $Email->emailFormat('html');
            $Email->from(['no-reply@mitani-holding.com' => 'MITANI HOLDING']);
            if(is_numeric($tipo)){
                switch ($tipo) {
                    case '1': 
                        $Email->subject('[MITANI HOLDING] Nuevo Ticket N° '.$id);
                        $Email->template('nuevoTicket', 'default');
                        $Email->viewVars(array('id' => $id, 'email_user' =>$email_user ,'nombre_persona' => $nombre_persona, 'descripcion' => $descripcion));
                        $Email->to($email_user);
                        //$Email->addTo('');
                    break;

                    case '2': 
                        $Email->subject('[MITANI HOLDING] Ticket Cerrado N° '.$id);
                        $Email->template('ticketAnular', 'default');
                        $Email->viewVars(array('id' => $id, 'email_user' =>$email_user ,'nombre_persona' => $nombre_persona, 'descripcion' => $descripcion));
                        $Email->to($email_user);
                        //$Email->addTo('');
                    break;

                    case '3': 
                        $Email->subject('[MITANI HOLDING] Ticket Anulado N° '.$id);
                        $Email->template('ticketAnular', 'default');
                        $Email->viewVars(array('id' => $id, 'email_user' =>$email_user ,'nombre_persona' => $nombre_persona, 'descripcion' => $descripcion));
                        $Email->to($email_user);
                        //$Email->addTo('');
                    break;

                    case '4': 
                        $Email->subject('[MITANI HOLDING] Ticket Reasignado N° '.$id);
                        $Email->template('nuevoTicket', 'default');
                        $Email->viewVars(array('id' => $id, 'email_user' =>$email_user ,'nombre_persona' => $nombre_persona, 'descripcion' => $descripcion));
                        $Email->to($email_user);
                        //$Email->addTo('');
                    break;
                    case '5': 
                        $Email->subject('[MITANI HOLDING] Ticket Rechazado N° '.$id);
                        $Email->template('ticketAnular', 'default');
                        $Email->viewVars(array('id' => $id, 'email_user' =>$email_user ,'nombre_persona' => $nombre_persona, 'descripcion' => $descripcion));
                        $Email->to($email_user);
                        //$Email->addTo('');
                    break;
                    case '6': 
                        $Email->subject('[MITANI HOLDING] Ticket Aprobado N° '.$id);
                        $Email->template('ticketAnular', 'default');
                        $Email->viewVars(array('id' => $id, 'email_user' =>$email_user ,'nombre_persona' => $nombre_persona, 'descripcion' => $descripcion));
                        $Email->to($email_user);
                        //$Email->addTo('');
                    break;
                    case '7': 
                        $Email->subject('[MITANI HOLDING] Ticket Agrega Gestión N° '.$id);
                        $Email->template('ticketAnular', 'default');
                        $Email->viewVars(array('id' => $id, 'email_user' =>$email_user ,'nombre_persona' => $nombre_persona, 'descripcion' => $descripcion));
                        $Email->to($email_user);
                        //$Email->addTo('');
                    break;
                }
            }
            //var_dump($Email); break;
        //$Email->send();

        if(!$Email->send()) {
            echo $this->Email->smtpError; die;
        }
       }
    }
}

