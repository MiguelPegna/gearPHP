<?php
    namespace core;
    use core\DB_Connections;
    use PDO, PDOException;

    class Statements{

        //return just an record
        public static function select_one(string $query){
            $attach = DB_Connections::PDO_Mysql();
            $result = $attach->prepare($query);
            try{
                $result->execute();
            }catch(PDOException $e){
                return null;
            }
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //return many records
        public static function select_all(string $query){
            $attach = DB_Connections::PDO_Mysql();
            $result = $attach->prepare($query);
            try{
                $result->execute();
            }catch(PDOException $e){
                return null;
            }
            $data = $result->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }

        //insert records
        public static function insert(string $query, array $values){
            $attach = DB_Connections::PDO_Mysql();
            $insert = $attach->prepare($query);
            foreach($values as $key => $value){
                if($key >0){
                    $insert->bindParam(":".$key, $values[$key], PDO::PARAM_STR);
                }
            }
            try{
                $satisfy = $insert->execute($values);
                if($satisfy){
                    $lastInsert = $attach->lastInsertId();
                }
                else{
                    $lastInsert = null;
                }
            }catch(PDOException $e){
                return null;
            }
            //return the last add id record to DB for inmediaty use
            return $lastInsert;
        }

        //update records
        public static function update(string $query, array $values){
            $attach = DB_Connections::PDO_Mysql();
            $update = $attach->prepare($query);
            $satisfy = $update->execute($values);
            return $satisfy;
        }

        //drop records
        public function delete(string $query){
            $attach = DB_Connections::PDO_Mysql();
            $result = $attach->prepare($query);
            $drop = $result->execute();
            return $drop;
        }

    }//end class