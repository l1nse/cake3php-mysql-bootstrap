<?php
namespace DatabaseCon;

class DatabaseCon{
    private static $instancia;
    private static $link;
    private static $linktmp;
    private static $dns ='';
    private static $host = '';
    private static $database = '';
    private static $username = '';
    private static $password = '';
    private static $connected = false;
    private static $lasterror = 100;
    const SECURITYKEY = '5ecur1tyPa$$w0rdx_';
    private static $sp;
    const DB_CONN_NOK = 100;
    const DB_CONN_NOK_DESCRIPTION = 'No conectado';
    const DB_CONN_OK = 101;
    const DB_CONN_OK_DESCRIPTION = 'Conexi�n correcta';
    const DB_CONN_ERROR_LOGIN = 102;
    const DB_CONN_ERROR_LOGIN_DESCRIPTION = 'Error de inicio de sesi�n (Usuario y/o contrase�a incorrecta)';
    const DB_CONN_ERROR_DB = 103;
    const DB_CONN_ERROR_DB_DESCRIPTION = 'Error de seleccion de base de datos (Base de datos inexistente)';

    /**
     * Database::__construct()
     * 
     * @param mixed $host: Servidor Host de Ms SQL Server
     * @param mixed $database: Nombre de la base de datos a conectarse
     * @param mixed $username: Nombre de usuario utilizado para conectarse
     * @param mixed $password: Contrase�a del usuario de conecci�n
     * @return void
     */
     
    public function __construct(){
    	self::$dns = 'SOFTLANDPC';
        self::$host = '192.168.168.210';
        self::$database = '1TRAVEL';
        self::$username = 'sa';
        self::$password = 'Mitani0510';				
        if (!self::isConnected()){
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }
    }
    /**
     * Database::doConnect() Funci�n encargada de realizar la conexi�n al motor de base de datos
     * 
     * @return Ultimo error producido o constante DB_CONN_OK si se realizo correctamente
     */
    protected function doConnect(){
        putenv('TDSVER=8.0');
        if (self::$host != '' && self::$database != '' && self::$username != '' && self::$password != ''){	
        	self::$link = mssql_connect(self::$host, self::$username, self::$password)or die("no se puede conectar a SQL Server por");
            mssql_select_db(self::$database,self::$link);
            
            if (self::$link){
                self::$lasterror = self::DB_CONN_OK;
                self::$connected=true;
                
            }else{
                self::$lasterror = self::DB_CONN_ERROR_LOGIN;
                self::$connected=false;
            }
        }else{
            self::$lasterror = self::DB_CONN_NOK;
            self::$connected=false;
        }
        return self::$lasterror;
    }
    static function doCheckConnection($username, $password){
    	if($username == "" || $password =="") return false;    	
    	try{
			self::$linktmp = mssql_connect(DBCONFIG_TRX_HOSTNAME, $username, self::SECURITYKEY.$password);
			if(self::$linktmp){
				mssql_close(self::$linktmp);
				return true;
			}
			mssql_close(self::$linktmp);
			return false;
		}catch(Exception $e){
			return false;
		}		
    } 
    /**
     * Database::doDisconnect()
     * 
     * @return
     */
    protected function doDisconnect(){
        mssql_close(self::$link);
    }
    /**
     * Database::isConnected()
     * 
     * @return
     */
    protected function isConnected(){
        return self::$connected;
    }
    /**
     * Database::getLastError()
     * 
     * @return
     */
    protected function getLastError(){
        return self::$lasterror;
    }
    /**
     * Database::getLastErrorDescription()
     * 
     * @return
     */
    public function getLastErrorDescription(){
        $err = '';
        switch (self::$lasterror){
            case self::DB_CONN_NOK:
                $err = self::DB_CONN_NOK_DESCRIPTION;
                break;
            case self::DB_CONN_OK:
                $err = self::DB_CONN_OK_DESCRIPTION;
                break;
            case self::DB_CONN_ERROR_LOGIN:
                $err = self::DB_CONN_ERROR_LOGIN_DESCRIPTION;
                break;
            case self::DB_CONN_ERROR_DB:
                $err = self::DB_CONN_ERROR_DB_DESCRIPTION;
                break;
            default:
                $err = self::DB_CONN_NOK_DESCRIPTION;
                break;
        }
        return $err;
    }
    public function doQuery($sql, $params = array()){
        $data = array();
        if (!self::isConnected()){
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }
        if(self::isConnected()){
	        $rs = mssql_query($sql,self::$link);
	        if (!is_bool($rs) && ! mssql_num_rows($rs) || mssql_num_rows($rs) == 0){
	            return false;
	        }else{
	            while ($row = mssql_fetch_array($rs)){
	                array_push($data, $row);
	            }
	            return $data;
	        }
	        mssql_result($rs);
        }else{
        	return false;
        }
    }
    
     
	
	
    public function doExecute($sql, $params = array()){
    	if (!self::isConnected()){
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }        
		if(self::$link){
	        mssql_query($sql,self::$link);
   		}
    }
    public function StoreOpen($sp_name){
    	if (!self::isConnected()){
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }
        if ($sp_name != ''){
            self::$sp = mssql_init($sp_name, self::$link);
        }
    }
    public function StoreAddParam($param_name, $param_type, $param_maxlenght, $param_value = 0, $param_isoutput = false, $param_isnull = false)
    {
    	if (!self::isConnected()){
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }        
        switch(strtolower($param_type)){
        	case "varchar":
        		$param_type = SQLVARCHAR; break;
       		case "text":
        		$param_type = SQLTEXT; break;
       		case "char":
        		$param_type = SQLCHAR; break;
       		case "int":
        		$param_type = SQLINT4; break;
       		case "float":
        		$param_type = SQLFLT4; break;
        	default:
        		$param_type = SQLVARCHAR; break;
        }        
        if (self::$sp){
            mssql_bind(self::$sp, $param_name, stripslashes(iconv("UTF-8","Latin1", $param_value)), $param_type, $param_isoutput, $param_isnull, $param_maxlenght);
        }
    }
    public function StoreExecute(){
    	if (!self::isConnected()){
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }
        $results = false;
        if (self::$sp){
            $results = mssql_execute(self::$sp);            
            mssql_free_result(self::$sp);
        }
        return $results;
    }
    public static function getInstance(){
        if (!self::$instancia instanceof self){
            self::$instancia = new self;
        }
        return self::$instancia;
    }
}
?>