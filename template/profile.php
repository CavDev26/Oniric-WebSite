<link rel="stylesheet" href="./css/modal.css" />
<link rel="stylesheet" href="./css/profile.css" />
<link rel="stylesheet" href="./css/accordion.css" />
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

<main class="fullHeight">
      <div class="lightBack center fullWidth">
        <div class="floatingBack inline-block m-20b mw-800 z-1">
          <header class="center p-10t">
            <div class="profileHeader inline-block">
              <img src="./img/account.png" alt="Avatar" class="image" />
              <div class="overlay inline-block center">
                <button class="miniButton">Esci</button>
              </div>
            </div>
            <p class="profileNameText"><?php echo $_SESSION["username"] ?></p>
          </header>
          <ul class="list center">
            <li>
              <div>
                <button class="profileAccordion">
                  <strong>Account</strong>
                </button>
                <div class="panel">
                  <div class="accordionBack">
                    <ul class="list">
                      <li class="m-20">
                        <span class="lightText left w-50 fullHeight"
                          >Nome Utente:</span
                        >
                        <span class="middleText center"><?php echo $_SESSION["username"] ?></span><br />
                      </li>
                      <li class="m-20">
                        <span class="lightText left w-50 fullHeight"
                          >Password:</span
                        >
                        <span class="middleText center">●●●●●●●●●●</span>
                        <br />
                      </li>
                      <li class="m-20">
                        <p class="left w-50 m-0 fullHeight">
                          <span class="lightText">Nome e Cognome:</span>
                        </p>
                        <span class="middleText center">Francesco Magnani</span>
                        <br />
                      </li>
                      <li class="m-20">
                        <span class="lightText left w-50"
                          >Data di Nascita:</span
                        >
                        <span class="middleText center">16/03/2000</span>
                      </li>
                      <button class="center modifyAccountButton m-10b m-10t">
                        Modifica dati
                      </button>
                      <br />
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div>
                <button class="profileAccordion">
                  <strong>I tuoi Ordini</strong>
                </button>
                <div class="panel">
                  <div class="accordionBack">
                    <ul class="list center p-10">
                      <li class="left-text relative p-10">
                        <img
                          src="./img/cava2000.png"
                          alt=""
                          srcset=""
                          class="orderImage"
                        />
                        <div class="orderMiddleText">
                          Arriverà <strong>domani</strong>
                        </div>
                      </li>
                      <li class="left-text relative p-10">
                        <img
                          src="./img/cava2000.png"
                          alt=""
                          srcset=""
                          class="orderImage"
                        />
                        <div class="orderMiddleText">
                          Arriverà <strong>dopodomani</strong>
                        </div>
                      </li>
                      <li class="left-text relative p-10">
                        <img
                          src="./img/cava2000.png"
                          alt=""
                          srcset=""
                          class="orderImage"
                        />
                        <div class="orderMiddleText">
                          Arriverà <strong>sabato 18 Dicembre</strong>
                        </div>
                      </li>
                    </ul>
                    <footer>
                      <button class="hardButton w-75 m-10t m-20b">
                        Mostra tutti gli ordini
                      </button>
                    </footer>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div>
                <button class="profileAccordion">
                  <strong>Il tuo Saldo</strong>
                </button>
                <div class="panel">
                  <div class="accordionBack">
                    <header>
                      <div class="p-20t p-10b">
                        <span class="bigSaturatedText"
                          >€ 1205<em>,16 </em></span
                        >
                      </div>
                      <p class="middleSaturatedText m-0 m-20b">
                        Saldo Rimanente
                      </p>
                      <button class="modalButton">Ricarica</button>

                      <!-- The Modal -->
                      <div class="profileModal">
                        <!-- Modal content -->
                        <div class="profileModal-content">
                          <span class="profileModalClose">&times;</span>
                          <div class="center">
                            <header>
                              <div class="p-20t p-10b">
                                <span class="bigSaturatedText"
                                  >€ 1205<em>,16 </em></span
                                >
                              </div>
                              <p class="middleSaturatedText m-0 m-20b">
                                Saldo Rimanente
                              </p>
                            </header>
                            <form action="">
                              <label
                                for="quantity"
                                class="middleText left p-20l f-20 p-10b"
                              >
                                Ammontare </label
                              ><br />
                              <input
                                class="numberPicker"
                                type="number"
                                id="quantity"
                                name="quantity"
                                min="1"
                                max="500"
                              />

                              <aside>
                                <header>
                                  <h2 class="middleText left-text p-20l f-20">
                                    Scegli con cosa ricaricare il saldo
                                  </h2>
                                </header>
                                <ul class="list">
                                  <li>
                                    <div
                                      class="paymentMethod w-75 inline-block"
                                    >
                                      <h3
                                        class="m-0 right w-60 center f-16 p-10b"
                                      >
                                        Carta di Fresh
                                      </h3>
                                      <img
                                        src="./img/visaLogo.png"
                                        class="left p-10t littlePaymentIcon"
                                      />
                                      <p
                                        class="w-68 right m-0 center f-14 lh-10"
                                      >
                                        •••• •••• •••• 0765
                                      </p>
                                    </div>
                                  </li>
                                </ul>
                              </aside>
                              <input
                                type="submit"
                                class="hardButton w-75 m-10t m-20b"
                                value="Ricarica"
                              />
                            </form>
                          </div>
                        </div>
                      </div>
                    </header>
                    <aside>
                      <header>
                        <h2 class="middleText left-text p-20l f-20">
                          Altri metodi di Pagamento
                        </h2>
                      </header>
                      <ul class="list">
                        <li>
                          <div class="paymentMethod w-75 inline-block">
                            <h3 class="m-0 right w-60 center f-16 p-10b">
                              Carta di Fresh
                            </h3>
                            <img
                              src="./img/visaLogo.png"
                              class="left p-10t littlePaymentIcon"
                            />
                            <p class="w-68 right m-0 center f-14 lh-10">
                              •••• •••• •••• 0765
                            </p>
                          </div>
                        </li>
                      </ul>
                      <footer>
                        <form action="">
                          <input
                            type="button"
                            class="hardButton w-75 m-10t m-20b"
                            value="Modifica metodi di Pagamento"
                          />
                        </form>
                      </footer>
                    </aside>
                    <ul></ul>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <button class="coolButton">
                <strong>Iscrivi a Omni</strong>
                <img src="./img/first_logo.jpg" class="inline-block" />
              </button>
            </li>
            <li>
              <button class="coolButton">
                <strong>Le tue Recensioni</strong>
              </button>
            </li>
            <li>
              <div>
                <button class="profileAccordion">
                  <strong>I tuoi indirizzi</strong>
                </button>
                <div class="panel">
                  <div class="accordionBack">
                    <ul class="list">
                      <li>
                        <div class="violetBox">
                          <p class="middleSaturatedText f-18">
                            Via F. Parri 727, Cesena
                          </p>
                        </div>
                      </li>
                    </ul>
                    <!-- Trigger/Open The Modal -->

                    <button class="modalButton">
                      Aggiungi un nuovo Indirizzo
                    </button>
                    <!-- The Modal -->
                    <div class="profileModal">
                      <!-- Modal content -->
                      <div class="profileModal-content">
                        <span class="profileModalClose">&times;</span>
                        <h3>Inserisci nuovo indirizzo</h3>
                        <form class="simpleForm">
                          <div class="left p-10">
                            <label for="address" class="addressLabel"
                              >Indirizzo:</label
                            ><br />
                            <input
                              class="addressInput"
                              type="text"
                              id="address"
                              name="address"
                              placeholder="Inserisci il tuo indirizzo"
                            />
                          </div>
                          <div class="left p-10">
                            <label for="ncivico" class="addressLabel"
                              >N. Civico:</label
                            ><br />
                            <input
                              class="addressInput"
                              type="number"
                              id="ncivico"
                              name="ncivico"
                              placeholder="N. Civico"
                            />
                          </div>
                          <input
                            class="softButton center"
                            type="submit"
                            value="Inserisci"
                          />
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <button class="coolButton"><strong>Notifiche</strong></button>
            </li>
          </ul>
        </div>
      </div>
      <script src="./js/accordion.js"></script>
  <script src="./js/modal.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./js/onscroll.js"></script>
    </main>