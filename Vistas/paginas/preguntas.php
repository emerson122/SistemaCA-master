<?php 
$preguntas = ControladorLogin::ctrPreguntas();

//echo $preguntas;?>



<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="post">

        <?php for($i=1;$i<4;$i++):?>
        <div class="py-2">
            <?php
                if ($i==1){
                    $nameSelect="cmbPeliculas1";
                    $nameInput="Respuesta1";
                }elseif ($i==2){
                    $nameSelect="cmbPeliculas2";
                    $nameInput="Respuesta2";
                }else{
                    $nameSelect="cmbPeliculas3";
                    $nameInput="Respuesta3";
                }

            ?>
            <select name=<?php echo $nameSelect ;?>  id="cmbP" class="form-control" style=" text-align-last: center;">
                <option value=""><?php echo "----PREGUNTA ".$i."----";?>
                </option>
                <?php foreach ($preguntas as $key => $value): 
                           // id=<?php echo"Q".($key+1);?>
<!--value=<?php// echo $value["Pregunta"];?>-->
                <option  >
                    <?php echo $value["Pregunta"];?>
                </option>



                <?php endforeach ?>
            </select>
           
            <input name=<?php echo $nameInput;?> type="text" class="form-control" placeholder=<?php echo "Respuesta";?>
                id="respuesta">
        </div>
        <?php endfor?>
        <?php 
$registro = ControladorLogin::ctrUsuarioPreguntas(null);

//echo $preguntas;?>
        <button type="submit" class="btn btn-primary">ACEPTAR</button>

    </form>
    <?php
   if (isset($_POST["cmbPeliculas1"])){
    for($i=1;$i<=3;$i++){
        if ($i==1){
            $nameSelect="cmbPeliculas1";
            $nameInput="Respuesta1";
        }elseif ($i==2){
            $nameSelect="cmbPeliculas2";
            $nameInput="Respuesta2";
        }else{
            $nameSelect="cmbPeliculas3";
            $nameInput="Respuesta3";
        }
   
    }
   }
    ?>
</div>
<script src="./vistas/myapp.js"></script>
