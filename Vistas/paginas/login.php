

<h1 class="text-center">LOGIN</h1>

<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="email">Email address:</label>

            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                    <input name="LoginCorreo" type="email" class="form-control" placeholder="Enter email" id="email">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="pwd">Password:</label>

            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input name="LoginPwd" type="password" class="form-control" placeholder="Enter password" id="pwd">
                </div>
            </div>
        </div>

        <?php
           
           $ingreso = new ControladorLogin;
           $ingreso -> ctrLogin();
           
       ?>
        <button type="submit" class="btn btn-primary">LOGIN</button>

    </form>
</div>

