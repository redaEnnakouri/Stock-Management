<?php 
session_start();
ob_start() ;?>

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600"
	rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/style.css">

<link rel="icon" href="Favicon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<title>Gestion de Stock</title>

<link rel="stylesheet" href="css/LoginCss.css">
<style type="text/css">
</style>
</head>
<body>

<form method="POST">
	<main class="login-form">
	<div class="cotainer">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header" style="float: left">
						<div style="float: left;">Gestion de Stock :</div>
						
					</div>
                    
                    
                    <?php
                    include_once 'conx.php';

                    if (isset($_POST["submit"])) {
                        $_SESSION["user"] = $_POST['user'];
                        $_SESSION["pass"] = $_POST['pass'];
                        $_SESSION["last_time"] = time();

                        {

                            if (($_POST['user'] == "john") && ($_POST['pass'] == "john")) {
                                    header('location:FR/superviseur.php');
                               
                            } else if (! empty($_POST['user']) && ! empty($_POST['pass'])) {
                                $user = $_POST['user'];
                                $pass = $_POST['pass'];
                                // selecting on database
                                $query = "select * from compte where user='$user' and passe='$pass'";
                                $result = mysqli_query($conn, $query);
                                $numrow = mysqli_num_rows($result);

                                if ($numrow != 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $username = $row['user'];
                                        $password = $row['passe'];
                                    }
                                    if ($user == $username && $pass == $password) {
                                        // redirect browser
                                        header("location:FR/Accueil.php?user=$user");
                                    } else {
                                        echo "<div style='color: white;width: 100%;background: red;padding-left: 166px;'>
    </div>";
                                    }
                                } else {
                                    echo "<div style='color: white;width: 100%;padding: 10px;padding-left: 10px;background: #feb58be6;padding-left: 166px;'>
            
Invalide Username or Password</div>";
                                }
                            }
                        }
                    }

                    ?><div class="card-body" id="t">

						
							<div class="form-group row">
								<label for="email_address"
									class="col-md-4 col-form-label text-md-right">Nom d'utilisateur</label>
								<div class="col-md-6">
									<input type="text" id="email_address" name="user"
										class="form-control" name="email-address" placeholder="Nom d'utilisateur" required autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label for="password"
									class="col-md-4 col-form-label text-md-right">Mot de Passe</label>
								<div class="col-md-6">
									<input type="password" id="password" placeholder="Mot de Passe" class="form-control"
										name="pass" required>
								</div>
							</div>



							<div class="col-md-6 offset-md-4">

								<input type="submit" name="submit" class="btn btn-primary"
									value="Connexion">
						
						</form>
						</form>
					</div>

				</div>

			</div>
		</div>
	</div>
	</div>
	</div>

	</main>






</body>
</html>