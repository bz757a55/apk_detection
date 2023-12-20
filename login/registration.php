<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration | PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
           background: url("images/bg2.jpg") center center fixed;

            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            width: 500px;
            background: rgba(255, 255, 255, 0.2); 
            border-radius: 10px;
            padding: 20px;
            backdrop-filter: blur(6px);
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1, p, label {
            color: whitesmoke;
        }

        input {
            width: 100%;
            max-width: 200px; 
            padding: 10px;
            margin: 0 auto; 
            border: 5px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.8); 
            border-color: cadetblue;
        }

        .signup-button, #login {
            width: 20%;
            max-width: 200px; 
            padding: 10px;
            margin: 10px auto; 
            border: none;
            border-radius: 5px;
            background: black;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

<form action="process.php" method="post" id="registrationForm" class="container">
    <h1>Registration</h1>
    <p>Fill up the form with correct values.</p>
    <hr class="mb-3">
    <label for="firstname"><b>First Name</b></label>
    <input class="form-control" id="firstname" type="text" name="firstname" required>
    <hr class="mb-0">
    <label for="lastname"><b>Last Name</b></label>
    <input class="form-control" id="lastname"  type="text" name="lastname" required>
    <hr class="mb-0">
    <label for="email"><b>Email Address</b></label>
    <input class="form-control" id="email"  type="email" name="email" required>
    <hr class="mb-0">
    <label for="phonenumber"><b>Phone Number</b></label>
    <input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>
    <hr class="mb-0">
    <label for="password"><b>Password</b></label>
    <input class="form-control" id="password"  type="password" name="password" required>
    <hr class="mb-3">
    <button class="btn signup-button" type="submit" id="register" name="create">Sign Up</button>

    
    <a href="login.php" class="btn signup-button" id="login">Log In</a>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#registrationForm').submit(function(e){
            e.preventDefault();

            var valid = this.checkValidity();

            if(valid){
                var firstname   = $('#firstname').val();
                var lastname    = $('#lastname').val();
                var email       = $('#email').val();
                var phonenumber = $('#phonenumber').val();
                var password    = $('#password').val();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {firstname: firstname, lastname: lastname, email: email, phonenumber: phonenumber, password: password},
                    success: function(data){
                        console.log(data);  
                        Swal.fire({
                            'title': 'Successful',
                            'text': data,
                            'type': 'success'
                        }).then(function() {
                            // Redirect to login.php after showing the success message
                            window.location.href = 'login.php';
                        });
                    },
                    error: function(data){
                        console.log(data); 
                        Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors while saving the data.',
                            'type': 'error'
                        });
                    }
                });
            }
        });
    });
</script>

</body>
</html>