
<link rel="stylesheet" href="./css/login_signup.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


<div class="loginBack ">
      <h1 class="bigTitle">Entra sul tuo Account</h1>
      <form class="simpleForm">
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
      </form>
      <footer>
        <input class="softButton center" type="submit" value="Accedi">
      </footer>
    </div>