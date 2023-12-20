
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login | PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        
        body {
            background: url("images/bg2.jpg") center center fixed; 
            background-size: cover;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.1); 
            border-radius: 10px;
            padding: 20px;
            backdrop-filter: blur(6px); 
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px; 
        }

        h1, p {
            color: #fff;
        }

        label {
            color: #fff;
            margin-bottom: 5px;
            display: block;
        }

        input {
            width: 100%;
            max-width: 200px;
            padding: 10px;
            margin-bottom: 10px; 
            margin: 0 auto; 
            border: 5px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.8);
        }

        .login-button {
           width: 25%; 
           padding: 7px; 
           border: none;
           border-radius: 5px;
           background: black; 
           color: #fff;
           cursor: pointer;
}
        
    </style>
</head>
<body>

<form action="login_process.php" method="post" id="loginForm" class="container">
    <h1>User Login</h1>
    <p>Enter your credentials to log in.</p>
    <hr class="mb-3">
    <label for="email"><b>Email Address</b></label>
    <input class="form-control" id="email" type="email" name="email" required>
    <hr class="mb-0">
    <label for="password"><b>Password</b></label>
    <input class="form-control" id="password" type="password" name="password" required>
    <hr class="mb-3">
    <button class="btn login-button btn-block" type="submit" id="login" name="login">Log In</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#loginForm').submit(function(e){
            e.preventDefault();

            var valid = this.checkValidity();

            if(valid){
                var email    = $('#email').val();
                var password = $('#password').val();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {email: email, password: password},
                    success: function(data){
                        console.log(data);
                        Swal.fire({
                            'title': 'Login Status',
                            'text': data,
                            'type': 'info'
                        }).then(function() {
                                // Redirect to your HTML page
                                window.location.href = './index.html';
                            });


                    },
                    error: function(data){
                        console.log(data);
                        Swal.fire({
                            'title': 'Error',
                            'text': 'There was an error during login.',
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