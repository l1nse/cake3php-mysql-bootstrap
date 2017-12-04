<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use FPDF;


/**
 * Calendarios Controller
 *
 * @property \App\Model\Table\CalendariosTable $Calendarios
 */
class CalendariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($parametro = null)
    {
      $id_user = $this->_getUser();
      $user = $this->_getUserFull($id_user);
      $role = $user->role_id;

        //var_dump($role); die;

      $this->loadModel('rolesPermisos');

      if(is_numeric($parametro))
      {
        switch ($parametro) {
          case '1' :

            $permisos = $this->rolesPermisos->find('all')
                ->where(['rolesPermisos.permiso_id' => 93]  )
                ->where(['rolesPermisos.role_id' => $role])
                ->toArray();  

            if(count($permisos) == 0)
            {
              return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
            } 
              //var_dump($permisos[0]['permiso_id']); die;
              
             if(count($permisos) == '1' && $permisos[0]['permiso_id'] == '93' )
              {  
                $calendarios = $this->Calendarios-> find('all')->where(['Calendarios.tipo_calendario' => 1])->toArray();
              }  
          break;

          case '2' :
            $permisos = $this->rolesPermisos->find('all')
                ->where(['rolesPermisos.permiso_id' => 106]  )
                ->where(['rolesPermisos.role_id' => $role])
                ->toArray();  

             if(count($permisos) == 0)
            {
              return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
            } 
             
              
             if(count($permisos) == '1' && $permisos[0]['permiso_id'] == '106' )
              {  

                $calendarios = $this->Calendarios-> find('all')->where(['Calendarios.tipo_calendario' => 2])->toArray();

              }  
          break;

         
          case '3' :

          $permisos = $this->rolesPermisos->find('all')
              ->where(['rolesPermisos.permiso_id' => 109]  )
              ->where(['rolesPermisos.role_id' => $role])
              ->toArray();  

          if(count($permisos) == 0)
          {
            return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
          } 
            //var_dump($permisos[0]['permiso_id']); die;
            
           if(count($permisos) == '1' && $permisos[0]['permiso_id'] == '109' )
            {  

              $calendarios = $this->Calendarios-> find('all')->where(['Calendarios.tipo_calendario' => 3])->toArray();
            }  
          break;

        
          case '4' :
            $permisos = $this->rolesPermisos->find('all')
              ->where(['rolesPermisos.permiso_id' => 111]  )
              ->where(['rolesPermisos.role_id' => $role])
              ->toArray();  
           if(count($permisos) == 0)
            {
            return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
            } 
            //var_dump($permisos[0]['permiso_id']); die;
           
           if(count($permisos) == '1' && $permisos[0]['permiso_id'] == '111' )
            {  

              $calendarios = $this->Calendarios-> find('all')->where(['Calendarios.tipo_calendario' => 4])->toArray();
            }  
          break;

        
          case '5':
            

            $permisos = $this->rolesPermisos->find('all')
                ->where(['rolesPermisos.permiso_id' => 104]  )
                ->where(['rolesPermisos.role_id' => $role])
                ->toArray();  

            if(count($permisos) == 0)
            {
              return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
            } 
              //var_dump($permisos[0]['permiso_id']); die;
              if(count($permisos) == '1' && $permisos[0]['permiso_id'] == '104' )
              {
                $calendarios = $this->Calendarios-> find('all')
                ->contain(['calendariosAsistentes'])
                ->where(['Calendarios.tipo_calendario' => 1]);
                
                if($id_user!=''){
                $calendarios->Matching('CalendariosAsistentes', function ($q) use ($id_user) {
                return $q->where(['CalendariosAsistentes.user_id' => $id_user ]);
                });          
                }
                
                $calendarios->toArray();
             }           
          break;


        
          case '6':
            $permisos = $this->rolesPermisos->find('all')
                ->where(['rolesPermisos.permiso_id IN' => 108]  )
                ->where(['rolesPermisos.role_id' => $role])
                ->toArray();  

             if(count($permisos) == 0)
            {
              return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
            } 
             
              //var_dump($permisos[0]['permiso_id']); die;
              if(count($permisos) == '1' && $permisos[0]['permiso_id'] == '108' )
              {

                $calendarios = $this->Calendarios-> find('all')
                ->contain(['calendariosAsistentes'])
                ->where(['Calendarios.tipo_calendario' => 2]);
                
                if($id_user!=''){
                  $calendarios->Matching('CalendariosAsistentes', function ($q) use ($id_user) {
                  return $q->where(['CalendariosAsistentes.user_id' => $id_user ]);
                  });          
                }
                
                $calendarios->toArray();

             }
             
          break;

        
          case '7':
            //var_dump($arrayPermiso); die;

            $permisos = $this->rolesPermisos->find('all')
                ->where(['rolesPermisos.permiso_id' => 110]  )
                ->where(['rolesPermisos.role_id' => $role])
                ->toArray();  

            if(count($permisos) == 0)
            {
              return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
            } 
              //var_dump($permisos[0]['permiso_id']); die;
              if(count($permisos) == '1' && $permisos[0]['permiso_id'] == '110' )
              {
                $calendarios = $this->Calendarios-> find('all')
                ->contain(['calendariosAsistentes'])
                ->where(['Calendarios.tipo_calendario' => 3]);
                
                if($id_user!=''){
                $calendarios->Matching('CalendariosAsistentes', function ($q) use ($id_user) {
                return $q->where(['CalendariosAsistentes.user_id' => $id_user ]);
                });          
                }
                
                $calendarios->toArray();
             }
             
          break;

          case '8':
              //var_dump($arrayPermiso); die;

              $permisos = $this->rolesPermisos->find('all')
                  ->where(['rolesPermisos.permiso_id' => 112]  )
                  ->where(['rolesPermisos.role_id' => $role])
                  ->toArray();  
               if(count($permisos) == 0)
              {
                return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
              } 
                //var_dump($permisos[0]['permiso_id']); die;
                if(count($permisos) == '1' && $permisos[0]['permiso_id'] == '112' )
                {
                  $calendarios = $this->Calendarios-> find('all')
                  ->contain(['calendariosAsistentes'])
                  ->where(['Calendarios.tipo_calendario' => 4]);
                  
                  if($id_user!=''){
                  $calendarios->Matching('CalendariosAsistentes', function ($q) use ($id_user) {
                  return $q->where(['CalendariosAsistentes.user_id' => $id_user ]);
                  });          
                  }
                  
                  $calendarios->toArray();
               }
          
            break; 

            default : return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
        }         
      }else
      {
          return $this->redirect(['controller' => 'Users' , 'action' => 'home']);  
      }

      
      
      //var_dump($permisos['id']); die;
        
       $iduser = $this->_getUser(); 

      $this->set(compact('calendarios','permisos','parametro','iduser'));
      $this->set('_serialize', ['calendarios']);
    }


    /**
     * View method
     *
     * @param string|null $id Calendario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      if(is_numeric($id))
      {
          $calendario = $this->Calendarios->get($id, [
            'contain' => ['Contactos'=>'Entidades']
          ]);
      }else
      {
        return $this->redirect(['controller' => 'Users' , 'action' => 'home']);
      }
        
        $this->loadModel('CalendariosContactos');

        $contactos = $this->CalendariosContactos->find('all')->contain(['Contactos'])
        ->contain(['Contactos'])
        ->where(['CalendariosContactos.calendario_id' => $id])->toArray(); //


        $this->loadModel('CalendariosAsistentes');
        $asistentes = $this->CalendariosAsistentes->find('all')->where(['CalendariosAsistentes.calendario_id' => $id ])
        ->contain(['Users'=>'FichaPersonales'])->toArray();

        $this->set('calendario', $calendario);
        $this->set('_serialize', ['calendario']);
        $this->set(compact( 'contactos' , 'asistentes'));
    }



    public function exportPdf($idcalendario = null)
    {

        require_once '../vendor/fpdf/fpdf.php';         
          
          //informacion de la reunion (metodo en el app controller)
          
          $reu = $this->_getReunion($idcalendario)->toArray();

          //informacion de los asistentes
          $this->loadModel('CalendariosAsistentes');
          $asis = $this->CalendariosAsistentes->find('all')->contain(['Users'])
          ->where(['CalendariosAsistentes.calendario_id' => $idcalendario])->toArray();


          //informacion de los contactos
          $this->loadModel('CalendariosContactos');
          $contac = $this->CalendariosContactos->find('all')->contain(['contactos'=>'entidades'])
          ->where(['CalendariosContactos.calendario_id' => $idcalendario])->toArray();

          //var_dump($contac[0]['Entidades']['name']); die;

          //Se crea el PDF  
          $pdf = new FPDF();
          $pdf->AddPage();
          

          //header
          $pdf->Cell(50,10,'',1);
          $pdf->Image('img/mitani_holding.png',12,11,40);
          // Arial bold 15
          $pdf->SetFont('Arial','B',15);
          // Movernos a la derecha
          
          // Título
          $pdf->Cell(90,10,'Reporte visita',1,0,'C');

          //Codigo , Fecha
          $pdf->SetXY(150,10);
          $pdf->SetFont('Times','' ,8);
          $pdf->MultiCell(50,5,utf8_decode('Folio visita  : '),1,1);


          $pdf->SetXY(170,10);
          $pdf->SetFont('Times','' ,8);
          $pdf->MultiCell(50,5,utf8_decode($reu['id']),0,1);

          $pdf->SetXY(150,15);
          $pdf->SetFont('Times','' ,8);
          $pdf->MultiCell(50,5,utf8_decode('Fecha    : '),1,1);

          $pdf->SetXY(165,15);
          $pdf->SetFont('Times','' ,8);

          $fecha = date("d").' - '.date("M").' - '.date("Y");
          $pdf->MultiCell(50,5,utf8_decode($fecha),0,1);
          // Salto de línea
          $pdf->Ln(10);
         
          //body
          $pdf->SetTitle($reu['titulo']);
          // Arial bold 15
          $pdf->SetFont('Arial','U',18);
          // Movernos a la derecha
          
          // Título
          $pdf->SetFont('Times','' ,12);

          $pdf->Cell(60,10,utf8_decode('Título '),0,0,'C');
          $pdf->Cell(10,10,' :  ',0,0,'L');
          $pdf->Cell(40,10, utf8_decode($reu['titulo']),0,1,'L');

          /*$pdf->Cell(60,10,'ID ',0,0,'C');
          $pdf->Cell(10,10,' :  ',0,0,'L');
          $pdf->Cell(40,10, $reu['id'],0,1,'L'); */
          
          $pdf->Cell(60,10,'Fecha y Hora ',0,0,'C');
          $pdf->Cell(10,10,' :  ',0,0,'L');
          $pdf->Cell(40,10, $reu['date_time'],0,1,'L');


          $pdf->Cell(60,10,'Empresa ',0,0,'C');
          $pdf->Cell(10,10,' :  ',0,0,'L');
          $pdf->Cell(40,10, utf8_decode($contac[0]['Entidades']['name']),0,1,'L');

          
          //var_dump($reu['descripcion']); die;
          $descripcion = strip_tags($reu['descripcion']);
          $descripcion = html_entity_decode($descripcion);

          $pdf->Cell(60,10,'Motivo ',0,0,'C');
          $x = $pdf->getX();
          $y = $pdf->getY(); 
          $pdf->Cell(10,10,' :  ',0,0,'L');
          $pdf->SetXY($x+10,$y   );
          $pdf->MultiCell(110,10, utf8_decode($descripcion),1);
          $pdf->ln(10);


          $observacion = strip_tags($reu['observacion']);          
          $observacion = html_entity_decode($observacion);
          //var_dump($observacion); die;

          $pdf->Cell(60,10,utf8_decode('Observación'),0,0,'C');
          $x = $pdf->getX();
          $y = $pdf->getY();
          $pdf->Cell(10,10,' :  ',0,0,'L');
          $pdf->SetXY($x+10,$y);
          $pdf->MultiCell(110,10, utf8_decode($observacion),1);

          
          $pdf->Cell(60,30,'Asistentes ',0,0,'C');
          $pdf->Cell(10,10,'   ',0,0,'L');
          $pdf->Cell(40,10, '',0,1,'L');

          foreach ($asis as $row ) {
          $pdf->Cell(60,10,' ',0,0,'C');
          $pdf->Cell(10,10,' : ',0,0,'L');
          $pdf->Cell(40,10, utf8_decode($row->user['name'].' '.$row->user['apellido1'].' '.$row->user['apellido2']) ,0,1,'L');
          $y = $pdf->getY();      
            
          }

          $pdf->Cell(60,30,'Contactos ',0,0,'C');
          $pdf->Cell(10,10,'   ',0,0,'L');
          $pdf->Cell(40,10, '',0,1,'L');
          foreach ($contac as $row ) {
          $pdf->Cell(60,10,' ',0,0,'C');
          $pdf->Cell(10,10,' : ',0,0,'L');
          $pdf->Cell(40,10,  utf8_decode($row->Contactos['name']),0,1,'L');      
          $y = $pdf->getY();      
            if($y > 240)
            {
              $pdf->AddPage();
            };
          }
          
          
          //footer 
          $pdf->SetXY(25 ,245);
          $pdf->SetFont('Times','' ,9);
          $pdf->MultiCell(190,20,'Este documento impreso o almacenado fuera de Intranet NO asegura su vigencia ',0,'C');  

          $pdf->SetXY(10 ,250);
          $pdf->SetFont('Times','' ,9);
          $pdf->MultiCell(190,20,utf8_decode('Luis Thayer Ojeda 0191, Piso 8. – Providencia, Santiago, Chile Telf. +56 2 2598 8000 '),1,'C');  

          $pdf->SetXY(10 ,255);
          $pdf->SetFont('Times','' ,9);
          $pdf->MultiCell(190,20,utf8_decode('www.mitani-holding.com   www.mitanitravel.cl  www.andes-nippon  www.mitanipropiedades.cl '),0,'C');  




          
          //fin del pdf
          $pdf->Output('D', "Visita : ". $reu['id'].".pdf");
          //$this->set(compact('contac'));
         
    }

    

    public function exportExcel($idus = null , $month = null , $year = null)
    {
      
        $this->viewBuilder()->layout(false);

        $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades' , 'CalendariosAsistentes']);

        if($idus!='N'){
          $calendario->Matching('CalendariosAsistentes', function ($q) use ($idus) {
        return $q->where(['CalendariosAsistentes.user_id' => $idus ]);
        });
        }

        if($month!='N'){
            $calendario->where(function ($exp, $q) use ($month) {
                return $exp->eq('MONTH(Calendarios.date_time)' , $month);
            });
          }
        if($year!='N'){
              $calendario->where(function ($exp, $q) use ($year) {
                  return $exp->eq('YEAR(Calendarios.date_time)', $year);
              });
          }




          $calendario->toArray();
        

         
        $this->set(compact('calendario'));
        $this->set('_serialize', ['calendario']);                
    }


      

    public function view2($parametro= null) 
    {

        
        $rol = $this-> _getRol();
        
        $this->loadModel('RolesPermisos');
        
        $idus = null;
        $reu = null;
        $year = null;
        $month = null;


            if(is_numeric($parametro)  )
            {                 

                  if($parametro == '1' )
                  {

                     $permi = array("115" , "118");

                     $permisos = $this->RolesPermisos->find('all')->where(['RolesPermisos.permiso_id IN' => $permi, 'RolesPermisos.role_id' => $rol ])
                        ->toArray();

                    if(isset($permisos) && count($permisos)>0)
                      {     
                        $permisos = $permisos[0]['permiso_id'];                          
                      }
                    else
                      {
                        return $this->redirect(['controller' => 'Users','action' => 'home']);  
                      }



                    switch ($permisos) {
                    case '118': 
                        
                                    
                      if(is_numeric($permisos))
                        {

                                  $idus = $this->_getUser();
                                  $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades','CalendariosAsistentes'])
                                  ->where(['Calendarios.tipo_calendario'=>1]);
                                  
                                  if(is_numeric($idus))
                                  {
                                    $calendario->Matching('CalendariosAsistentes', function ($q) use ($idus) {
                                    return $q->where(['CalendariosAsistentes.user_id' => $idus ]);

                                    });
                                  }  
                        }
                      else
                        {
                          return $this->redirect(['controller' => 'Users','action' => 'home']);  
                        }
                      
                        
                    break;

                    case '115':
                      

                            if(isset($permisos) && count($permisos)>0)
                            {
           
                              $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades','CalendariosAsistentes'])
                              ->where(['Calendarios.tipo_calendario'=>1]);    

                            }else
                            {
                              
                              return $this->redirect(['controller' => 'Users','action' => 'home']);  
                            }
                    break;

                    
                    default : return $this->redirect(['controller' => 'Users','action' => 'home']);  
                    break; 
                    }
                  }

                 

                  if($parametro == '2' )
                  {
                    $permi = array("114" , "119");

                     $permisos = $this->RolesPermisos->find('all')->where(['RolesPermisos.permiso_id IN' => $permi, 'RolesPermisos.role_id' => $rol ])
                        ->toArray();

                     
                      
                      if(isset($permisos) && count($permisos)>0)
                      {
                        $permisos = $permisos[0]['permiso_id'];

                      }
                      else
                      {
                        return $this->redirect(['controller' => 'Users','action' => 'home']);  
                      }



                    switch ($permisos) {
                    case '119': 
                       
                        if(is_numeric($permisos))
                        {

                            $idus = $this->_getUser();
                            $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades','CalendariosAsistentes'])
                            ->where(['Calendarios.tipo_calendario'=>2]);
                            
                            if(is_numeric($idus))
                            {

                              $calendario->Matching('CalendariosAsistentes', function ($q) use ($idus) {
                              return $q->where(['CalendariosAsistentes.user_id' => $idus ]);

                              });
                            }  
                        }else
                        {
                          
                          return $this->redirect(['controller' => 'Users','action' => 'home']);  
                        }
                      
                        
                    break;

                    case '114':
                      

                            if(isset($permisos) && count($permisos)>0)
                            {

                            
                                      
                            $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades','CalendariosAsistentes'])
                            ->where(['Calendarios.tipo_calendario'=>2]);    

                            }else
                            {
                              
                              return $this->redirect(['controller' => 'Users','action' => 'home']);  
                            }
                    break;

                    default : return $this->redirect(['controller' => 'Users','action' => 'home']);  
                    break;
                    }

                      
                  }
                    
                    

                  

                  if($parametro == '3' )
                  {

                     $permi = array("116" , "120");

                     $permisos = $this->RolesPermisos->find('all')->where(['RolesPermisos.permiso_id IN' => $permi, 'RolesPermisos.role_id' => $rol ])
                        ->toArray();

                    if(isset($permisos) && count($permisos)>0)
                      {

                        $permisos = $permisos[0]['permiso_id'];

                      }
                      else
                      {
                        return $this->redirect(['controller' => 'Users','action' => 'home']);  
                      }

                      
                    switch ($permisos) {
                    case '120': 
                        
                        

                      if(isset($permisos) && count($permisos)>0)
                      {                        

                        
                                            
                        if(is_numeric($permisos))
                        {                          
                            $idus = $this->_getUser();
                            $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades','CalendariosAsistentes'])
                            ->where(['Calendarios.tipo_calendario'=>3]);
                            
                            if(is_numeric($idus))
                            {

                              $calendario->Matching('CalendariosAsistentes', function ($q) use ($idus) {
                              return $q->where(['CalendariosAsistentes.user_id' => $idus ]);
                              });
                            }
                        }

                      }else
                            {
                              
                              return $this->redirect(['controller' => 'Users','action' => 'home']);  
                            }  
                        
                    break;

                    case '116':
                            

                            if(isset($permisos) && count($permisos)>0)
                            {

                            
                                      
                            $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades','CalendariosAsistentes'])
                            ->where(['Calendarios.tipo_calendario'=>3]);    

                            }else
                            {
                              
                              return $this->redirect(['controller' => 'Users','action' => 'home']);  
                            }
                    break;

                    default : return $this->redirect(['controller' => 'Users','action' => 'home']);  
                    break;
                    }
                  }

                  if($parametro == '4' )
                  {

                    $permi = array("117" , "121");

                     $permisos = $this->RolesPermisos->find('all')->where(['RolesPermisos.permiso_id IN' => $permi, 'RolesPermisos.role_id' => $rol ])
                        ->toArray();

                    if(isset($permisos) && count($permisos)>0)
                      {

                        $permisos = $permisos[0]['permiso_id'];

                      }
                      else
                      {
                        return $this->redirect(['controller' => 'Users','action' => 'home']);  
                      }

                    switch ($permisos) {
            
                    case '121': 
                        
                        

                      if(isset($permisos) && count($permisos)>0)
                      {                        
                                            
                        if(is_numeric($permisos))
                        {

                            $idus = $this->_getUser();
                            $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades','CalendariosAsistentes'])
                            ->where(['Calendarios.tipo_calendario'=>4]);
                            
                            if(is_numeric($idus))
                            {

                              $calendario->Matching('CalendariosAsistentes', function ($q) use ($idus) {
                              return $q->where(['CalendariosAsistentes.user_id' => $idus ]);
                              });
                            }else
                            {
                              
                              return $this->redirect(['controller' => 'Users','action' => 'home']);  
                            }  
                        }
                      }
                        
                    break;

                    case '117':

                            if(isset($permisos) && count($permisos)>0)
                            {

                            $calendario = $this->Calendarios->find('all')->contain(['Contactos'=>'Entidades','CalendariosAsistentes'])
                            ->where(['Calendarios.tipo_calendario'=>4]);    

                            }else
                            {
                              return $this->redirect(['controller' => 'Users','action' => 'home']);  
                            }
                    break;

                    default : return $this->redirect(['controller' => 'Users','action' => 'home']);  
                    break;
                    }

                  } 
                  

              
            }

        
        if ($this->request->is('post')) {
        
        //var_dump($this->request->data['user_asignado_id']); die;
        
          $year = isset($this->request->data['year']) && $this->request->data['year']!='' ? $this->request->data['year'] : '';
          $month = $this->request->data['month'];

          if($permisos == 93 || $permisos == 109 || $permisos == 111 || $permisos == 106)
          {
            $idus  = $this->request->data['user_asignado_id'];  
          }else
          {
            $idus = $this->_getUser();
          }

          

          if($year!=''){
              $calendario->where(function ($exp, $q) use ($year) {
                  return $exp->eq('YEAR(Calendarios.date_time)', $year);
              });
          } 
           


          if($month!=''){
            $calendario->where(function ($exp, $q) use ($month) {
                return $exp->eq('MONTH(Calendarios.date_time)' , $month);
            });
          }

          if($idus!=''){

            $calendario->Matching('CalendariosAsistentes', function ($q) use ($idus) {
          return $q->where(['CalendariosAsistentes.user_id' => $idus ]);
          });
          }

        $calendario->toArray();
        
        }
        $this->loadModel('Users');

        $usuarios = $this->Users->find('all')->where(['active' => 1])->order(['name' => 'ASC'])->toArray();

        $this->set(compact('calendario','reu','year','month','idus','permisos'));
        $this->set('usuarios', $usuarios);

        $this->set('_serialize', ['calendario']);
    }

    
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idempresa = null)
    {

        $calendario = $this->Calendarios->newEntity();

        $id_user = $this->_getUser();
        $rs_user = $this->_getUserFull($id_user);
        $user = $rs_user->name." ".$rs_user->apellido1." ".$rs_user->apellido2;


        if(is_numeric($idempresa))
        {
            if ($this->request->is('post')) {

                    $this->loadModel('CalendariosContactos');
                    $this->loadModel('correos');
                    //var_dump($this->request->data['est']); die;
                    
                    //var_dump($descripcion); die;

                    //Formateo de fecha para guardar
                    $this->request->data['active'] = 6; //6 = pre agendada
                    
                    $this->request->data['date_calendar'] = $this->formatDateTimeCalendar($this->request->data['date_calendar']);
                    $datos = $this->request->data;          
                    
                        
                    $rs_contacto = $this->request->getData('contacto');
                    

                    $calendario = $this->Calendarios->patchEntity($calendario, $datos);
                    $calendario['date_time'] = $this->request->data['date_calendar'];
                    

                    $asistentes = $this->request->getData('asistentes');
                    

                    

                    if ($this->Calendarios->save($calendario)) {
                        
                      $calendario_id = $calendario->id;
                       
                      $descripcion = "<b>Reunion N°: ".$calendario_id."</b><br><br><b>Enviado por: </b>".$user."<br><br><b>Asunto:</b> ".'Nueva reunion'."<br><br><b>Descripción</b>: ".$this->request->data['descripcion'];


                      foreach ($asistentes as $row ) {
                      //var_dump($calendario_id); die;

                          $this->correos->enviarcorreo(8, $calendario_id ,$this->_getUserNameAsig($row),$this->_getUserEmailAsig($row), $descripcion); 
                      }  
                       

                        //se carga el id de la reuinion recien creada
                        $calendario_id  = $calendario->id;
                       ;
                        $rs_contacto = $this->request->getData('contacto');
                        //recorro el arreglo de contactos
                        foreach ($rs_contacto as $row) {
                             //CREA UN NUEVO calendarioContacto vacio
                                $calendario_contacto = $this->CalendariosContactos->newEntity();
                                //AGREGA UN Contacto_ID A calendarios_contactos
                                $rs_calendario_contacto['calendario_id'] = $calendario_id;
                                //AGREGA UN CONTACTO A CALENDARIO
                                $rs_calendario_contacto['contacto_id'] = $row;
                                //VUELVE A GENERAR UN OBJETO ROLE_PERMISO ESTA VES LLENO 
                                $calendario_contacto = $this->CalendariosContactos->patchEntity($calendario_contacto, $rs_calendario_contacto);
                                //var_dump($calendario_contacto); die;
                                //GUARDA EL calendario_contacto
                                if($this->CalendariosContactos->save($calendario_contacto)){
                                    //var_dump('exito');
                                }else{
                                    //var_dump('no exito');
                                }
                                //VUELVE A HACER EL CICLO
                        }

                         
                         $this->loadModel('CalendariosAsistentes');

                         //var_dump($asistentes); die;
                        foreach ($asistentes as $row) {
                            //Creo una nueva instancia de calendario asistentes
                         $calendariosAsistentes = $this->CalendariosAsistentes->newEntity();
                         //Creo un arreglo donde almacenare las variables a guardar en la entidad recien creada
                         $rs_calendarioAsistentes['calendario_id'] = $calendario_id;
                         $rs_calendarioAsistentes['user_id'] = $row;

                         
                         //cruzamos el array con ela entidad para que llene los campos de igual nombre
                         $calendariosAsistentes = $this->CalendariosAsistentes->patchEntity($calendariosAsistentes , $rs_calendarioAsistentes);


                         if($this->CalendariosAsistentes->save($calendariosAsistentes)){
                                    var_dump('exito');
                                }else{
                                    var_dump('no exito');
                                }

                          }
                         



                        $this->Flash->success(__('La reunion fue agendada.'));
        
                        }else
                        {
                          

                            $this->Flash->error(__('No se pudo agendar la reunion'));

                        }
                    
                    return $this->redirect(['action' => 'view/'.$calendario_id]);

                    
                }
                /*else {
                             
                             $x = $calendario->errors();
                             if ($x) {
                              debug($calendario);
                              debug($x);
                              return false;
                             }                
                             die;
                             
                    } */

                
        }else
        {
            return $this->redirect(['controller' => 'Users','action' => 'home']);
        }

        if(is_numeric($idempresa))
        {
          $this->loadModel('Users');
          $asistentes = $this->Users->find('all')->where([ 'Users.active'=>1])->toArray();

          $this->loadModel('Contactos');
          $contactos = $this->Contactos->find('all')
          ->where(['Contactos.entidade_id' => $idempresa , 'Contactos.active'=>'1'])->toArray();  
        }else
        {
          return $this->redirect(['controller' => 'Users','action' => 'home']);
        }

        
        

        $this->set(compact('calendario', 'contactos', 'asistentes'));
        $this->set('_serialize', ['calendario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calendario id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $idempresa = null)
    {
      if(is_numeric($id) && is_numeric($idempresa))
      {
        $calendario = $this->Calendarios->get($id, [
            'contain' => ['Contactos']
        ]);

          $id_user = $this->_getUser();
          $rs_user = $this->_getUserFull($id_user);
          $user = $rs_user->name." ".$rs_user->apellido1." ".$rs_user->apellido2;
          //var_dump($user); die;

          
          if ($this->request->is(['patch', 'post', 'put'])) 
          {
            $this->request->data['date_time'] = $this->formatDateTimeCalendar($this->request->data['date_time']);
              $datos = $this->request->data;  

              $calendario = $this->Calendarios->patchEntity($calendario, $this->request->data);

              if ($this->Calendarios->save($calendario)) 
              {
                $calendario_id  = $calendario->id;
                 $this->loadModel('CalendariosAsistentes');
                 $this->loadModel('correos');

                 
                 $asistentes = $this->CalendariosAsistentes->find('all')->where(['CalendariosAsistentes.calendario_id' => $calendario_id  ])
                ->contain(['Users'=>'FichaPersonales'])->toArray();

                $descripcion = "<b>Reunion N°: </b>".$calendario_id."<br><br><b>Enviado por: </b>".$user."<br><br><b>Asunto:</b> ".'Reunion editada'."<br><br><b>Observación</b>: ".$this->request->data['observacion'];
                 foreach ($asistentes as $row ) 
                  {
                     //var_dump(); die;
                     $this->correos->enviarcorreo(9, $calendario_id ,$this->_getUserNameAsig($row->user['id']),$this->_getUserEmailAsig($row->user['id']), $descripcion);

                  }
                          
                
                            

                       //se carga el id de la reuinion recien creada
                         
                           $rs_contacto = $this->request->getData('contactosAdd');
                           $rs_asistentes = $this->request->getData('listaAsistentes');
                          //var_dump($rs_asistentes); echo "<br>"; die;
                          //recorro el arreglo de contactos
                          $this->loadModel('CalendariosContactos');


                          if(isset($rs_contacto) && count($rs_contacto>0))
                           {
                              foreach ($rs_contacto as $row) {
                               //CREA UN NUEVO calendarioContacto vacio
                                  $calendario_contacto = $this->CalendariosContactos->newEntity();
                                  //AGREGA UN Contacto_ID A calendarios_contactos
                                  $rs_calendario_contacto['calendario_id'] = $calendario_id;
                                  //AGREGA UN CONTACTO A CALENDARIO
                                  $rs_calendario_contacto['contacto_id'] = $row;
                                  
                                  //VUELVE A GENERAR UN OBJETO ROLE_PERMISO ESTA VES LLENO 
                                  $calendario_contacto = $this->CalendariosContactos->patchEntity($calendario_contacto, $rs_calendario_contacto);
                                  
                                  //var_dump($calendario_contacto); die;
                                  //GUARDA EL calendario_contacto
                                  if($this->CalendariosContactos->save($calendario_contacto)){
                                      var_dump('exito');
                                  }else{
                                      var_dump('no exito');
                                  }
                                  //VUELVE A HACER EL CICLO
                              }    
                           }
                          
                          
                          $descripcion = "<b>Reunion N°: ".$calendario_id."</b><br><br><b>Enviado por: </b>".$user."<br><br><b>Asunto:</b> ".'Nueva Reunion'."<br><br>"."<b>Observación</b>: ".$this->request->data['observacion'];



                          if(isset($rs_asistentes)&& count($rs_asistentes)> 0)
                           {
                            
                              foreach ($rs_asistentes as $row) {
                              //var_dump($row); die;                                              
                              $this->correos->enviarcorreo(8, $calendario_id ,$this->_getUserNameAsig($row),$this->_getUserEmailAsig($row), $descripcion);      
                                 
                               //CREA UN NUEVO calendarioContacto vacio
                                  $calendario_asistentes = $this->CalendariosAsistentes->newEntity();
                                  //AGREGA UN Contacto_ID A calendarios_contactos
                                  $rs_calendario_asistentes['calendario_id'] = $calendario_id;
                                  //AGREGA UN CONTACTO A CALENDARIO
                                  $rs_calendario_asistentes['user_id'] = $row;
                                  
                                  //VUELVE A GENERAR UN OBJETO ROLE_PERMISO ESTA VES LLENO 
                                  $calendario_asistentes = $this->CalendariosAsistentes->patchEntity($calendario_asistentes, $rs_calendario_asistentes);
                                  
                                  //var_dump($calendario_contacto); die;
                                  //GUARDA EL calendario_contacto
                                  if($this->CalendariosAsistentes->save($calendario_asistentes)){
                                      var_dump('exito');
                                  }else{
                                      var_dump('no exito');
                                  }
                                  //VUELVE A HACER EL CICLO
                              }    
                           }    
                       $this->Flash->success(__('Se guardaron correctamente los cambios.'));

                return $this->redirect(['action' => 'view/'.$calendario['id']]);     
               }else
               {
                $this->Flash->success(__('No s epudieron cambiar correctamente los cambios. Intente nuevamente mas tarde'));                 
               }
            
            }
     
      }
      
      if(is_numeric($id) && is_numeric($idempresa))
      {
          $conn = ConnectionManager::get('default');

              $this->loadModel('Users');
              //$listaAsistentes = $this->Users->find('all')->join([
              //  'CalendariosAsistentes' => [
              //      'table' => 'calendarios_asistentes',
              //      'type' => 'RIGHT',
              //      'conditions' => 'CalendariosAsistentes.user_id not in (Users.id)',
              //  ]])->where(['Users.active'=>1])->group(['Users.id'])->toArray();
              $sql_asistentes = "
                    SELECT us.id , us.name, us.apellido1, us.apellido2 FROM users AS us
                    INNER JOIN `calendarios_asistentes` AS c_as ON (us.id <> c_as.user_id) 
                    WHERE us.active = 1
                    AND us.id NOT IN (SELECT user_id FROM `calendarios_asistentes` WHERE `calendario_id` = ". $id ." )
                    GROUP BY us.id";
       

                      $stmt_bsp = $conn->execute($sql_asistentes);
                    //echo $sql_dt; die;
                    $listaAsistentes = $stmt_bsp ->fetchAll('assoc');

                     $this->loadModel('CalendariosContactos');

              $contactos = $this->CalendariosContactos->find('all')->contain(['Contactos'])
              ->contain(['Contactos'])
              ->where(['CalendariosContactos.calendario_id' => $id])->toArray(); //

              $this->loadModel('Contactos');
              

              //Directo a la BD 
              //var_dump($this->request->data); die;
              $conn = ConnectionManager::get('default');
              //var_dump($idempresa) ; die;
                $sql_contactos = "
                    SELECT 
                      con.id, 
                      con.name 
                    FROM contactos AS con
                    INNER JOIN calendarios_contactos AS c_con ON (con.id <> c_con.contacto_id) AND (con.entidade_id = ".$idempresa.")
                    WHERE  con.active = 1
                    AND con.id NOT IN (SELECT contacto_id FROM calendarios_contactos WHERE con.entidade_id = ". $idempresa ." AND calendario_id = ".$id." )
                    GROUP BY con.id";
       

                      $stmt_bsp = $conn->execute($sql_contactos);
                      
                    //echo $sql_dt; die;
                      $contactosEmpresa = $stmt_bsp ->fetchAll('assoc');

                       $this->loadModel('CalendariosAsistentes');
                    $asistentes = $this->CalendariosAsistentes->find('all')->where(['CalendariosAsistentes.calendario_id' => $id  ])
                    ->contain(['Users'=>'FichaPersonales'])->toArray();

              }else
              {
              return $this->redirect(['controller' => 'Users','action' => 'home']);
      }
       
        $this->set(compact('calendario', 'contactos','contactosEmpresa','asistentes','listaAsistentes'));
        $this->set('_serialize', ['calendario']);
    }

    public function anular(){

       $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        
        

        if($this->request->is('post')){
         $observacion = $this->request->getData('observacion');
         $id = $this->request->getData('idcalendario');
         //var_dump($observacion); die; 

         $id_user = $this->_getUser();
          $rs_user = $this->_getUserFull($id_user);
          $user = $rs_user->name." ".$rs_user->apellido1." ".$rs_user->apellido2;

         if(isset($observacion) && is_numeric($id))
                {
                  $calendario = $this->Calendarios->get($id, ['contain' => []]);

                  if(is_numeric($id)){

                    $rs_active['active'] = 2;
                     $rs_active['observacion'] = $observacion; 
                    $calendario = $this->Calendarios->patchEntity($calendario, $rs_active);

                    if ($this->Calendarios->save($calendario)) {
                      $result = true;
                   $calendario_id  = $calendario->id;
               $this->loadModel('CalendariosAsistentes');
               $this->loadModel('correos');

               
               $asistentes = $this->CalendariosAsistentes->find('all')->where(['CalendariosAsistentes.calendario_id' => $calendario_id  ])
              ->contain(['Users'=>'FichaPersonales'])->toArray();

              $descripcion = "<b>Reunion N°: ".$calendario_id."</b><br><br><b>Enviado por: </b>".$user."<br><br><b>Asunto:</b> ".'Reunion cancelada'."<br><br><b>Descripción</b>: ".$calendario['descripcion'];
              
               foreach ($asistentes as $row ) {
                 

                 $this->correos->enviarcorreo(10, $calendario_id ,$this->_getUserNameAsig($row->user['id']),$this->_getUserEmailAsig($row->user['id']), $descripcion);
                  }


                    $this->Flash->success(__('La reunion se cancelo correctamente.'));

                    //return $this->redirect(['action' => 'index']);
                }else
                {
                  $this->Flash->error(__('Por favor intente nuevamente!.'));
                }

              }
            } 

        }
        
        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
         
    }

    

     public function concretar($id = null){

        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $reunion = $this->Calendarios->newEntity();
        $id_user = $this->_getUser();
          $rs_user = $this->_getUserFull($id_user);
          $user = $rs_user->name." ".$rs_user->apellido1." ".$rs_user->apellido2;
        

        if($this->request->is('post')){
         
            $observacion = $this->request->getData('observacion');
            $id = $this->request->getData('idcalendario');
            //var_dump($id); die;    

            if(isset($observacion)&& is_numeric($id))
                {
                    $calendario = $this->Calendarios->get($id, ['contain' => []]);
                
                if(is_numeric($id)){
                     $rs_active['active'] = 5;
                     $rs_active['observacion'] = $observacion; 
                        $calendario = $this->Calendarios->patchEntity($calendario, $rs_active);
                        if ($this->Calendarios->save($calendario)) {
                            $result = true;
                            $calendario_id  = $calendario->id;
                            $this->loadModel('CalendariosAsistentes');
                             $this->loadModel('correos');

                             
                             $asistentes = $this->CalendariosAsistentes->find('all')->where(['CalendariosAsistentes.calendario_id' => $calendario_id  ])
                            ->contain(['Users'=>'FichaPersonales'])->toArray();

                            $descripcion = "<b>Reunion N°: ".$calendario_id."</b><br><br><b>Enviado por: </b>".$user."<br><br><b>Asunto:</b> ".'Reunion cancelada'."<br><br><b>Descripción</b>: ".$calendario['descripcion'];
                            
                             foreach ($asistentes as $row ) {
                               
                              $this->correos->enviarcorreo(11, $calendario_id ,$this->_getUserNameAsig($row->user['id']),$this->_getUserEmailAsig($row->user['id']), $descripcion);
                                }

                            $this->Flash->success(__('Reunion concretada.'));

                            //return $this->redirect(['action' => 'index']);
                        }else
                        {
                        $debug = 'Errror al concretar la reunion por favor intente de nuevo mas tarde';
                         $this->Flash->error(__( $debug));
                     }
                }
            }
            
        }

        //echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;

    }

    /**
     * Delete method
     *
     * @param string|null $id Calendario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if(is_numeric($id))
        {
            $this->request->allowMethod(['post', 'delete']);
            $calendario = $this->Calendarios->get($id);
            if ($this->Calendarios->delete($calendario)) {
                $this->Flash->success(__('La reunion fue borrada.'));
            } else {
                $this->Flash->error(__('No se pudo borrar la reunion.'));
            }
        }
        

        return $this->redirect(['action' => 'index']);
    }
}
