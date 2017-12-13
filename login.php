<!DOCTYPE html>
<html>
   <head>
      <title>Quản Lí Phòng Ban </title> 
      <link rel="stylesheet" href="styles/css/bootstrap.min.css">
      <link rel="stylesheet" href="styles/css/styles.css">
   </head>
   <body>
    <div class="container">
      <form 
        method="POST"
        class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>

        <div class="form-group row">
          <label for="inputUserName" class="col-sm-2 col-form-label">User name: </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputUserName" required="" placeholder="Username">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password: </label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" required="" placeholder="Password">
          </div>
        </div>

        <button class="btn btn-primary " type="submit">Sign in</button>
      </form>

    </div>
  </body>
</html>