<?php
    //require_once'../modelos/login.modelo.php';
    //require_once'../index.php';
    class ControladorLogin{
        public function ctrLogin(){
            if (isset($_POST["LoginCorreo"])) {
               // $stmt = ModeloLogin::mdlSeleccionarPreguntas("preguntas");
                //echo '<pre>';print_r($stmt['Pregunta']);echo'</pre>';
               
                $tabla="usuario";
                $tabla2="estado";
                $tabla3="roles";
                $item="correo";
                $RolJefatura=1;
                $RolSecretaria=2;
                $RolDocente=3;
                $valor=$_POST["LoginCorreo"];
                $respuesta = ModeloLogin::mdlSeleccionarRegistros($tabla,$tabla2,$tabla3,$item,$valor);
               
               
                // echo '<pre>';print_r($respuesta);echo'</pre>';
                //  return $respuesta;
                if($respuesta["correo"]==$_POST["LoginCorreo"] &&
                    $respuesta["password"]==$_POST["LoginPwd"]){
                       // echo '<pre>';print_r($respuesta);echo'</pre>';
                       // echo '<div class="alert alert-success">Ingreso Exitoso"</div> ';
                       if ($respuesta["estado"]=="Activo") {
                            if ($respuesta["Id_Rol"]==$RolJefatura) {
                                # code...
                                echo '<script>
                                if (window.history.replaceState) {
                                    window.history.replaceState(null,null,window.location.href);
                                }
                                window.location="jefatura";
                            </script>';
                            }else if ($respuesta["Id_Rol"]==$RolSecretaria) {
                                # code...
                                echo '<script>
                                if (window.history.replaceState) {
                                    window.history.replaceState(null,null,window.location.href);
                                }
                                window.location="secretaria";
                            </script>';
                            }else if ($respuesta["Id_Rol"]==$RolDocente) {
                                # code...
                                echo '<script>
                                if (window.history.replaceState) {
                                    window.history.replaceState(null,null,window.location.href);
                                }
                                window.location="docentes";
                            </script>';
                            }
                       } else{
                            echo '<script>
                                if (window.history.replaceState) {
                                window.history.replaceState(null,null,window.location.href);
                                }
                                </script>';
                            echo '<div class="alert alert-danger"><span>Su usuario no se
                                    encuentra activo.</span>
                                    <span>Favor Comunicarse con el administrador.</span
                                </div>';
                        }

                       
                        
                }else{

                    echo '<script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null,null,window.location.href);
                            }
                        </script>';
                    echo '<div class="alert alert-danger">Error Al ingresar. User y/o password incorrectos</div>';
                }   
            }
        }

        public function ctrPreguntas(){
           $tabla="preguntas";
            $stmt = ModeloLogin::mdlSeleccionarPreguntas($tabla);
            //   echo '<pre>';print_r($stmt);echo'</pre>';
            return $stmt;

        }
    }
?>