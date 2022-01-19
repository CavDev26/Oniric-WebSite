
<link rel="stylesheet" href="./css/login_signup.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


<div class="loginBack ">
      <h1 class="bigTitle">Entra sul tuo Account</h1>
      <?php if(isset($templateParams["errorelogin"])): ?>
        <p><?php echo $templateParams["errorelogin"]; ?></p>
      <?php endif; ?>
      <form class="simpleForm" action="#" method="POST">
        <div class="p-10 fullWidth">
            <label for="username" class="form-label">Nome Utente:</label><br />
            <input
              class="box-input"
              type="text"
              id="username"
              name="username"
              placeholder="Inserisci il tuo nome utente"
            />
          </div>
          <div class="p-10 fullWidth">
            <label for="password" class="form-label">Password:</label><br />
              <input
              class="box-input"
              type="password"
              id="password"
              name="password"
              placeholder="Inserisci la tua password" > 
              <span class="material-icons passwordEye noselect" onclick="togglePassword(this)">visibility</span>
          </div>
          <footer class="center fullWidth">
            <div class="center">
              <input class="softButton" type="submit" value="Accedi">
            </div>
        </footer>
      </form>
      <a href="signup.php"><p>Non hai un account? Clicca qui per registrarti!</p></a>
    </div>