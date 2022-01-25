<div class="loginBack center ">
      <h1 class="bigTitle">Crea il tuo Account Oniric</h1>
      <?php if(isset($templateParams["erroresignup"])): ?>
        <p><?php echo $templateParams["erroresignup"]; ?></p>
      <?php endif; ?>
      <form action="#" class="simpleForm" method="POST">
          <div class="p-10 fullWidth">
            <label for="email" class="form-label">Email:*</label><br />
            <input
              class="box-input"
              type="text"
              id="email"
              name="email"
              placeholder="Inserisci la tua mail"
              required>
          </div>
          <div class="p-10 fullWidth">
            <label for="username" class="form-label">Nome Utente:*</label><br />
            <input
              class="box-input"
              type="text"
              id="username"
              name="username"
              placeholder="Inserisci il tuo nome utente"
              required
            />
          </div>
          <div class="p-10 fullWidth">
            <label for="password" class="form-label">Password:*</label><br />
              <input
              class="box-input"
              type="password"
              id="password"
              name="password"
              placeholder="Inserisci la tua password"
              required > 
              <span class="material-icons passwordEye noselect" onclick="togglePassword(this)">visibility</span>
          </div>
          <div class="p-10 fullWidth">
            <label for="confirmpassword" class="form-label">Conferma Password:*</label><br />
            <input
            class="box-input"
            type="password"
            id="confirmpassword"
            name="confirmpassword"
            placeholder="Inserisci di nuovo la tua password" 
            required>
            </input>
            <span class="material-icons passwordEye noselect" onclick="togglePassword(this)">visibility</span>
          </div>
          <div class="p-10 fullWidth">
            <label for="nameAndsurname" class="form-label">Nome e Cognome:*</label><br />
            <input
              class="box-input"
              type="text"
              id="nameAndsurname"
              name="nameAndsurname"
              placeholder="Inserisci il tuo nome e cognome"
              required
            />
          </div>
          <div class="p-10 fullWidth">
            <label for="birthdate" class="form-label">Data di Nascita:*</label><br />
            <input
              class="box-input"
              type="date"
              id="birthdate"
              name="birthdate"
              placeholder="Inserisci la tua data di nascita"
              required
            />
          </div>
          <div class="center p-10">
            <label for="news" class="saturatedText ">Ricevi notizie riguardo le offerte o eventi relativi a Oniric</label>
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
          </div>
        <footer class="center fullWidth">
          <div class="center">
            <input class="softButton" type="submit" value="Registrati">
          </div>
        </footer>
        
      </form>
    </div>