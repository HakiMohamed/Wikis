<!DOCTYPE html>
<html lang="en">
    <?php include_once '../app/View/layout/head.php'; ?>
<body>

<form action="?uri=register/register" method="POST">
<!-- <form action="?uri=/register" method="POST"> -->

    <h2>register</h2>
    <div class="form-group firstname">
      <label for="firstname">first_name</label>
      <input type="text" id="firstname" placeholder="First name " name="first_name">
      <small class="error-text"></small>
    </div>

    <div class="form-group lastname">
      <label for="lastname">Last_name</label>
      <input type="text" id="lastname" placeholder="Last name " name="last_name">
      <small class="error-text"></small>
    </div>

    <div class="form-group email">
      <label for="email">Email </label>
      <input type="text" id="email" placeholder="Entere email " name="email">
      <small class="error-text"></small>
    </div>
    <div class="form-group password">
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="entrer password" name="passwordd">
      <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
      <small class="error-text"></small>
    </div>

    <input type="hidden" name="id_role" value="2">

    <div class="form-group submit-btn">
      <input type="submit" value="register">
    </div>
    <p>avez vous un compte
    <a class="btn" href="?uri=/login">login</a>
    
  </p>
  </form>
  
  <script src="./asset/js/authValidation.js"></script>
</body>
</html>