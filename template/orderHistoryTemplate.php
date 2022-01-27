      <div>
            <form action="#" method="POST" class="normal">
              <div>
                <input type="hidden" name="exit" value="1" />
                <input class="purchase-button" type="submit" value="Indietro" />
              </div>
            </form>
      </div>
        <div class="lightBack center fullWidth m-50t" >
            <div class="floatingBack inline-block m-20b mw-800 z-1">
              <?php if(isset($templateParams["erroreHistory"])): ?>
                  <h1 class="mediumTitle center"><?php echo $templateParams["erroreHistory"];?></h1>
              <?php else: ?>
                <div>
                <header class="category p-10">Dettagli Articoli- ordine:
                    <span><?php echo $templateParams["id"] ?></span>
                </header>
                <hr class="span-order"/>
                <ul class="list detail-items">
                    <li class="m-20l m-20r">
                      <ul class="list">
                        <?php foreach($templateParams["dettagliearticoli"] as $articledet): ?>
                            <li class="product-container">
                                <div class="product">
                                    <a href="<?php echo "articolo.php?id=".$articledet["ID_Articolo"] ?>"> 
                                        <img class="product-image" src="<?php echo findExtension("./img/".$articledet["Cartella_Immagini"] . "/",1); ?>" 
                                        alt="<?php echo $articledet["Nome"] ?>"/>
                                    </a>
                                    <h1 class="product-name left-text"><?php echo $articledet["Nome"] ?></h1>
                                    <hr class="span-cart">
                                    <div class="stars">
                                        <?php $n = (int) $articledet["Voto_medio"]; 
                                            for($i = 0; $i < $n; $i++):?>
                                            <img src="./img/star.png" alt="<?php echo $articledet["Voto_medio"]?>" class="star" />
                                            <?php endfor; 
                                            if ($articledet["Voto_medio"] - (float)$n >= 0.5): $n++;?>
                                            <img src="./img/halfStar.png" alt="<?php echo $articledet["Voto_medio"]?>" class="star" />
                                            <?php endif; 
                                            for($i=0; $i < 5 - $n; $i++):?>
                                            <img src="./img/emptyStar.png" alt="<?php echo $articledet["Voto_medio"]?>" class="star" />
                                        <?php endfor; ?>
                                    </div>
                                    <div class="price-section">
                                        <p class="valuta">&euro;</p>
                                        <p class="price"><?php echo min_precision((float)$articledet["Costo_listino"] - round((float)$articledet["Sconto"]*(float)$articledet["Costo_listino"]), 2); ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                    <li class="m-20l m-20r m-20b">
                      <span class="left fullHeight m-0">Costi di spedizione</span>
                      <span class="right m-0"><?php echo min_precision($articledet["Costo_Spedizione"] ,2) ?>&euro;</span><br/>
                      <hr class="span-order"/>
                    </li>
                    <li class="m-20">
                      <span class="left fullHeight total m-0">Totale</span>
                      <span class="right m-0 total-price"><?php echo min_precision(getTotalWithShipNoQ($templateParams["dettagliearticoli"], $templateParams["dettagliearticoli"][0]["Costo_Spedizione"]), 2) ?>&euro;</span><br/>
                    </li>
                </ul>
              </div>
              <hr class="span-order-big"/>
              <div>
                <header class="category m-10t">Dettagli Spedizione</header>
                <hr class="span-order"/>
                <ul class="list detail-items">
                  <li class="m-20l m-20r center">
                    <span class="w-50 fullHeight">Indirizzo di Spedizione:</span>
                  </li>
                  <li class="center m-10t m-20l m-10b">  
                    <span class="add-name">
                        <?php echo $templateParams["ordine"]["Indirizzo_Consegna"] ?>
                    </span> <br>
                    <hr class="span-order"/>
                  </li>
                  <li>
                    <span class="center">
                      Metodo di spedizione
                    </span>
                  </li>
                  <li class="m-20l m-20t m-20r center">
                    <div class="back">
                        <p class="m-0"><?php echo $templateParams["sped"]["Nome_Corriere"] ?></p>
                    </div>
                    <hr class="span-order"/>
                  </li>
                  <li class="m-20l m-20t m-20r">
                    <?php $status = $templateParams["dettagliearticoli"][0]["Status_Ordine"]; ?>
                    <button class="shipmentAccordion">
                      Status Spedizione
                    </button>
                    <div class="panelShipment">
                      <div class="accordionBackShipment">
                        <div class="left m-20l m-10t m-20r">
                          <img src="./img/orderhistory.png" class="order-span-img" alt=""/>
                        </div>
                        <div class="center m-20l m-160b">
                          <ul class="list m-20t left">
                            <li id="PresoInCarico" class="m-10b <?php if($status == "Ricevuto"){echo "statusOrderBig";} ?>">Preso in carico</li>
                            <li id="Spedito" class="m-10b" <?php if($status == "Spedito"){echo "statusOrderBig";} ?>>Spedito</li>
                            <li id="InConsegna" class="m-10b" <?php if($status == "In Consegna"){echo "statusOrderBig";} ?>>In consegna</li>
                            <li id="Consegnato" class="m-10b" <?php if($status == "Consegnato"){echo "statusOrderBig";} ?>>Consegnato</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <hr class="span-order-big"/>
              <div>
                <header class="category m-10t">Dettagli Pagamento</header>
                <hr class="span-order"/>
                <ul class="list detail-items">
                    <li class="m-20l m-20r center">
                        <span class="fullHeight">Metodo di pagamento: </span>
                        <span>Il tuo Saldo</span>
                    </li>
                    <li class="m-20l m-20r center">
                      <span class="fullHeight">Data acquisto: </span>
                      <span><?php echo $templateParams["ordine"]["Data_Acquisto"] ?></span>
                  </li>
                </ul>
              </div>
              <?php endif; ?>
            </div>
        </div>