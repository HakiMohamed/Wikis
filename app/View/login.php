<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="./asset/css/authStyle.css">
</head>
<body>
  <form action="?uri=login/index" method="POST">
    <h2>login</h2>
    
    <?php  if(isset($errors)) 


  echo"<div class='alert alert-danger' role='alert'>
 $errors
</div>";

?>



    <div class="form-group email">
      <label for="email">Email </label>
      <input type="text" name="email" id="email" placeholder="Entere email ">
      <small class="error-text"></small>
    </div>
   
    <div class="form-group password">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="entrer password">
      <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
      <small class="error-text"></small>
    </div>
    <div class="form-group submit-btn">
      
      <input type="submit" >
    </div>
    <p>vous avez pas de compte?</p>
      <a href="http://localhost/wikis/register">register</a>
     <p> Ou returner 
    <a class="btn btn-light text-primary" href="http://localhost/wikis/Home">Home</a>
    </p>
  </form>

  <script src="../asset/js/authValidation.js"></script>
</body>
</html>
