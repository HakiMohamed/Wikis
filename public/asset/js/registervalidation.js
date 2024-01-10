document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action="?uri=register/register"]');
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
        field.classList.add('invalid');
      } else {
        errorField.textContent = '';
        field.classList.remove('invalid');
        field.classList.add('valid');
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
      if (form.querySelector('.invalid')) {
        submitButton.setAttribute('disabled', 'true');
      } else {
        submitButton.removeAttribute('disabled');
      }
    }
  });