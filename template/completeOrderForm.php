<main class="fullHeight">
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
                  <?php $sum = getTotalPrices($templateParams["articles"])?>
                  <span class="right m-0"><?php echo "$sum&#128" ?></span><br/>
                </li>
                <li class="m-20l m-20r m-20b">
                  <span class="left fullHeight m-0">Costi di spedizione</span>
                  <!--  DA FARE IN JS, ONCHANGE CHE PRENDE IN INPUT I COSTI DELLA TARIFFA CON PHP
                        in base quindi a quello che seleziono con la radiobox      
                  -->

                    
                  <span class="right m-0" id="price"></span><br/>
                </li>
                <hr class="span-order"></hr>
                <li class="m-20">
                  <span class="left fullHeight total m-0">Totale</span>
                  <span class="right m-0 total-price">999,99$</span><br/>
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
                        <input type="radio" id="add1" name="radios" value="address"/>
                        <label for="add1">
                          <div class="pls">
                            <p class="m-0 add-name">Lorenzo Cavallucci<br></p>
                            Via San Gimignano 369<br>
                            Cesena, FC, Italia.
                          </div>
                        </label>
                        <hr class="span-order-big"></hr>
                        <input type="radio" id="add2" name="radios" value="address"/>
                        <label for="add2">
                          <div class="pls">
                            <p class="m-0 add-name">Lorenzo Cavallucci<br></p>
                            Via San Gimignano 369<br>
                            Cesena, FC, Italia.
                          </div>
                        </label>
                        <hr class="span-order-big"></hr>
                        <input type="radio" id="add3" name="radios" value="address"/>
                        <label for="add3">
                          <div class="pls">
                            <p class="m-0 add-name">Lorenzo Cavallucci<br></p>
                            Via San Gimignano 369<br>
                            Cesena, FC, Italia.
                          </div>
                        </label>
                      </div>
                      <hr class="span-order-big"></hr>
                      <div class="center">
                        <a href="">
                          <button class="add-add hardButton">
                            Aggiungi indirizzo
                          </button>
                        </a>
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
                        <input type="radio" id="mode1" name="radios" value="mode" checked>
                        <label class="m-10t" for="mode1">
                          <div class="pls">
                            <img class="left ship-img-omni m-20r" src="../img/logo-oniric.png" alt=""/>
                            <p class="center">Omni</p>
                          </div>                   
                        </label>
                        <hr class="span-order-big"></hr>
                        <input type="radio" id="mode2" name="radios" value="mode">
                        <label for="mode2">
                          <div class="pls">
                            <p>Normale</p>
                          </div>                   
                        </label>
                        <hr class="span-order-big"></hr>
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
                  Domani, 26 Gennaio 2021.
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
                      <span class="accent">
                        0,00€
                      </span>
                    </div>
                    <button class="modalButton">Ricarica</button>

                    <div class="profileModal">
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
                            <div class="radio-toolbar center">
                              <header class="m-10b">Ammontare</header>
                    
                              <input type="radio" id="radio1" name="radios" value="20" checked>
                              <label for="radio1">20,00&#128</label>
                            
                              <input type="radio" id="radio2" name="radios" value="50">
                              <label for="radio2">50,00&#128</label>
                            
                              <input type="radio" id="radio3" name="radios" value="100">
                              <label for="radio3">100,00&#128</label><br>

                              <input type="radio" id="radiox" name="radios" value="minimo" checked>
                              <label class="w-90 m-10t" for="radiox">Necessario: 99,00&#128</label>
                            </div>

                            <div>
                              <header>
                                <h2 class="middleText left-text f-20">
                                  Scegli con cosa ricaricare il saldo
                                </h2>
                              </header>
                              <div>
                                  <form class="list">
                                    <div class="payments">
                                      <input type="radio" id="card1" name="radios" value="card" checked>
                                      <label for="card1">
                                        <div class="pls m-10b">
                                          <img class="left" src="../img/visaLogo.png" alt=""/>
                                          <p class="center m-0">
                                            Mastercard <br>
                                            •••• •••• •••• 0765
                                          </p>
                                        </div>                          
                                      </label>
                                      <hr class="span-order-big"></hr>

                                      <input type="radio" id="card2" name="radios" value="card">
                                      <label for="card2">
                                        <div class="pls m-10b">
                                          <img class="left" src="../img/visaLogo.png" alt=""/>
                                          <p class="center m-0">
                                            Mastercard <br>
                                            •••• •••• •••• 0765
                                          </p>
                                        </div>                          
                                      </label>
                                      <hr class="span-order-big"></hr>

                                      <input type="radio" id="card3" name="radios" value="card">
                                      <label for="card3">
                                        <div class="pls m-10b">
                                          <img class="left" src="../img/visaLogo.png" alt=""/>
                                          <p class="center m-0">
                                            Mastercard <br>
                                            •••• •••• •••• 0765
                                          </p>
                                        </div>                          
                                      </label>
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
                          </form>
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
</main>