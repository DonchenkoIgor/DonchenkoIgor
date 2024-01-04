<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <title>Form</title>
</head>
<body>
      <div class="container mt-4">
          <?php
          var_dump($_POST);
          ?>
          <br><br>
          <?php if(!empty($_POST)) : ?>
              <div class="alert alert-success" role="alert">
              <?php
                   $email = $_POST['email'];
                    if(strlen(trim($email)) <= 3)
                       echo 'Такого email не існує';
                       else{
              echo 'Ви намагались залогінитись з'. ' '. $_POST['email'];
              }  ?>
          </div>
          <?php endif; ?>
          <form  method="post">
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input
                      type="email"
                      class="form-control"
                      name="email"
                  >
              </div>
              <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input
                      type="password"
                      class="form-control"
                      name="password"
                  >
              </div>
              <button type="submit" class="btn btn-primary">Sign up</button>
          </form>
      </div>
</body>
</html>
