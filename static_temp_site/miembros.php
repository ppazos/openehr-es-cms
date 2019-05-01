<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    session_start();
    spl_autoload_register(function ($class) {
      global $_BASE;
      //echo 'spl_autoload_register '. $class . PHP_EOL;
      //echo $_BASE.str_replace('\\', '/', $class).'.php' . PHP_EOL;
      if (file_exists($_BASE.str_replace('\\', '/', $class).'.php'))
        require_once($_BASE.str_replace('\\', '/', $class).'.php');
    });
    // GLOBALS
    $_BASE = __DIR__ .'/';
    $_BASE_URL = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')) .'/';
    $ph_db = new \phersistent\PhersistentMySQL('localhost', 'root', 'toor', 'openehres');
    $man = new \phersistent\PhersistentDefManager('model', $ph_db);
    \logger\Logger::$on = false;
    \logger\Logger::$force = false;
    ?>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Comunidad de openEHR en español">
    <meta name="keywords" content="openehr">
    <meta name="author" content="Pablo Pazos">

    <title>Comunidad de openEHR en español</title>

    <link href="css/css.css" rel="stylesheet" type="text/css">
    <link href="css/toolkit.css" rel="stylesheet" type="text/css">
    <link href="css/application.css" rel="stylesheet" type="text/css">

    <!-- REF: https://bootstrap-themes.github.io/application/ -->

    <style>
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
  </head>
  <body class="bob">
    <!-- top -->
    <nav class="ck pt adq py tk app-navbar">

      <a class="e" href="#">
        <img src="images/logo_big.png" alt="brand">
      </a>

      <button class="pp bpn vm" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="pq"></span>
      </button>

    </nav>

    <div class="by aha ahl">
      <div class="dp">

        <!-- left column -->
        <div class="fj">

          <div class="pz vp vy afo">
            <div class="qa">
              <h6 class="afh">Links</h6>
              <ul class="dc axg">
                <li><span class="axc h bet aff"></span> <a href="https://specifications.openehr.org/" target="_blank">Especificaciones</a></li>
                <li><span class="axc h bnc aff"></span> <a href="https://openehrspecs.slack.com/" target="_blank">Comunidad en Slack</a></li>
                <li><span class="axc h bfa aff"></span> <a href="https://github.com/openEHR" target="_blank">Github</a></li>
                <li><span class="axc h bea aff"></span> <a href="https://www.linkedin.com/groups/4347256/" target="_blank">LinkedIn</a></li>
                <li><span class="axc h bgx aff"></span> <a href="https://www.facebook.com/openEHR/" target="_blank">Facebook</a></li>
                <?php /*
                  foreach (range('a','z') as $f1)
                  {
                    foreach (range('a','z') as $f2)
                    {
                      foreach (range('a','z') as $f3)
                      {
                        echo '<li><span class="axc h '. $f1.$f2.$f3 .' aff"></span>'. $f1.$f2.$f3 .'</li>';
                      }
                    }
                  }
                  */
                ?>
              </ul>
            </div>
          </div>

          <div class="ca afo">
            <a href="index.php" class="b rx vb xn">
              <span>Inicio</span>
              <span class="h aye"></span>
            </a>
            <a href="miembros.php" class="b rx vb xn">
              <span>Miembros</span>
              <span class="h aye"></span>
            </a>
            <a href="https://groups.google.com/forum/#!forum/openehr-es" class="b rx vb xn">
              <span>Foro</span>
              <span class="h aye"></span>
            </a>
          </div>

        </div>
        <!-- /left column -->

        <!-- content column -->
        <div class="fm">

          <!--
          <div class="pz bpi afo">
            <div class="qf"></div>
            <div class="qa avz">
              <a href="profile/index.html">
                <img class="bpj" src="https://bootstrap-themes.github.io/application/assets/img/avatar-fat.jpg">
              </a>

              <h6 class="qb">
                <a class="boa" href="profile/index.html">Dave Gamache</a>
              </h6>

              <p class="afo">I wish i was a little bit taller, wish i was a baller, wish i had a girl…&nbsp;also.</p>
            </div>
          </div>

          <div class="pz bpi afo">
            <div class="qf"></div>
            <div class="qa avz">
              <a href="profile/index.html">
                <img class="bpj" src="https://bootstrap-themes.github.io/application/assets/img/avatar-fat.jpg">
              </a>

              <h6 class="qb">
                <a class="boa" href="profile/index.html">Dave Gamache</a>
              </h6>

              <p class="afo">I wish i was a little bit taller, wish i was a baller, wish i had a girl…&nbsp;also.</p>
            </div>
          </div>
          -->

          <?php
          $users = $User->listAll(500, 0);
          for ($i=0; $i<count($users); $i+=2)
          {
            $user1 = $users[$i];
            $grav_url1 = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user1->getEmail() ) ) );
            $has2 = false;

            if (isset($users[$i+1]))
            {
              $user2 = $users[$i+1];
              $grav_url2 = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user2->getEmail() ) ) );
              $has2 = true;
            }
          ?>
            <div class="aew">
              <div class="dp">
                <div class="fm">
                  <div class="pz bpi afa">
                    <div class="qf"></div>
                    <div class="qa avz">
                      <img src="<?=$grav_url1?>" class="bpj" />
                      <h5 class="qb"><?=$user1->getName()?></h5>
                      <p class="afo"><?=$user1->getCompany()?></p>
                      <!--
                      <button class="cg nz ok">
                        <span class="h ayi"></span> Follow
                      </button>
                      -->
                    </div>
                  </div>
                </div>
                <?php if ($has2) :?>
                <div class="fm">
                  <div class="pz bpi afa">
                    <div class="qf"></div>
                    <div class="qa avz">
                      <img src="<?=$grav_url2?>" class="bpj" />
                      <h5 class="qb"><?=$user2->getName()?></h5>
                      <p class="afo"><?=$user2->getCompany()?></p>
                      <!--
                      <button class="cg nz ok">
                        <span class="h ayi"></span> Follow
                      </button>
                      -->
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              </div>
            </div>
          <?php
          }
          ?>

          <!--
          <ul class="ca bow box afo">
            <li class="rv b agz">

              <div class="rw">
                <div class="bpd">
                  <div class="mt-2">
                    xxx
                  </div>
                </div>
              </div>

            </li>
            <li class="rv b agz">
              <div class="rw">
                <div class="bpd">
                  <div class="bpb">
                    <h6>Sobre openEHR</h6>
                  </div>
                  <p>
                    yy
                  </p>
                </div>
              </div>
            </li>
          </ul>
          -->

        </div>
        <!-- /content column -->

        <!-- right column -->
        <div class="fj">
          <div class="pz afo d-none vy">
            <div class="qa">
              <h6 class="afh">Formaci&oacute;n</h6>
              <div data-grid="images" data-target-height="150">
                <img class="bos" data-width="640" data-height="640" data-action="zoom" src="https://3.bp.blogspot.com/-i8SNsD0g0GQ/W9Fxq04y8tI/AAAAAAAAd0k/wzl1aEZCbhgTEzaWIRJSnZjAodnF_yliACLcBGAs/s320/iso_300_hor_white_1margin_0text_1square.png" style="width: 100%; margin-bottom: 10px; margin-right: 0px; display: inline-block; vertical-align: bottom;">
              </div>
              <p>
                <strong>IV Curso Dise&ntilde;o e Implementaci&oacute;n de Bases de Datos Cl&iacute;nicas con openEHR</strong><br/>
                Desde el 26 de Noviembre de 2018 al 6 de Enero de 2019 (6 semanas)<br/><br/>
                Objetivos del curso<br/>
                  <ul>
                    <li>
                      Conocer los requerimientos particulares de las bases de datos cl&iacute;nicas.
                    </li>
                    <li>
                      Conocer el est&aacute;ndar openEHR para Historias Cl&iacute;nicas Electr&oacute;nicas,
                      desde el punto de vista de implementaci&oacute;n de repositorios de informaci&oacute;n cl&iacute;nica.
                    </li>
                    <li>
                      Conocer distintas t&eacute;cnicas y tecnolog&iacute;as de implementaci&oacute;n de bases de datos.
                    </li>
                    <li>
                      Experimentar con los conceptos vistos en clase para el dise&ntilde;o e implementaci&oacute;n
                      de una base de datos cl&iacute;nica.
                    </li>
                  </ul>
              </p>
              <a href="http://informatica-medica.blogspot.com/2018/10/iv-curso-diseno-e-implementacion-de.html" target="_blank" class="cg nz ok">M&aacute;s info</a>
            </div>
          </div>
        </div>
        <!-- /right column -->

      </div>
    </div>

  </body>
</html>
