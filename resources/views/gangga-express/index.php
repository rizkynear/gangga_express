<!DOCTYPE html>
<html lang="en">
  
  <?php include 'template_head.php' ?>
  
  <body>
    <div class="login-holder">
          
          <div class="col-sm-12 match-height">
            <div class="box-mid-out">
              <div class="box-mid-in">
                <div class="box-login box-shadow text-center">
                  <form action="dashboard.php" method="post">
                    <div> 
                      <img class="login-logo" src="img/logo-default.png" alt="Gangga Express">
                      <h2 class="mb-30"> 
                        <span class="font18 title-main display-xs-block">Admin Login</span>
                      </h2>
                    </div>
                    <div class="form-group">
                      <label class="sr-only">Username</label>
                      <div class="seamless-input-group">
                        <span class="seamless-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Username" required autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="sr-only">Password</label>
                      <div class="seamless-input-group">
                        <span class="seamless-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" placeholder="Password" required>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-standard mt-15">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
    
    <?php include 'template_script.php' ?>
    
  </body>
</html>