<?php 
    //  $registro = ControladorLogin::ctrRegistro();
    //  $registro = ControladorLogin::ctrUsuarioPreguntas(null);
?>

<div class="d-flex justify-content-center text-center">
    <div class="Registro ">


        <img class="avatar" src="Vistas/img/logo.jpg" alt="">


        <form method="post">
            <div class="form-group">
                <div class="input-group-prepend">
                    <i class="fas fa-user icon"></i>
                    <input name="rNombre" class="form-control" type="text" placeholder="Nombre Completo del Usuario">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group-prepend">
                    <i class="fas fa-lock icon"></i>
                    <input name="rPwd" class="form-control" id="contrasenna" type="password"
                        placeholder="Contraseña" onkeyup="javascript:validar_form();">
                </div>

                <div class="nivelSeguridad text-center">
               
                    <div id="SeguridadContras" ><!--class="nivelesColores"-->
                        <div class="spanNivelesColores"></div>
                    </div>

                   <!-- <div class="NivelesColores"></div>-->

                </div>
            </div>


            <div class="form-group">
                <div class="input-group-prepend">
                    <i class="fas fa-lock icon"></i>
                    <input id="ConfirmarContra"class="form-control" type="password" placeholder="Ingresa de nuevo la Contraseña">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group-prepend">
                    <i class="fas fa-envelope-square icon"></i>
                    <input name="rEmail" class="form-control" type="email" placeholder="Correo Electrónico">

                </div>
            </div>
            
<!--href="index.php?ruta=preguntas"--> 
           
                 <input type="submit" value="Regístrate">
            <p>¿Ya tienes una cuenta? <a class="link" href="\login.php">Iniciar Sesion</a> </p>

            <input type="button" id="validar" onclick="javascript:validar_form();" value="Validar"/>
        </form>
    </div>
</div>







<script language="javascript" type="text/javascript">
		function validar_form()
		{
           
            
            
            var target = document.getElementById('SeguridadContras');
            
            var texto = document.getElementById('SeguridadContra');
            var contrasenna = document.getElementById('contrasenna').value;
			if(validar_clave(contrasenna) == true)
			{
                target.className="alert alert-success";
                target.innerText="Contraseña Válida";
			}
			else
			{ 
          

                target.className= "alert alert-danger";
                target.innerText="Contraseña debe contener Mayuscula, minuscula y número";
                            
			}
/*
            var ConfirmarContra = document.getElementById('ConfirmarContra').value; 

            if(ConfirmarContra!=contrasenna){
                alert("error");
            }*/
		}
		function validar_clave(contrasenna)
		{
			if(contrasenna.length >= 8)
			{		
				var mayuscula = false;
				var minuscula = false;
				var numero = false;
				var caracter_raro = false;
				
				for(var i = 0;i<contrasenna.length;i++)
				{
					if(contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90)
					{
						mayuscula = true;
					}
					else if(contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122)
					{
						minuscula = true;
					}
					else if(contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57)
					{
						numero = true;
					}
					else
					{
						caracter_raro = true;
					}
				}
				if(mayuscula == true && minuscula == true && caracter_raro == true && numero == true)
				{
					return true;
				}
			}
			return false;
		}
		</script>