<?php
  session_start();

  require_once 'classes/Membership.php';

  $membership = New Membership();

  //Log out request
  if(isset($_GET['status']) && $_GET['status'] == 'loggedout'){
    $membership->log_Out();
  }

  //Valid registration
  if($_POST && !empty($_POST['r_Uname']) && !empty($_POST['r_Pwd']) && !empty($_POST['r_Email'])){
    $register_response = $membership->register_User($_POST['r_Uname'], $_POST['r_Pwd'], $_POST['r_Email']);
    if ($register_response == true){
      header("location:index.php");
    }
    else {
      echo('<script>console.log("Erro ao cadastrar.")</script>');
    }
  }

  //Valid login request and input
  if($_POST && !empty($_POST['uname']) && !empty($_POST['pwd'])){
    $login_response = $membership->validate_User($_POST['uname'], $_POST['pwd']);
    if ($login_response == true){
      header("location:index.php");
    }
    else {
      echo('<script>console.log("Erro ao conectar.")</script>');
    }
  }
 
?>

<!DOCTYPE html>

<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LNBU</title>

    <!-- Built upon the Bootstrap Template "Creative" -->

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.css" rel="stylesheet">

    <!-- For now, the styling for the table -->
    <link href="css/credenciamento.css" rel="stylesheet">

    <!-- Linking the icon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">LNBU</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Credenciamento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">História</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
            </li>
            <?php
              if(isset($_SESSION['status'])){
                echo(
                '<li class="nav-item">
                  <a class="nav-link" href="index.php?status=loggedout">Sair</a>
                </li>');
              }

              else{
                echo(
                '<li class="nav-item">
                  <a class="nav-link" onclick="document.getElementById(');
                echo("'loginTable'");
                echo(').style.display=');
                echo("'block'");
                echo('">Entrar</a>
                  </li>');
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Liga Nacional de Baterias Universitárias</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Conheça a LNBU, blablablablablablablablablablablabla lorem ipsum dxP!</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Conheça</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Fazemos o samba!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Lorem Ipsum kkkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj
            jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj!</p>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Faça seu credenciamento</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <a href="credenciamento.php">
              	<i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
                <h3 class="mb-3">Clique aqui</h3>
              </a>
              <p class="text-muted mb-0">Fazendo o credenciamento você pode...</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>


    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
    
    <!-- The login table -->
    <script src="js/tables.js" type="text/javascript"></script>

    <div id="loginTable" class="modal">
      
      <form class="modal-content animate" method="post" action="">
        <div class="imgcontainer">
          <span onclick="document.getElementById('loginTable').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
        </div>
    
        <div class="container">
          <label for="uname"><b>Usuário</b></label>
          <input type="text" placeholder="Usuario" name="uname" required>
    
          <label for="pwd"><b>Senha</b></label>
          <input type="password" placeholder="Senha" name="pwd" required>
            
          <button type="submit">Entrar</button>
          <a onclick="switchtable()""><button type="button">Cadastrar</button></a>
          <input type="checkbox" checked="unchecked"> Lembrar
        </div>
    
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('loginTable').style.display='none'" class="cancelbtn">Cancelar</button>
          <span class="psw"><a href="#">Esqueceu a senha?</a></span>
        </div>
      </form>
     
    </div>

    <div id="registerTable" class="modal">
      
      <form class="modal-content animate" method="post" action="">
        <div class="imgcontainer">
          <span onclick="document.getElementById('registerTable').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
        </div>
    
        <div class="container">
          <label for="r_Uname"><b>Usuário</b></label>
          <input type="text" placeholder="Usuario" name="r_Uname" required>
    
          <label for="r_Email"><b>E-mail</b></label>
          <input type="email" placeholder="E@mail.com" name="r_Email" required>

          <label for="r_Pwd"><b>Senha</b></label>
          <input type="password" placeholder="Senha" name="r_Pwd" required>
            
          <button type="submit">Confirmar</button>
        </div>
    
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('registerTable').style.display='none'" class="cancelbtn">Cancelar</button>
        </div>
      </form>
     
    </div>

  </body>

</html>
