<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paises Controller
 *
 * @property \App\Model\Table\PaisesTable $Paises
 */
class UploadsController extends AppController
{

    /**
     * Index method
     *
     * @retorna cabeceras de descarga de un archivo pasado por parámetro. La carpeta indicaría donde hay que buscar ese archivo. 
     */
    public function descarga()
    {			
			//Recibimos los parámetros por GET
			$parametros = ($this->request->params['pass']);			
			$carpeta = $parametros[0];	
			$nombreFichero = $parametros[1];		
			$file_path = ROOT.DS.'downloads'.DS.$carpeta.DS.$nombreFichero;
			$this->response->file($file_path, array(
				'download' => true,
				'name' => $nombreFichero,
			));
			return $this->response;
	} 

	/**
     * Upload method
     *
     * @retorna true o false en el caso de que suba un archivo pasado por parametro y retorna el nombre del archivo físico. 
     */
    public function subidaArchivo($idTicket,$tipoArchivo, $archivo)
    {							
			//CARPETAS TIPOS DE ARCHIVOS
    		$rs_archive = array();
			$extension = strtolower($this->obtieneExtension($archivo['name']));
			switch ($tipoArchivo) {
				case 'adjunto_ticket': $carpeta = 'ticket'; $nombreFichero = 'ticket-'.$idTicket.'.'.$extension; 
				break;
				case 'adjunto_gestion': $carpeta = 'ticket'; $nombreFichero = 'gestion-'.$idTicket.'.'.$extension; 
				break;
				case 'adjunto_bsp': $carpeta = 'bsp'; $nombreFichero = 'bsp-'.$archivo["name"]; 
				break;
			}
			$file_path = ROOT.DS.'downloads'.DS.$carpeta.DS.$nombreFichero;
			try {
				if (move_uploaded_file($archivo["tmp_name"], $file_path)) {
					$rs_archive['name_file']  = $nombreFichero;
					$rs_archive['path_file']  = $file_path;
					return $rs_archive;
				} else {
					return false; 
				}
			} catch (Exception $e) {
				echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			}		
			
			
	}
	
	/**
     * compruebaFichero method
     *
     * @retorna true o false en caso de que el archivo cumpla las condicionse de formato, tamaño etc... 
     */	
	public function compruebaFichero($archivo){
			//Condiciones
			$extensionesPermitidas = array('jpg', 'jpeg', 'png', 'pdf', 'xls','xlsx', 'doc','docx', 'msg');
			$tamanoMaximo = '5072000';
			$mimePermitidos = array('image/jpeg', 'application/pdf','image/png');
			
			$extension = strtolower($this->obtieneExtension($archivo['name']));			
			//Comprobaciones
			if (empty($archivo)){
				return array(false, 'Error archivo vacío');
			}
			if ($archivo['size'] > $tamanoMaximo){
				return array(false, 'Tamaño de archivo excedido');
			}
			/*if (!in_array($archivo['type'], $mimePermitidos)){
				return array(false, 'El archivo no está dentro de los tipos permidos');
			}*/
			if (!in_array($extension, $extensionesPermitidas)){
				return array(false, 'La extensión del archivo no está entre las permitidas ('.$extension.')');
			}
			return array(true, 'Archivo correcto');			
	}
	
	//Obtiene la extension del nombre de un archivo pasado por parametro //Quizás haya que comprobar archivos con varios puntos.
	private function obtieneExtension($nombreArchivo){
		$array = explode('.', $nombreArchivo);		
		$extension = end($array);
		return $extension;		
	}
}