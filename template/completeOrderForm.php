      <div class="lightBack center fullWidth m-50t">
        <div class="floatingBack inline-block m-20b mw-800 z-1">
          <div>
            <?php if(isset($templateParams["erroreOrdine"])):?>
            <h1 class="mediumTitle center"><?php echo $templateParams["erroreOrdine"]; ?></h1>
            <?php else: ?>
                        <header class="category m-10t">Dettagli Articoli</header>
                      <hr class="span-order"/>
                      <ul class="list detail-items">
                          <li class="m-20l m-20r">
                            <span class="left fullHeight m-0">Articoli</span>
                            <?php $sum = min_precision(getTotalPrices($templateParams["articles"], $templateParams["quantities"]), 2)?>
                            <span class="right m-0"><?php echo "$sum&euro; " ?></span><br/>
                          </li>
                          <li class="m-20l m-20r m-20b">
                            <span class="left fullHeight m-0">Costi di spedizione</span>
                            <span class="right m-0" id="price">--</span><br/>
                          </li>
                          <hr class="span-order"/>
                          <li class="m-20">
                            <span class="left fullHeight total m-0">Totale</span>
                            <span id="total" class="right m-0 total-price">--</span><br/>
                          </li>
                      </ul>
                    </div>
                    <hr class="span-order-big"/>
                    <div>
                      <form action="#" class="list" method="POST">
                        <header class="category m-10t">Dettagli Spedizione</header>
                        <hr class="span-order"/>
                        <ul class="list detail-items">
                          <li class="m-20l m-20r">
                            <span class="center w-50 fullHeight">Invia a:</span>
                          </li>
                          <li class="m-10t">
                            <button type="button" class="profileAccordion address">
                              <span>Scegli indirizzo</span>
                            </button>
                            <div class="panel">
                              <div class="accordionBack">
                                <div class="radio-addr">
                                    <?php foreach($templateParams["addresses"] as $addr):?>
                                    <input type="radio" id="<?php echo $addr["Via"].$addr["Numero_civico"] ?>" name="addr" value="<?php echo $addr["Via"].$addr["Numero_civico"] ?>" onClick="checkIfPurchasable(<?php echo $templateParams["balance"]["Saldo"] ?>)"/>
                                    <label for="<?php echo $addr["Via"].$addr["Numero_civico"] ?>">
                                      <div class="pls">
                                        <p class="m-0 add-name"><?php echo $templateParams["namesurname"]["Nome"]; echo " "; echo $templateParams["namesurname"]["Cognome"];  ?><br></p>
                                        <?php echo $addr["Via"] ?> <?php echo $addr["Numero_civico"] ?><br>
                                        <?php echo $addr["Citta"] ?>
                                      </div>
                                    </label>
                                    <hr class="span-order-big"/>
                                    <?php endforeach ?>
                                    <input type="radio" id="nuovoAdd" name="addr" value="" onClick="checkIfPurchasableAndChangeID(<?php echo $templateParams["balance"]["Saldo"] ?>)"/>
                                    <div class=" center pls">
                                      <label for="nuovoAdd" class="addressLabel">  
                                          <input class="addressInputNew" id="nuovoInserito" type="text" placeholder="inserisci Via e Numero Civico">
                                      </label>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <hr class="span-order"/>
                          <li>
                            <span class="center">
                              Metodo di spedizione
                            </span>
                          </li>
                          <li class="m-20l m-20t m-20r">
                            <button type="button" class="shipmentAccordion">
                              Scegli metodo
                            </button>
                            <div class="panelShipment">
                                <div class="accordionBackShipment">
                                        <div class="radio-ship">
                                            <?php foreach($templateParams["shipmentMethods"] as $ship):?>
                                                <?php $Tariffa = min_precision($ship["Tariffa"], 2) ?>
                                                <input
                                                onClick="changeTotalAndPurchasable(<?php echo min_precision($sum, 2); ?>, <?php echo $Tariffa; ?>, <?php echo $templateParams["balance"]["Saldo"] ?>)"
                                                onchange="changeDisplayed(<?php echo $Tariffa; ?>);" type="radio" id="<?php echo $ship["ID_Tipo_Sped"] ?>" name="ship-meth" value="<?php echo $ship["ID_Tipo_Sped"]; ?>"/>
                                                <label class="m-10t" for="<?php echo $ship["ID_Tipo_Sped"] ?>">
                                                <div class="pls">
                                                    <p class="center"><?php echo $ship["Nome_Corriere"]; ?><?php echo "  ($Tariffa&euro;)"; ?></p>
                                                </div>                   
                                                </label>
                                                <hr class="span-order-big"/>
                                            <?php endforeach; ?>
                                        </div>
                                </div>
                            </div>
                          </li>
                          <hr class="span-order"/>
                          <li class="m-20l m-20r m-20b">
                            <span class="left">
                              Spedizione prevista:
                            </span><br>
                            <span class="right m-10b m-10t consegna">
                              <?php 
                              $datetime = new DateTime('tomorrow');
                              echo $datetime->format("l, d/m/Y");
                              ?>
                            </span>
                          </li>
                          <li>
                          <input id="purchaseSubmit" type="submit" class="purchase-button o-05" value="Acquista" disabled>
                          </input>
                          <?php foreach($templateParams["quantities"] as $q): ?>
                            <input type="hidden" name="quantity[]" value="<?php echo $q ?>"/>
                          <?php endforeach; ?>
                          </li>
                        </ul>
                      </form>
                    </div>
                    <hr class="span-order-big"/>
                    <div>
                      <header class="category m-10t">Dettagli Pagamento</header>
                      <hr class="span-order"/>
                      <ul class="list detail-items">
                          <li class="m-20l m-20r">
                            <span class="center fullHeight">Metodo di pagamento</span><br>
                            
                            <div>
                              <div class="back m-10t">
                                <span>
                                  Il tuo saldo:
                                </span>
                                <span class="bigSaturatedText">
                                      &euro; <?php $sald = min_precision($templateParams["balance"]["Saldo"], 2);
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
                                              &euro; <?php $sald = min_precision($templateParams["balance"]["Saldo"], 2);
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
                                        <?php foreach($templateParams["quantities"] as $q): ?>
                                          <input type="hidden" name="quantity[]" value="<?php echo $q ?>"/>
                                        <?php endforeach; ?>
                                      <div class="radio-toolbar center">
                                        <header class="m-10b">Ammontare</header>

                                        <input type="radio" id="radio1" name="valore" value="20" onclick="checkIfRechargeable()">
                                        <label for="radio1">20,00&euro;</label>
                                      
                                        <input type="radio" id="radio2" name="valore" value="50" onclick="checkIfRechargeable()">
                                        <label for="radio2">50,00&euro;</label>
                                      
                                        <input type="radio" id="radio3" name="valore" value="100" onclick="checkIfRechargeable()">
                                        <label for="radio3">100,00&euro;</label><br>

                                        <?php $necessario = calculateMinRecharge($templateParams["balance"]["Saldo"], $sum); ?>
                                        <input type="radio" id="radiox" name="valore" value="<?php echo $necessario;?>" onclick="checkIfRechargeable()">
                                        <label id="necessarySald" class="w-90 m-10t" for="radiox">Necessario: <?php echo $necessario; ?>&euro</label>
                                      </div>
                                      <div>
                                        <header>
                                          <h2 class="middleText f-20">
                                            Scegli con cosa ricaricare il saldo
                                          </h2>
                                        </header>
                                        <div>
                                          <div class="payments">
                                                  <?php foreach($templateParams["paymentMethods"] as $pay):?>
                                                      <input type="radio" id="<?php echo $pay["Numero"]?>" name="card" value="card" onclick="checkIfRechargeable()">
                                                      <div class="pls m-10b">
                                                        <label for="<?php echo $pay["Numero"]?>">
                                                            <img class="left" src="./img/visaLogo.png" alt="Immagine carta"/>
                                                            <p class="center m-0">
                                                                <?php echo $pay["Nome"] ?> <br>
                                                                <?php for($i = 0; $i < strlen((string)$pay["Numero"])-2; $i++) {echo "●";} 
                                                                echo substr((string)$pay["Numero"], -2); ?>
                                                            </p>
                                                        </label>
                                                      </div>
                                                      <hr class="span-order-big"/>
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

                                      <form action="./payMethods.php" method="POST">
                                        <input
                                          type="submit"
                                          class="hardButton w-75 m-10t m-20b"
                                          name="completeOrder"
                                          value="Modifica metodi di Pagamento"
                                        />
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <hr class="span-order"/>
                          <li class="m-20l m-20r">
                            <span class="center fullHeight m-0">Hai un buono sconto o un codice?</span>
                            <input class="giftcard m-10t m-20b left" type="text" placeholder="Inserisci codice">
                            <button class="insert-giftcard right m-10t m-20b">
                              &#10004;
                            </button>
                          </li>
                      </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
