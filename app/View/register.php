<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title> 
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="./asset/css/authStyle.css">
</head>
<body>

<form action="?uri=register/index" method="POST" enctype="multipart/form-data">

    <h2 style="color:#1BB295;">register</h2>
<?php  if(isset($errors)) 

foreach($errors as $error){
  echo"<div class='alert alert-danger' role='alert'>
 $error
</div>";
}

?>

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
    <div class="form-group image">
      <label for="profilPic">Profile picture(optional)</label>
      <input type="file" name="profilPic" id="profilPic">
      <small class="error-text"></small>
    </div>
    <div class="form-group password">
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="entrer password" name="passwordd">
      <small class="error-text"></small>
    </div>

    <div class="form-group Confirmepassword">
      <label for="Confirmepassword">Confirme Password</label>
      <input type="password" id="Confirmepassword" placeholder="Confirme password" name="Confirmepassword">
      <small class="error-text"></small>
    </div>

    <input type="hidden" name="role" value="auteur">

    <div class="form-group submit-btn">
      <input type="submit" value="register">
    </div>
    <p>avez vous un compte
    <a class="btn btn-light text-primary" href="?uri=/login">login</a>
    
  </p>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  
  <script> document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitButton = form.querySelector('input[type="submit"]');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      validateForm();
    });

    
  
    const inputFields = form.querySelectorAll('input[type="text"], input[type="password"]');
    inputFields.forEach(function(inputField) {
      inputField.addEventListener('keyup', function() {
        validateField(inputField);
        toggleSubmitButtonState();
      });
    });
  
    const passwordFields = form.querySelectorAll('input[type="password"]');
    passwordFields.forEach(function(passwordField) {
      passwordField.addEventListener('keyup', function() {
        validatePasswordMatch();
        toggleSubmitButtonState();
      });
    });
  
    const emailField = document.getElementById('email');
    emailField.addEventListener('keyup', function() {
      validateEmail();
      toggleSubmitButtonState();
    });
  
    function validateForm() {
      inputFields.forEach(function(inputField) {
        validateField(inputField);
      });
      validatePasswordMatch();
      validateEmail();
      toggleSubmitButtonState();
  
      if (!form.querySelector('.error-text:not(:empty)')) {
        form.submit();
      }
    }
  
    function validateField(field) {
      const errorField = field.parentElement.querySelector('.error-text');
      if (field.value.trim() === '') {
        errorField.textContent = 'This field is required';
        
      } else {
        errorField.textContent = '';
  
      }
    }
  
    function validatePasswordMatch() {
      const password = document.getElementById('password').value.trim();
      const confirmPassword = document.getElementById('Confirmepassword').value.trim();
      const confirmPasswordError = document.querySelector('.form-group.Confirmepassword .error-text');
      
      const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  
      if (password !== confirmPassword) {
        confirmPasswordError.textContent = 'Passwords do not match';
      } else if (!passwordRegex.test(password)) {
        confirmPasswordError.textContent = 'Password must contain at least 8 characters, one uppercase, one lowercase, one number, and one special character';
      } else {
        confirmPasswordError.textContent = '';
      }
    }
  
    function validateEmail() {
      const emailField = document.getElementById('email');
      const email = emailField.value.trim();
      const emailError = emailField.parentElement.querySelector('.error-text');
      const emailRegex = /^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/;
  
      if (!emailRegex.test(email)) {
        emailError.textContent = 'Please enter a valid email address';
      
      } else {
        emailError.textContent = '';
        
      }

    }
  
    function toggleSubmitButtonState() {
  const isValid = !form.querySelector('.error-text:not(:empty)');
  if (isValid) {
    submitButton.removeAttribute('disabled');
  } else {
    submitButton.setAttribute('disabled', 'true');
  }
}
  });</script>
</body>
</html>