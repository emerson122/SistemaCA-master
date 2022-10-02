<?php
    
    require_once"conexion.php";
    
    class ModeloLogin{



        /* -------------------------------------------------------------------------- */
        /*                            Sleccionar Registros                            */
        /* -------------------------------------------------------------------------- */

        static public function mdlSeleccionarRegistros($tabla,$tabla2,$tabla3,$item,$valor){

            if($item==null && $valor==null){
            $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");
          
            $stmt->execute();
            return $stmt-> fetchAll();
            }else{
                $stmt= Conexion::conectar()->prepare("  SELECT * FROM $tabla t1 
                JOIN $tabla2 t2 on t2.Id_Estado=t1.Id_Estado
                JOIN $tabla3 t3 on t3.Id_Rol=t1.Id_Rol
                where $item=:$item");
                $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
        
            
                $stmt->execute();
                return $stmt-> fetch();

            }
            $stmt->close();
            $stmt->null;
        }

        static public function mdlSeleccionarPreguntas($tabla){
            $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");
          
            $stmt->execute();
            return $stmt-> fetchAll();
          
            $stmt->close();
            $stmt->null;
        }


        static public function mdlRegistro($tabla,$datos){

           $stmt1= Conexion::conectar()->prepare("INSERT INTO $tabla(correo, password) VALUES
             (:correo, :password)");

            $stmt1->bindParam(":correo",$datos["correo"],PDO::PARAM_STR);
            $stmt1->bindParam(":password",$datos["password"],PDO::PARAM_STR);
             if ($stmt1->execute()) {
                # code...
                return true ;
               $stmt1->close();
                 $stmt1->null;
                
            }
                
            
           
        }

        static public function mdlUsuarioPregunta($tabla,$item,$respuestas,$preguntas){

        /* -------------------------------------------------------------------------- */
        /*              REASIGNAR VALORES DE LAS PREGUNTAS SELLECIONADAS              */
        /* -------------------------------------------------------------------------- */

            $valores=$respuestas;
            $varpre=$preguntas["pregunta1"];
            $varpre2=$preguntas["pregunta2"];
            $varpre3=$preguntas["pregunta3"];
         
        /* -------------------------------------------------------------------------- */
        /*                  LLAMADO DE FUNCIONES PARA SELECCIONAR IDS                 */
        /* -------------------------------------------------------------------------- */

           $idPreSelect=ModeloLogin::mdlSeleccionarIdPregunta($varpre,$item,$respuestas,$preguntas);
           $idPreSelect2=ModeloLogin::mdlSeleccionarIdPregunta2($varpre2,$item,$respuestas,$preguntas);
           $idPreSelect3=ModeloLogin::mdlSeleccionarIdPregunta3($varpre3,$item,$respuestas,$preguntas);
           $idSelect=ModeloLogin::mdlSeleccionarIdUsuario($tabla,$item,$respuestas,$preguntas);
        /* -------------------------------------------------------------------------- */
        /*                  LLAMADO DE FUNCION PARA INSERTAR PREGUNTA-USUARIO   */
        /* -------------------------------------------------------------------------- */
            
           $insertar=ModeloLogin:: mdlInsertarPreguntas( $idPreSelect, $idPreSelect2, $idPreSelect3, $idSelect,$valores);
            
          
            
         }

        static public function mdlInsertarPreguntas( $idPreSelect, $idPreSelect2, $idPreSelect3, $idSelect,$valores){
            $resp=$valores["respuesta1"];
            $resp2=$valores["respuesta2"];
            $resp3=$valores["respuesta3"];

            $stmt2= Conexion::conectar()->prepare("INSERT INTO preguntasusuario(Id_Usuario ,  Id_Pregunta ,  Respuesta ) VALUES
            ($idSelect[0],$idPreSelect[0],'$resp'),
            ($idSelect[0],$idPreSelect2[0],'$resp2'),
            ($idSelect[0],$idPreSelect3[0],'$resp3')")
            ;

            
            if ($stmt2->execute()) {
                # code...
                return true;
                $stmt2->close();
                    $stmt2->null;
                
            }
        
        }

        static public function mdlSeleccionarIdPregunta($varpre,$item,$respuestas,$preguntas){
           
            $pregunta= Conexion::conectar()->prepare("SELECT Id_Pregunta FROM preguntas where Pregunta='$varpre'");
            $pregunta->execute();
            return $pregunta-> fetch();
            $pregunta->close();
            $pregunta->null;
          
        }

        static public function mdlSeleccionarIdPregunta2($varpre,$item,$respuestas,$preguntas){
      
            $pregunta= Conexion::conectar()->prepare("SELECT Id_Pregunta FROM preguntas where Pregunta='$varpre'");
            $pregunta->execute();
            return $pregunta-> fetch();
            $pregunta->close();
            $pregunta->null;
       
        }

        static public function mdlSeleccionarIdPregunta3($varpre,$item,$respuestas,$preguntas){
        
            $pregunta= Conexion::conectar()->prepare("SELECT Id_Pregunta FROM preguntas where Pregunta='$varpre'");
            $pregunta->execute();
            return $pregunta-> fetch();
            $pregunta->close();
            $pregunta->null;
     
        }

        static public function mdlSeleccionarIdUsuario($tabla,$item,$respuestas,$preguntas){
            $var=$_SESSION["email"];
            $id= Conexion::conectar()->prepare("SELECT Id_Usuario FROM $tabla where $item='$var'");
           
            $id->execute();
             return $id-> fetch();
             echo '<pre>';print_r($id);echo'</pre>';
             $id->close();
             $id->null;
        }
    }

?>