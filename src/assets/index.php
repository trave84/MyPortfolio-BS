<?php
require_once 'DBBlackbox.php';

session_start();

$is_edit = isset($_GET['id']); 
$messages = [];

if (!empty($_SESSION['flashed_messages'])) {
    $messages = $_SESSION['flashed_messages']; 
    unset($_SESSION['flashed_messages']);
}
 
if ($is_edit) {
    $user = array_merge([
            'fn_input' => null,
            'ln_input' => null,
            'email_input' => null,
            'pn_input' => null,
            'msg_input' => null,

        ], 
        find($_GET['id'])
    );
} else {
 
    $user = [
      'fn_input' => null,
      'ln_input' => null,
      'email_input' => null,
      'pn_input' => null,
      'user_msg_input' => null
    ];
}

if ($_POST) {
    if (isset($_POST['fn_input'])) {
        $user['fn_input'] = $_POST['fn_input'];
    }

    if (isset($_POST['ln_input'])) {
        $user['ln_input'] = $_POST['ln_input'];
    }

    if (isset($_POST['email_input'])) {
        $user['email_input'] = $_POST['email_input'];
    }

    if (isset($_POST['pn_input'])) {
        $user['pn_input'] = (boolean)$_POST['pn_input'];
    }
 
    $valid = true; 
    if ($user['fn_input'] == '') {
        $messages[] = 'First name must be added';
        $valid = false; 
    }
    if ($user['ln_input'] == '') {
      $messages[] = 'Last name must be added';
      $valid = false; 
    }
    if ($user['email_input'] == '') {
      $messages[] = 'Email  must be added';
      $valid = false; 
    }
    if ($user['pn_input'] == '') {
      $messages[] = 'Phone number  must be added';
      $valid = false; 
    }
    // if ($user['user_msg_input'] == '') {
    //   // add an error message
    //   $messages[] = 'Message  must be added';
    //   $valid = false; // we indicate that not everything is ok
    // } 
  
    if ($valid) {
 
        if ($is_edit) {
            $id = update($_GET['id'], $user);
        } else {
            $id = insert($user);
        }
        

        // inform the user !!
        $messages[] = 'Successfully sent your message. You will be contacted within 48 hours. Thank you!';
        $_SESSION['flashed_messages'] = $messages;
        
        // redirect !!
        header('Location: ?id=' . $id);
    }
}

// var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,900|Anaheim" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="index.css" />
  <title>Arpad Kajari</title>
</head>

<body>
  <div class="container">
    <div class="cont-burg">
        <div id="menu" class="menu">
          <span id="current-item" class="drop-item current">&#9776</span>
          <div class="dropdown">
            <a href="#" class="drop-item">HOME</a>
            <a href="#skills" class="drop-item">SKILLS</a>
            <a href="#cont-port" class="drop-item">PORTFOLIO</a>
            <a href="#about" class="drop-item">ABOUT ME</a>
            <a href="#contact" class="drop-item">CONTACT</a>
          </div>
        </div>
    </div>

    <nav>
      <a id="logo-link" href="#">
        <img class="logo-img" src="img/logo-16px.svg" alt="Logo">
      </a>
      <a href="#" title="Homepage">HOME</a>
      <a href="#skills" title="My Skills">SKILLS</a>
      <a href="#cont-port" title="My Portfolio ">PORTFOLIO</a>
      <a href="#about" title="About Me">ABOUT ME</a>
      <a href="#contact" title="Contact Me">CONTACT</a>
    </nav>

    <!-- BANNER + TEXT -->
    <section class="banner">
      <h1>Hi, I am <br> <span class="name">Arpad Kajari</span></h1>
      <h2>I'm a <span class="typer" data-wait="3000" data-words='["Full-Stack Web Developer."]'></span></h2>
      <!-- <div class="whoiam">I'm a Full-stack Web Developer</div> -->
    </section>

    <section class="intro">
      <h5>
        <i>"Coming together is a beginning; keeping together is progress; working together is success."</i>
        <br><br>
        <p>- Edward Everett Hale</p>
      </h5>
    </section>

    <section class="promo">
      <div class="row">
        <div class="col-sm-6 col-lg-3 justify-content-center">
          <div class="promo-column">
            <div class="circle"></div>
            <h3>Brainstorm</h3>
            <p>
              We gather ideas together. You let me know about the functionalities and features you want your website to
              have.
            </p>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3  justify-content-center">
          <div class="promo-column">
            <div class="circle"></div>
            <h3>Design</h3>
            <p>
              We think about the look and feel of the website and what you want your customers to experience when
              visiting it.
            </p>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 justify-content-center">
          <div class="promo-column">
            <div class="circle"></div>
            <h3>Deploy</h3>
            <p>
              We work with you to create a prototype, continuously evolving and then finalising your site.
            </p>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 justify-content-center">
          <div class="promo-column">
            <div class="circle"></div>
            <h3>Maintain</h3>
            <p>
              We are always there for you to make changes and optimize your site to stay competitive.
            </p>
          </div>
        </div>
      </div><!-- END OF ROW -->
    </section>

    <section id="skills">
      <h2>MY SKILLS</h2>
      <div class="progress">
        <div class="label">HTML</div>
        <div class="bar">
          <div class="knob" style="width: 90%"></div>
        </div>
      </div>

      <div class="progress">
        <div class="label">CSS, SASS</div>
        <div class="bar">
          <div class="knob" style="width: 85%"></div>
        </div>
      </div>

      <div class="progress">
        <div class="label">JavaScript</div>
        <div class="bar">
          <div class="knob" style="width: 75%"></div>
        </div>
      </div>

      <div class="progress">
        <div class="label">React</div>
        <div class="bar">
          <div class="knob" style="width: 75%"></div>
        </div>
      </div>

      <div class="progress">
        <div class="label">jQuery</div>
        <div class="bar">
          <div class="knob" style="width: 80%"></div>
        </div>
      </div>

      <div class="progress">
        <div class="label">PHP</div>
        <div class="bar">
          <div class="knob" style="width: 20%"></div>
        </div>
      </div>

      <div class="progress">
        <div class="label">Laravel</div>
        <div class="bar">
          <div class="knob" style="width: 10%"></div>
        </div>
      </div>

      <div class="progress">
        <div class="label">UX</div>
        <div class="bar">
          <div class="knob" style="width: 30%"></div>
        </div>
      </div>
    </section>

    <section id="cont-port">
      <h2>MY PORTFOLIO</h2>
      <!-- RESPONSIVE ALL CARDS ROW START UNDER -->
      <div class="row">

        <div class="col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card">
            <img class="card-img-top" src="img/card-holder2.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="card-link">Check it out</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card">
            <img class="card-img-top" src="img/card-holder2.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="card-link">Check it out</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card">
            <img class="card-img-top" src="img/card-holder2.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="card-link">Check it out</a>
            </div>
          </div>
        </div><!-- END OF CARDS ROW1 -->

        <div class="col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card">
            <img class="card-img-top" src="img/card-holder2.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="card-link">Check it out</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card">
            <img class="card-img-top" src="img/card-holder2.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="card-link">Check it out</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex justify-content-center">
          <div class="card">
            <img class="card-img-top" src="img/card-holder2.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="card-link">Check it out</a>
            </div>
          </div>
        </div>

      </div><!-- END OF CARDS ROW -->
    </section> <!-- END OF PORTFOLIO SECTION -->

    <section id="about">
      <h2>ABOUT ME</h2>
      <div class="cols">
        <div class="col1">
          <img src="img/en4-small.jpg" class="img" alt="Arpad Kajari">
        </div>

        <div class="col2">
          <p>
            <strong>My name is Arpad Kajari</strong>. I have been studying web-development and can build you a <strong>responsive
              and interactive modern website</strong>.

            <p>Previously, I had been working in IT Support for clients with smartphones, tablets and computers, so I
              totally understand the <strong>issues customers experience on and off-line.</strong></p>
            <p class="get-in-touch">
              Get in touch and for more info.
            </p>
            <p>
              <button class="btn-contact" href="mailto:">CONTACT ME</a>
            </p>
        </div>
      </div>
    </section> <!-- END OF ABOUT SECTION -->

    <section class="find-me-here">
      <h2>FIND ME HERE</h2>
      <div class="grams">
        <i class="fab fa-github"></i>
        <i class="fab fa-linkedin-in"></i>
        <i class="fab fa-instagram"></i>
      </div>
    </section> <!-- END OF FIND ME  SECTION -->

    <section id="contact">
      <h2>CONTACT ME</h2>

      <!-- display messages -->
      <?php foreach ($messages as $message) : ?>
          <div class="message">
              <?php echo $message; ?>
          </div>
      <?php endforeach; ?>
    
      <form action="" method="post">
        <!-- display the form prefilled with the current data -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="userFn">First name*</label>
            <input type="text" name="fn_input" class="form-control" id="userFn" value="<?= isset($_POST['fn_input']) ? htmlspecialchars($_POST['fn_input']) : '' ?>" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="userLn">Last name*</label>
            <input type="text" name="ln_input" class="form-control" id="userLn" value="<?= isset($_POST['ln_input']) ? htmlspecialchars($_POST['ln_input']) : '' ?>"placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="userMail">E-mail*</label>
            <input type="email" name="email_input" class="form-control" id="userMail" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="userPhone">Phone*</label>
            <input type="text" name="pn_input" class="form-control" id="userPhone" value="<?= isset($_POST['pn_input']) ? htmlspecialchars($_POST['pn_input']) : '' ?>" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="userMsg">Your message</label>
            <div class="w-100"></div>
            <textarea class="form-control" name="user_msg_input" id="userMsg" rows="8"><?= isset($_POST['user_msg_input']) ? htmlspecialchars($_POST['user_msg_input']) : '' ?></textarea>
          </div>
        </div>
        <input type="submit"  value="Send message">
        <?php $id = insert($user); ?>
      </form>
    </section> <!-- END OF CONTACT ME  SECTION -->

    <footer>
      <div class="line-head">
        <div class="line"></div>
        <h2>NICE TO MEET YOU</h2>
        <div class="line"></div>
      </div>

      <div class="grams">
        <i class="fab fa-github"></i>
        <i class="fab fa-linkedin-in"></i>
        <i class="fab fa-instagram"></i>
      </div>
      <br>
      <p>Copyrights @
        <br>Arpad Kajari
        <br> 2018</p>
    </footer>
  </div>
  </div>
  <script src="js/main.js"></script>
  <script src="js/typer.js"></script>

</body>
</html>