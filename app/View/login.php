<!DOCTYPE html>
<html lang="en">
    <?php include_once '../app/View/layout/head.php'; ?>
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
    <p>sign up 
      <a href="?uri=/register">register</a>
    </p>
  </form>

  <script src="../asset/js/authValidation.js"></script>
</body>
</html>
