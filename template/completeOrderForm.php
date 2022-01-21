      <div class="centered">
          <a class="normal" href="">
              <div class="purchase-button">
                <p>Acquista</p>
              </div>
           </a>
      </div>
      <div class="lightBack center fullWidth">
        <div class="floatingBack inline-block m-20b mw-800 z-1">
          <div>
            <header class="category m-10t">Dettagli Articoli</header>
            <hr class="span-order"></hr>
            <ul class="list detail-items">
                <li class="m-20l m-20r">
                  <span class="left fullHeight m-0">Articoli</span>
                  <?php $sum = min_precision(getTotalPrices($templateParams["articles"]), 2)?>
                  <span class="right m-0"><?php echo "$sum&#128" ?></span><br/>
                </li>
                <li class="m-20l m-20r m-20b">
                  <span class="left fullHeight m-0">Costi di spedizione</span>
                  <span class="right m-0" id="price">--</span><br/>
                </li>
                <hr class="span-order"></hr>
                <li class="m-20">
                  <span class="left fullHeight total m-0">Totale</span>
                  <span id="total" class="right m-0 total-price">--</span><br/>
                </li>
            </ul>
          </div>
          <hr class="span-order-big"></hr>
          <div>
            <header class="category m-10t">Dettagli Spedizione</header>
            <hr class="span-order"></hr>
            <ul class="list detail-items">
              <li class="m-20l m-20r">
                <span class="center w-50 fullHeight">Invia a:</span>
              </li>
              <li class="m-10t">
                <button class="profileAccordion address">
                  <span>Scegli indirizzo</span>
                </button>
                <div class="panel">
                  <div class="accordionBack">
                    <form class="list">
                      <div class="radio-addr">

                      <?php foreach($templateParams["addresses"] as $addr):?>
                        <input type="radio" id="<?php echo $addr["Via"].$addr["Numero_civico"] ?>" name="radios" value="address"/>
                        <label for="<?php echo $addr["Via"].$addr["Numero_civico"] ?>">
                          <div class="pls">
                            <p class="m-0 add-name"><?php echo $templateParams["namesurname"]["Email"]; ?><br></p>
                            <?php echo $addr["Via"] ?> <?php echo $addr["Numero_civico"] ?><br>
                            <?php echo $addr["Citta"] ?>
                          </div>
                        </label>
                        <hr class="span-order-big"></hr>
                      <?php endforeach ?>
                      </div>
                      <hr class="span-order-big"></hr>
                      <div class="center">
                          <button class="add-add hardButton">
                            Aggiungi indirizzo
                          </button>
                          <!-- AGGIUNGIMI -->
                      </div>
                    </form>
                  </div>
                </div>
              </li>
              <hr class="span-order"></hr>
              <li>
                <span class="center">
                  Metodo di spedizione
                </span>
              </li>
              <li class="m-20l m-20t m-20r">
                <button class="shipmentAccordion">
                  Scegli metodo
                </button>
                <div class="panelShipment">
                    <div class="accordionBackShipment">
                        <form class="list">
                            <div class="radio-ship">
                                <?php foreach($templateParams["shipmentMethods"] as $ship):?>
                                    <?php $Tariffa = min_precision($ship["Tariffa"], 2) ?>
                                    <input 
                                    onClick="changeTotal(<?php echo min_precision($sum, 2); ?>, <?php echo $Tariffa; ?>, <?php echo $templateParams["balance"]["Saldo"] ?>)"
                                    onchange="changeDisplayed(<?php echo $Tariffa; ?>);" type="radio" id="<?php echo $ship["ID_Tipo_Sped"] ?>" name="radios" value="<?php echo $ship["Nome_Corriere"]; ?>" checked="true" />
                                    <label class="m-10t" for="<?php echo $ship["ID_Tipo_Sped"] ?>">
                                    <div class="pls">
                                        <p class="center"><?php echo $ship["Nome_Corriere"]; ?><?php echo "  ($Tariffa&#128)"; ?></p>
                                    </div>                   
                                    </label>
                                    <hr class="span-order-big"></hr>
                                <?php endforeach; ?>
                            </div>
                        </form> 
                    </div>
                </div>
              </li>
              <hr class="span-order"></hr>
              <li class="m-20l m-20r m-20b">
                <span class="left">
                  Spedizione prevista:
                </span><br>
                <span class="right m-10b m-10t consegna">
                    <!-- DEVE CAMBIARE IN BASE AL TIPO DI CONSEGNA -->
                  <?php echo date("l, d/m/Y"); ?>
                </span>
              </li>
            </ul>
          </div>
          <hr class="span-order-big"></hr>
          <div>
            <header class="category m-10t">Dettagli Pagamento</header>
            <hr class="span-order"></hr>
            <ul class="list detail-items">
                <li class="m-20l m-20r">
                  <span class="center fullHeight">Metodo di pagamento</span><br>
                  
                  <span>
                    <div class="back m-10t">
                      <span class="">
                        Il tuo saldo:
                      </span>
                      <span class="bigSaturatedText">
                            &#128 <?php $sald = min_precision($templateParams["balance"]["Saldo"], 2);
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
                    <button class="modalButton">Ricarica</button>

                    <div class="profileModal">
                      <div class="profileModal-content">
                        <span class="profileModalClose">&times;</span>
                        <div class="center">
                          <header>
                            <div class="p-20t p-10b">
                                <span class="bigSaturatedText">
                                    &#128 <?php $sald = min_precision($templateParams["balance"]["Saldo"], 2);
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
                          <form action="">
                            <div class="radio-toolbar center">
                              <header class="m-10b">Ammontare</header>
                    
                              <input type="radio" id="radio1" name="radios" value="20" checked>
                              <label for="radio1">20,00&#128</label>
                            
                              <input type="radio" id="radio2" name="radios" value="50">
                              <label for="radio2">50,00&#128</label>
                            
                              <input type="radio" id="radio3" name="radios" value="100">
                              <label for="radio3">100,00&#128</label><br>

                              <input type="radio" id="radiox" name="radios" value="minimo">
                              <?php $necessario = calculateMinRecharge($templateParams["balance"]["Saldo"], $sum); ?>
                              <label id="necessarySald" class="w-90 m-10t" for="radiox">Necessario: <?php echo "$necessario &#128"; ?></label>
                            </div>
                          </form>
                            <div>
                              <header>
                                <h2 class="middleText left-text f-20">
                                  Scegli con cosa ricaricare il saldo
                                </h2>
                              </header>
                              <div>
                                  <form class="list">
                                    <div class="payments">
                                        <?php foreach($templateParams["paymentMethods"] as $pay):?>
                                            <input type="radio" id="<?php echo $pay["Numero"]?>" name="radios" value="card" checked>
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
                                    <hr class="span-order-big"></hr>
                                    <div class="center">
                                      <a href="">
                                        <button class="add-card m-10b">
                                          Aggiungi una carta
                                        </button>
                                      </a>
                                    </div>
                                  </form>
                              </div>
                            </div>
                            <input
                              type="submit"
                              class="hardButton w-75 m-10t m-20b"
                              value="Ricarica"
                            />
                        </div>
                      </div>
                    </div>
                  </span>
                </li>
                <hr class="span-order"></hr>
                <li class="m-20l m-20r">
                  <span class="center fullHeight m-0">Hai un buono sconto o un codice?</span>
                  <input class="giftcard m-10t m-20b left" type="text" placeholder="Inserisci codice">
                  <button class="insert-giftcard right m-10t m-20b">
                    ✓
                  </button>
                </li>
            </ul>
          </div>
        </div>
      </div>
