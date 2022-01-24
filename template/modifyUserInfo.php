<div class="loginBack ">
      <div class="floatingBack inline-block m-20b fullWidth">
        <div class="center relative">
          <form action="" method="POST">
            <input type="hidden" name="exit" value="1" />
            <input class="bigHardButton relative" type="submit" value="Torna all'Account">
          </form>
        </div>
        <form action="" class="simpleForm p-20t p-10">
            <div class="p-10 fullWidth">
              <label for="username" class="form-label">Nome Utente:</label><br />
              <input
                class="box-input"
                type="text"
                id="username"
                name="username"
                placeholder="Inserisci il tuo nome utente"
                value="Fresh"
              />
            </div>
            <div class="p-10 fullWidth">
              <label for="password" class="form-label">Vecchia Password:</label><br />
                <input
                class="box-input"
                type="password"
                id="oldpassword"
                name="oldpassword"
                placeholder="••••••••••••••" 
                disabled="true"> 
            </div>
            <div class="p-10 fullWidth">
              <label for="password" class="form-label">Nuova Password:</label><br />
                <input
                class="box-input"
                type="password"
                id="newpassword"
                name="newpassword"
                placeholder="Inserisci la tua password" > 
                <span class="material-icons passwordEye noselect" onclick="togglePassword(this)">visibility</span>
            </div>
            <div class="p-10 fullWidth">
              <label for="confirmpassword" class="form-label">Conferma Nuova Password:</label><br />
              <input
              class="box-input"
              type="password"
              id="confirmpassword"
              name="confirmpassword"
              placeholder="Inserisci di nuovo la tua password" >
              </input>
              <span class="material-icons passwordEye noselect" onclick="togglePassword(this)">visibility</span>
            </div>
            <div class="p-10 fullWidth">
              <label for="nameAndsurname" class="form-label">Nome e Cognome:</label><br />
              <input
                class="box-input"
                type="text"
                id="nameAndsurname"
                name="name"
                placeholder="Inserisci il tuo nome e cognome"
                value="Francesco Magnani"
              />
            </div>
            <div class="p-10 fullWidth">
              <label for="birthdate" class="form-label">Data di Nascita:</label><br />
              <input
                class="box-input"
                type="date"
                id="birthdate"
                name="name"
                placeholder="Inserisci la tua data di nascita"
                value="2000-03-16"
                disabled="true"
              />
            </div>
          <footer class="center fullWidth">
              <input class="hardButton m-10b m-10t" type="submit" value="Applica Modifiche">
          </footer>
        </form>
    </div>
    </div>