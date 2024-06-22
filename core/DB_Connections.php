<?php

    namespace core;
    use Exception;
    use PDO;

    class DB_Connections{

        public function __construct(){
            $this->PDO_Mysql();
        }

        public static function PDO_Mysql(){
            $PDO_String = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;

            try{
                $plug = new PDO($PDO_String, DB_USER, DB_PASS);
			    $plug->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $plug->exec('set names utf8mb4');
                //echo 'Flipa en colores bien mogollón a todo gas chaval.. se ha hecho la conexión';
            }
            catch (Exception $e){
                $plug = 'Error vale verdi la vida mejor matate';
                echo "ERROR: ". $e->getMessage();
            }
            return $plug;
        }

        public static function PDO_PostgreSQL(){
            $PDO_String = "pgsql:host=".DB_HOST." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASS;
            try{
                $plug = new PDO($PDO_String);
                $plug->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo 'Conexión exitosa a PostgreSQL';
            }
            catch (Exception $e){
                $plug = 'Error ';
                echo "ERROR: ". $e->getMessage();
            }
            return $plug;
        }

        public static function PDO_SQLSrv(){
            $PDO_String = "sqlsrv:Server=".DB_HOST.";Database=".DB_NAME;
            try{
                $plug = new PDO($PDO_String, DB_USER, DB_PASS);
                $plug->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo 'Conexión exitosa a SQL Server';
            }
            catch (Exception $e){
                $plug = 'Error ';
                echo "ERROR: ". $e->getMessage();
            }
            return $plug;
        }


    }


