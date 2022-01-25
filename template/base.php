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
        <div class="button-top-logo m-10r">
          <a href="index.php"><img src="./img/logo-oniric.png" alt="Torna alla home" class="logo-img" /></a>
        </div>
        <div class="left-menu left full-height">
              <input id="menu-check" type="checkbox"/>
              <span class="first-span menu-mobile"></span>
              <span class="menu-mobile"></span>
              <span class="menu-mobile"></span>
          <ul class="unfolded-left-menu">
            <li class="search-line">
                <form action="articleList.php" class="wrapper" method="GET">
                <label class="search-icon" for="submitSearch"><img alt="Cerca su Oniric" src="./img/Search.png"/></label>
                <input class="none" type="submit" name="submitSearch" id="submitSearch"/>
                <input class="search" placeholder="Cerca" type="text" name="name"/>
                </form>
            </li>
            
            <li><hr class="span-menu-div"></li>
            <li><a href="articleList.php?category=Desktop+PC">Desktop PC</a></li>
            <li><hr class="span-menu-div"></li>
            <li><a href="articleList.php?category=Mobile">Mobile</a></li>
            <li><hr class="span-menu-div"></li>
            <li><a href="articleList.php?category=Console+da+gioco">Console da Gioco</a></li>
            <li><hr class="span-menu-div"></li>
            <li><a href="articleList.php?category=Cuffie">Cuffie</a></li>
            <li><hr class="span-menu-div"></li>
            <li><a href="contatti.php">Contatti e Assistenza</a></li>
            <li><hr class="span-menu-div"></li>
          </ul>
        </div>

        <div class="buttons border-right border-left full-height left"><label for="menu-check">
          <span class="menu-desc">Men&ugrave;</span>
       </label> </div>
        <a class="buttons border-right full-height left" href="articleList.php">
          <span class="menu-desc">Ricerca</span>
        </a>
        <a class="buttons full-height border-right left" href="contatti.php">
          <span class="menu-desc">Supporto</span>
        </a>
        <a class="buttons full-height border-right left" href="login.php">
          <span class="menu-desc">Profilo</span>
        </a>
        <a class="buttons full-height border-right left" href="cart.php">
          <span class="menu-desc">Carrello</span>
        </a>

        <div class="button-top-notifications full-height">
          <div class="center m-0">
            <label class="pointer" for="notification"><img id="bell" src="./img/notificationdef.png" alt="Notifiche" class="notification-menu-img"/></label>
          </div>
          <input id="notification" type="checkbox" class="check-notifications" onchange="readNotifications(this)"/>
          <ul class="notifications-list" id="notificationHub">
            <?php if(isUserLoggedIn()) {
              foreach($dbh->getNotifications($_SESSION["username"]) as $notification):
            ?>
            
              <li class="notification-dimensions">
                <a href="<?php echo getHrefOfNotification($notification["ID_Notifica"]); ?>">  
                <div class="notification-elem">
                  <img src="<?php echo $notification["Immagine"]?>" alt="<?php echo $notification["Titolo"]?>" class="notification-img-product"/>
                  <h1 class="notification-type left-text"><?php echo $notification["Titolo"]?></h1>
                  <p class="notification-status left-text"><?php echo $notification["Descrizione"]?></p>
                  <?php if ($notification["Letto"] == 0): ?><img src="./img/notifica-ball.png" alt="Notifica da leggere" class="notification-indicator"/><?php endif;?>
                  <footer class="notification-time right-text">
                  <?php echo $notification["Data_Ora"]?>
                </footer>
                </div>
                </a>
              </li>
            
            <li><hr class="span-notifications-div"></li>
            <?php endforeach; }?>
          </ul>
        </div>
    </nav>

    <nav class="navbar-bot">
      <div class="bottom-nav-button display-flex-column">
        <a href="login.php"><img src="./img/User.png" alt="Profilo" class="bottom-nav-icon-img"/></a>
      </div>
      <div class="bottom-nav-button display-flex-column">
        <a href="index.php"><img src="./img/Home.png" alt="Home" class="bottom-nav-icon-img"/></a>
      </div>
      <div class="bottom-nav-button display-flex-column">
        <a href="articleList.php"><img src="./img/Search.png" alt="Cerca" class="bottom-nav-icon-img"/></a>
      </div>
      <div class="bottom-nav-button display-flex-column">
        <a href="cart.php"><img src="./img/Cart.png" alt="Carrello" class="bottom-nav-icon-img"/></a>
      </div>
    </nav>

    <?php  require($templateParams["nome"]); ?>
    
    <footer class="home-footer">
      <p>
        Cava and Fresh &copy; Copyright 2021 All rights reserved
      </p>
    </footer>
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
  </body>
</html>