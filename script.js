$(document).ready(function(){
    
    // Hide the signup form on page load
    $('#logInForm').show();

    // When the user clicks on <span> (x), close the SignUp Form
    $('.close').click(function(){
    $('#signup-form').hide();
});

    // When the user clicks anywhere outside of the SignUp or LogIn Form, close them
    $(window).click(function(event){
        if(event.target.id == "signup-form"){
            $('#signup-form').hide();
        }
        else if(event.target.id == "logInForm"){
            $('#logInForm').hide();
        }
    });

    // Handle click event for signup link
    $('#signUp-link').click(function(event){
    event.preventDefault(); // Prevent default link behavior
    $('#signup-form').show(); // Show the signup form
    $('#logInForm').hide(); // Hide the login form
});

    // Handle click event for login link
    $('#logIn-link').click(function(event){
    event.preventDefault(); // Prevent default link behavior
    $('#logInForm').show(); // Show the login form
    $('#signup-form').hide(); // Hide the signup form
});

    // Handle click event for signup link inside the login form
    $('#signUp-link2').click(function(event){
    event.preventDefault(); // Prevent default link behavior
    $('#signup-form').show(); // Show the signup form
    $('#logInForm').hide(); // Hide the login form
});

    // Handle click event for cancel button
    $('.cancelBtn').click(function(){
    $('#signup-form').hide();
});

    // Password toggle functionality
    $('#showPass').click(function (){
        var passwordInput = $('#password');
        var passwordFieldType = passwordInput.attr('type');
        var showPass = $('#showPass');

        if(passwordFieldType == 'password'){
            passwordInput.attr('type', 'text');
            showPass.text('Hide');
        }

        else{
            passwordInput.attr('type', 'password');
            showPass.text('Show');
        }
    });

    $('#showConfirmPass').click(function (){
        var confirmPasswordInput = $('#confirm-password-input');
        var confirmPasswordFieldType = confirmPasswordInput.attr('type');
        var showConfirmPass = $('#showConfirmPass');

        if(confirmPasswordFieldType == 'password'){
            confirmPasswordInput.attr('type', 'text');
            showConfirmPass.text('Hide');
        }

        else{
            confirmPasswordInput.attr('type', 'password');
            showConfirmPass.text('Show');
        }
    });


    // Password toggle functionality
    $('#logInShowPass').click(function (){
        var logInPassInput = $('#logInPass');
        var passwordFieldType = logInPassInput.attr('type');
        var logInShowPass = $('#logInShowPass');

        if(passwordFieldType == 'password'){
            logInPassInput.attr('type', 'text');
            logInShowPass.text('Hide');
        }
        else{
            logInPassInput.attr('type', 'password');
            logInShowPass.text('Show');
        }
    });

    // Handle click event for login button
    $('#userLogin').click(function(e){
    e.preventDefault(); // Prevent form from submitting
        });
    });




// CHECK THE INPUT OF THE USER IN PASSWORD
function checkForm(){
    var firstName = document.querySelector('#FName').value;
    var lastName = document.querySelector('#LName').value;
    var email = document.querySelector('#email').value;
    var password = document.querySelector('#password').value;
    var confirmPassword = document.querySelector('#confirm-password-input').value;

    // Check if first name or last name contain numbers
    var regex = /\d/;
    if(regex.test(firstName) || regex.test(lastName)){
        document.querySelector('#err-msg').textContent = 'Names cannot contain numeric values';
        return false;
    }else{
        document.querySelector('#err-msg').textContent = '';
    }

    // Submit form if all validations pass
    return true;
}

// CHECK THE STRENGTH OF THE PASSWORD
function checkPassword(){
    var password = document.querySelector('#password').value;
    var passReqLength = document.querySelector('#passReqLength');
    var passReqLower = document.querySelector('#passReqLower');
    var passReqUpper = document.querySelector('#passReqUpper');
    var passReqNumber = document.querySelector('#passReqNumber');
    var passReqSpecial = document.querySelector('#passReqSpecial');
    var passwordStrength = document.querySelector('#password-strength');

    // Check password length
    if(password.length >= 8){
        passReqLength.style.color = 'green';
    }else{
        passReqLength.style.color = 'red';
    }

    // Check for lowercase letter
    if(/[a-z]/.test(password)){
        passReqLower.style.color = 'green';
    }else{
        passReqLower.style.color = 'red';
    }

    // Check for uppercase letter
    if(/[A-Z]/.test(password)){
        passReqUpper.style.color = 'green';
    }else{
        passReqUpper.style.color = 'red';
    }

    // Check for number
    if(/[0-9]/.test(password)){
        passReqNumber.style.color = 'green';
    }else{
        passReqNumber.style.color = 'red';
    }

    // Check for special character
    if(/[@#$%^&+=]/.test(password)){
        passReqSpecial.style.color = 'green';
    }else{
        passReqSpecial.style.color = 'red';
    }

    // Calculate password strength score
    var strengthScore = 0;

    if(password.length >= 8){
        strengthScore++;
    }
    if(/[a-z]/.test(password)){
        strengthScore++;
    }
    if(/[A-Z]/.test(password)){
        strengthScore++;
    }
    if(/[0-9]/.test(password)){
        strengthScore++;
    }
    if(/[@#$%^&+=]/.test(password)){
        strengthScore++;
    }

    // Set password strength indicator
    if(strengthScore == 0){
        passwordStrength.style.width = '0';
        passwordStrength.style.height = '0';
        passwordStrength.style.backgroundColor = 'white';
        passwordStrength.style.color = 'WHITE';
    }else if(strengthScore == 1){
        passwordStrength.style.width = '20%';
        passwordStrength.style.height = '20%';
        passwordStrength.style.backgroundColor = '#A91B0D';
        passwordStrength.textContent = 'Weak';
        passwordStrength.style.padding = '.5rem';
        passwordStrength.style.color = 'WHITE';
    }else if(strengthScore == 2){
        passwordStrength.style.width = '40%';
        passwordStrength.style.backgroundColor = '#ff9900';
        passwordStrength.textContent = 'Fair';
        passwordStrength.style.padding = '.5rem';
        passwordStrength.style.color = 'WHITE';
    }else if(strengthScore == 3){
        passwordStrength.style.width = '60%';
        passwordStrength.style.backgroundColor = '#FFEA61';
        passwordStrength.textContent = 'Moderate';
        passwordStrength.style.padding = '.5rem';
        passwordStrength.style.color = 'BLACK';
    }else if(strengthScore == 4){
        passwordStrength.style.width = '80%';
        passwordStrength.style.backgroundColor = '#FFEA61';
        passwordStrength.textContent = ' Moderate';
        passwordStrength.style.padding = '.5rem';
        passwordStrength.style.color = 'BLACK';
    }else if(strengthScore == 5){
        passwordStrength.style.width = '100%';
        passwordStrength.style.backgroundColor = '#028A0F';
        passwordStrength.textContent = 'Very Strong';
        passwordStrength.style.padding = '.5rem';
        passwordStrength.style.color = 'WHITE';
    }
}

// CHECK IF THE PASSWORD AND CONFIRM PASSWORD ARE THE SAME
function checkPasswordMatch(){
    var password = document.querySelector('#password').value;
    var confirmPassword = document.querySelector('#confirm-password-input').value;
    var passwordMatchMsg = document.querySelector('#password-match-msg');

    if(!password || !confirmPassword){
        // if either password field or confirm password field is empty
        passwordMatchMsg.textContent = '';
        passwordMatchMsg.style.color = '';
        return;
    }
    else if(password !== confirmPassword){
        passwordMatchMsg.textContent = 'Passwords do not match';
        passwordMatchMsg.style.color = 'red';
    } 
    else{
        passwordMatchMsg.textContent = 'Passwords match';
        passwordMatchMsg.style.color = 'green';
    }
}