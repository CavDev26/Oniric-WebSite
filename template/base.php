<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="stylesheet" href="./css/framework.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/text.css" />
    <link rel="stylesheet" href="./css/buttons.css" />
    <link rel="icon" href="img/favicon.ico" type="image/ico">

    <?php
    if(isset($templateParams["style"])):
        foreach($templateParams["style"] as $style):
    ?>
        <link rel="stylesheet" href="<?php echo $style; ?>" />
    <?php
        endforeach;
    endif;
    ?>
    <title><?php echo $templateParams["titolo"]; ?></title>
  </head>
  <body>
    <nav class="navbar-top">
        <span class="button-top-logo m-10r">
          <a href=""><img src="./img/logo-oniric.png" alt="" class="logo-img" /></a>
        </span>
        <span class="left-menu left full-height">
              <input id="menu-check" type="checkbox"/>
              <span class="first-span menu-mobile"></span>
              <span class="menu-mobile"></span>
              <span class="menu-mobile"></span>
          <ul class="unfolded-left-menu">
            <li class="search-line">
              <div class="wrapper">
                <a href="#"><img class="search-icon" src="./img/Search.png"/></a>
                <input class="search" placeholder="Search" type="text" >
              </div>  
            </li>
            
            <hr class="span-menu-div">
            <li><a href="#">Pre-assemblati</a></li>
            <hr class="span-menu-div">
            <li><a href="#">Categoria 1</a></li>
            <hr class="span-menu-div">
            <li><a href="#">Categoria 2</a></li>
            <hr class="span-menu-div">
            <li><a href="#">Categoria 3</a></li>
            <hr class="span-menu-div">
            <li><a href="#">Contatti e Assistenza</a></li>
            <hr class="span-menu-div">
          </ul>
        </span>

        <label for="menu-check"><div class="buttons border-right border-left full-height left">
          <div class="center m-0">
            <img src="./img/Search.png" class="buttons-img" alt=""/>
          </div>
          <span class="menu-desc">Menù</span>
        </div></label>
        <a class="buttons border-right full-height left" href="">
          <div class="center m-0">
            <img src="./img/Search.png" class="buttons-img" alt=""/>
          </div>
          <span class="menu-desc">Ricerca</span>
        </a>
        <a class="buttons full-height border-right left" href="">
          <div class="center m-0">
            <img src="./img/Search.png" class="buttons-img" alt=""/>
          </div>
          <span class="menu-desc">Supporto</span>
        </a>
        <a class="buttons full-height border-right left" href="">
          <div class="center m-0">
            <img src="./img/user.png" class="buttons-img" alt=""/>
          </div>
          <span class="menu-desc">Profilo</span>
        </a>
        <a class="buttons full-height border-right left" href="">
          <div class="m-0">
            <img src="./img/Cart.png" class="buttons-img" alt=""/>
          </div>
          <span class="menu-desc">Carrello</span>
        </a>

        <span class="button-top-notifications full-height">
          <div class="center m-0">
            <label class="pointer" for="notification"><img id="bell" src="./img/notificationdef.png" alt="" class="notification-menu-img"/></label>
          </div>
          <input id="notification" type="checkbox" class="check-notifications" onchange="readNotifications(this)"/>
          <ul class="notifications-list" id="notificationHub">
            <?php if(isUserLoggedIn()) {
              foreach($dbh->getNotifications($_SESSION["username"]) as $notification):
            ?>
            <a href="">  
              <li class="notification-dimensions">
                <div class="notification-elem">
                  <img src="./img/cava2000.png" alt="" class="notification-img-product"/>
                  <h1 class="notification-type left-text"><?php echo $notification["Titolo"]?></h1>
                  <p class="notification-status left-text"><?php echo $notification["Descrizione"]?></p>
                  <?php if ($notification["Letto"] == 0): ?><img src="./img/notifica-ball.png" alt="" class="notification-indicator"/><?php endif;?>
                  <footer class="notification-time right-text">
                  <?php echo $notification["Data_Ora"]?>
                </footer>
                </div>
              </li>
            </a>
            <hr class="span-notifications-div">
            <?php endforeach; }?>
          </ul>
        </span>
    </nav>

    <nav class="navbar-bot">
      <div class="bottom-nav-button display-flex-column">
        <a href=""><img src="./img/User.png" alt="" class="bottom-nav-icon-img"/></a>
      </div>
      <div class="bottom-nav-button display-flex-column">
        <a href=""><img src="./img/Home.png" alt="" class="bottom-nav-icon-img"/></a>
      </div>
      <div class="bottom-nav-button display-flex-column">
        <a href=""><img src="./img/Search.png" alt="" class="bottom-nav-icon-img"/></a>
      </div>
      <div class="bottom-nav-button display-flex-column">
        <a href=""><img src="./img/Cart.png" alt="" class="bottom-nav-icon-img"/></a>
      </div>
    </nav>

    <?php  require($templateParams["nome"]); ?>
    
    <footer class="home-footer">
      <p>
        Cava and Fresh (C) Copyright 2021 All rights reserved
      </p>
    </footer>
  </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/onscroll.js"></script>
    <script src="./js/notifications.js"></script>

    <?php
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
    ?>
        <script src="<?php echo $script; ?>"></script>
    <?php
        endforeach;
    endif;
    ?>
</html>