<main>
  <main class="fullHeight">
      <div class="lightBack center fullWidth">
        <div class="floatingBack inline-block m-20b mw-800 z-1">
          <header class="center p-10t">
            <div class="profileHeader inline-block">
              <img src="./img/account.png" alt="Avatar" class="image" />
              <div class="overlay inline-block center">
                <form action="#" method="POST">
                  <input type="submit" class="miniButton p-10" value="Esci" name="exit" />
                </form>
              </div>
            </div>
            <p class="profileNameText"><?php echo $_SESSION["username"] ?></p>
          </header>
          <p><?php if (isset($templateParams["error"])) { echo $templateParams["error"];} ?></p> 
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
                        <span class="middleText center"><?php echo $templateParams["userinfo"]["username"] ?></span><br />
                      </li>
                      <li class="m-20">
                        <span class="lightText left w-50 fullHeight"
                          >Password:</span
                        >
                        <span class="middleText center"><?php for($i = 0; $i < $templateParams["userinfo"]["passlen"]; $i++) {echo "●";} ?></span>
                        <br />
                      </li>
                      <li class="m-20">
                        <p class="left w-50 m-0 fullHeight">
                          <span class="lightText">Nome e Cognome:</span>
                        </p>
                        <span class="middleText center"><?php echo $templateParams["userinfo"]["namesurname"] ?></span>
                        <br />
                      </li>
                      <li class="m-20">
                        <span class="lightText left w-50"
                          >Data di Nascita:</span
                        >
                        <span class="middleText center"><?php echo $templateParams["userinfo"]["birthdate"] ?></span>
                      </li>
                      <form action="userInfo.php" method="POST"><button class="center modifyAccountButton m-10b m-10t">
                        Modifica dati
                      </button>
                      <input type="hidden" name="profile" value="1"/></form>
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
                      <?php foreach($templateParams["orders"] as $order): ?>
                        <li class="left-text relative p-10">
                        <img
                          src="./img/<?php echo $order["Cartella_immagini"]; ?>/1.png"
                          alt="<?php echo $order["Nome"] ?>"
                          srcset=""
                          class="orderImage"
                        />
                        <div class="orderMiddleText">
                          <form action="orderHistory.php" method="GET">
                            <input type="hidden" name="id"  value="<?php echo $order["ID_Ordine"]; ?>"/>
                            <input type="submit" value="Vai ai dettagli" class="orderMiddleText orderDetailButton" />
                            <input type="hidden" name="profile" />
                          </form>
                        </div>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                    <footer>

                    <form action="orderList.php" method="POST">
                          <input
                            type="submit"
                            class="hardButton w-75 m-10t m-20b"
                            name="orders"
                            value="Mostra tutti gli ordini"
                          />
                          <input type="hidden" name="profile" />
                        </form>
                      <!-- <button class="hardButton w-75 m-10t m-20b">
                        Mostra tutti gli ordini
                      </button> -->
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
                            >&#128 <?php $sald = min_precision($templateParams["balance"], 2);
                                $splitted = explode(".", $sald);
                                  if (count($splitted) == 1) {
                                    echo $splitted[0];
                                    echo ", <em class=\"priceItalic\">00</em>";
                                  }
                                  else {
                                    echo $splitted[0];
                                    echo ", <em class=\"priceItalic\">". $splitted[1] . "</em>";
                                  }?>
                        </span>
                      </div>
                      <p class="middleSaturatedText m-0 m-20b">
                        Saldo Rimanente
                      </p>
                      <button class="modalButton">Ricarica</button>

                              <div class="profileModal">
                                <div class="profileModal-content">
                                  <span class="profileModalClose">&times;</span>
                                  <div class="center">
                                    <header>
                                      <div class="p-20t p-10b">
                                          <span class="bigSaturatedText">
                                              &#128 <?php $sald = min_precision($templateParams["balance"], 2);
                                              $splitted = explode(".", $sald);
                                              if (count($splitted) == 1) {
                                                  echo $splitted[0];
                                                  echo ", <em class=\"priceItalic\">00</em>";
                                              }
                                              else {
                                              echo $splitted[0];
                                              echo ", <em class=\"priceItalic\">". $splitted[1] . "</em>";
                                              }?>
                                          </span>
                                      </div>
                                      <p class="middleSaturatedText m-0 m-20b">
                                        Saldo Rimanente
                                      </p>
                                    </header>
                                    <form action="" method="POST">
                                      <div class="radio-toolbar center">
                                        <header class="m-10b">Ammontare</header>

                                        <input type="radio" id="radio1" name="valore" value="20" onclick="checkIfRechargeable()">
                                        <label for="radio1">20,00&#128</label>
                                      
                                        <input type="radio" id="radio2" name="valore" value="50" onclick="checkIfRechargeable()">
                                        <label for="radio2">50,00&#128</label>
                                      
                                        <input type="radio" id="radio3" name="valore" value="100" onclick="checkIfRechargeable()">
                                        <label for="radio3">100,00&#128</label><br>

                                      </div>
                                      <div>
                                        <header>
                                          <h2 class="middleText f-20">
                                            Scegli con cosa ricaricare il saldo
                                          </h2>
                                        </header>
                                        <div>
                                          <div class="payments">
                                                  <?php foreach($templateParams["payMethods"] as $pay):?>
                                                      <input type="radio" id="<?php echo $pay["Numero"]?>" name="card" value="card" onclick="checkIfRechargeable()">
                                                      <label for="<?php echo $pay["Numero"]?>">
                                                          <div class="pls m-10b">
                                                          <img class="left" src="./img/visaLogo.png" alt=""/>
                                                          <p class="center m-0">
                                                              <?php echo $pay["Nome"] ?> <br>
                                                              <?php for($i = 0; $i < strlen((string)$pay["Numero"])-2; $i++) {echo "●";} 
                                                              echo substr((string)$pay["Numero"], -2); ?>
                                                          </p>
                                                          </div>                          
                                                      </label>
                                                      <hr class="span-order-big"></hr>
                                                  <?php endforeach; ?>
                                          </div>
                                      </div>
                                      <input
                                              id="submitRecharge"
                                              type="submit"
                                              class="hardButton o-05 w-75 m-10t m-20b"
                                              disabled
                                              value="Inserisci tutti i dati"
                                      />
                                    </form>
                                      </div>
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
                        <?php foreach($templateParams["payMethods"] as $payMethod): ?>
                          <li>
                          <div class="paymentMethod w-75 inline-block">
                            <h3 class="m-0 right w-60 center f-16 p-10b">
                              <?php echo $payMethod["Nome"] ?>
                            </h3>
                            <img
                              src="./img/visaLogo.png"
                              class="left p-10t littlePaymentIcon"
                            />
                            <p class="w-68 right m-0 center f-14 lh-10">
                              <?php for($i = 0; $i < strlen((string)$payMethod["Numero"])-2; $i++) {echo "●";} 
                              echo substr((string)$payMethod["Numero"], -2); ?>
                            </p>
                          </div>
                        </li>
                        <?php endforeach; ?>
                      </ul>
                      <footer>
                        <form action="./payMethods.php" method="POST">
                          <input
                            type="submit"
                            class="hardButton w-75 m-10t m-20b"
                            name="profile"
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
              <a href="reviews.php">
                <button class="coolButton">
                  <strong>Le tue Recensioni</strong>
                </button>
              </a>
            </li>
            <li>
              <div>
                <button class="profileAccordion">
                  <strong>I tuoi indirizzi</strong>
                </button>
                <div class="panel">
                  <div class="accordionBack">
                    <ul class="list">
                      <?php foreach($templateParams["addresses"] as $address): ?>
                        <li>
                        <div class="violetBox">
                          <p class="addressText m-10t m-10b">
                            <?php echo $address["Via"] . " " . $address["Numero_civico"] . ", " . $address["Citta"]; ?>
                          </p>
                        </div>
                        <span class="filterButton addressButton">&times;</span>
                    <!-- The Modal -->
                    <div class="profileModal">
                      <!-- Modal content -->
                      <div class="profileModal-content">
                        <span class="profileModalClose">&times;</span>
                        <p> Sei sicuro di voler cancellare questo indirizzo? </p>
                        <form action="#" method="POST">
                        <input type="hidden" value="<?php echo $address["Via"] ?>" name="caddress"/> 
                        <input type="hidden" value="<?php echo $address["Numero_civico"] ?>" name="cncivico"/> 
                        <input type="hidden" value="<?php echo $address["Citta"] ?>" name="ccitta"/> 
                        <input
                            class="softButton center"
                            type="submit"
                            value="Sì"
                          />
                          </form>
                          <button
                            class="softButton center cancelModal">Annulla</button>
                      </div>
                    </div>
                      </li>
                        <?php endforeach; ?>
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
                        <form class="simpleForm" action="#" method="POST" enctype="multipart/form-data">
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
                          <div class="left p-10">
                            <label for="citta" class="addressLabel"
                              >Citt&agrave;</label
                            ><br />
                            <input
                              class="addressInput"
                              type="text"
                              id="citta"
                              name="citta"
                              placeholder="Inserisci Citt&agrave;"
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
            <?php if (isset($templateParams["admin"]) && $templateParams["admin"] == 1):?>
            <li>
              <div>
                <button class="profileAccordion">
                  <strong>Admin</strong>
                </button>
                <div class="panel">
                  <div class="accordionBack">
                    <div class="p-10 fullWidth">
                      <form action="" method="POST">
                        <label for="adminuser" class="makeAdminLbl">Rendi amministratore</label><br />
                        <input
                          class="makeAdminForm"
                          type="text"
                          id="adminuser"
                          name="adminuser"
                          placeholder="Inserisci il nome utente"
                        />
                        <input
                          type="submit"
                          class="hardButton w-75 m-10t m-20b"
                          name="submitAdminUser"
                          value="Rendi amministratore"
                        />
                      </form>
                    </div>
                    <footer>
                      <form action="addArticle.php" method="POST">
                        <label for="addarticle" class="makeAdminLbl">Aggiungi un articolo su Oniric</label><br />
                        <input
                          type="submit"
                          class="hardButton w-75 m-10t m-20b"
                          name="addarticle"
                          value="Aggiungi articolo"
                        />
                      </form>
                    </footer>
                  </div>
                </div>
              </div>
            </li>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </main>
</main>