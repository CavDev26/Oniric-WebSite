<main>
      <div class="center block fullWidth relative">
        <div class="searchResultsBack">
          <div class="relative z-1 p-20t center">
            <div class="fullWidth center">
              <div class="fullWidth inline-block center m-20t">
                <input class="resultSearch" placeholder="Search" type="text" />
                <hr class="filterSeparator inline-block" />
              </div>
            </div>
          </div>
          <div class="relative z-2 p-20t">
            <div class="filterSection">
              <button id="myBtn" class="filterButton">Filtri</button>
              <!-- The Modal -->
              <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <form class="simpleForm p-10 m-0" method="GET" action="#">
                    <input
                      type="submit"
                      value="Conferma"
                      class="wideLiteButton"
                    />
                    <ul class="filterList fullWidth left-text">
                      <li class="inline-block fullWidth">
                        <div>
                          <button type="button" class="filterAccordion">
                            Consegna
                          </button>
                          <div class="panel p-10r p-10l">
                            <ul class="filterList">
                              <li>
                                <label class="checkContainer p-10t">
                                  Domani
                                  <input type="checkbox" />
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  Dopo Domani
                                  <input type="checkbox" />
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <hr class="filterSeparator" />
                      <li class="inline-block fullWidth">
                        <div>
                          <button type="button" class="filterAccordion">
                            Tag
                          </button>
                          <div class="panel p-10r p-10l">
                            <ul class="filterList">
                                <?php foreach($templateParams["tags"] as $tag):?>
                              <li>
                                <label class="checkContainer p-10t">
                                  #<?php echo $tag["Nome"]; ?>
                                  <input type="checkbox" name="tag[]" value="<?php echo $tag["Nome"]; ?>"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <?php endforeach;?>
                              
                            </ul>
                          </div>
                        </div>
                      </li>
                      <hr class="filterSeparator" />
                      <li class="inline-block fullWidth">
                        <div>
                          <button type="button" class="filterAccordion">
                            Prezzo
                          </button>
                          <div class="panel p-10r p-10l">
                            <ul class="filterList m-10b">
                              <li>
                                <label class="checkContainer p-10t">
                                  tra 100 e 500 €
                                  <input type="checkbox" name="price[]" value="1"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  tra 500 e 1000 €
                                  <input type="checkbox" name="price[]" value="2"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  sopra 1000 €
                                  <input type="checkbox" name="price[]" value="3"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <hr class="filterSeparator" />
                      <li class="inline-block fullWidth">
                        <div>
                          <button type="button" class="filterAccordion">
                            Tipo
                          </button>
                          <div class="panel p-10r p-10l">
                            <ul class="filterList m-10b">
                                <?php foreach($templateParams["categorie"] as $categoria):?>
                              <li>
                                <label class="checkContainer p-10t">
                                  <?php echo $categoria["Nome"] ?>
                                  <input type="checkbox" name="category[]" value="<?php echo $categoria["Nome"] ?>"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <hr class="filterSeparator" />
                      <li class="inline-block fullWidth">
                        <div>
                          <button type="button" class="filterAccordion">
                            Recensioni
                          </button>
                          <div class="panel p-10r p-10l">
                            <ul class="filterList m-10b">
                              <li>
                                <label class="checkContainer p-10t">
                                  <img
                                    src="./img/star.png"
                                    alt=""
                                    class="resultStar"
                                  />
                                  5
                                  <input type="checkbox" name="vote[]" value="1"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  <img
                                    src="./img/star.png"
                                    alt=""
                                    class="resultStar"
                                  />
                                  4 o pi&ugrave;
                                  <input type="checkbox"  name="vote[]" value="1"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  <img
                                    src="./img/star.png"
                                    alt=""
                                    class="resultStar"
                                  />
                                  3 o pi&ugrave;
                                  <input type="checkbox"  name="vote[]" value="1"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  <img
                                    src="./img/star.png"
                                    alt=""
                                    class="resultStar"
                                  />
                                  2 o pi&ugrave;
                                  <input type="checkbox"  name="vote[]" value="1"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  <img
                                    src="./img/star.png"
                                    alt=""
                                    class="resultStar"
                                  />
                                  1 o pi&ugrave;
                                  <input type="checkbox"  name="vote[]" value="1"/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </form>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Ordina</button>
              <div class="dropdown-content">
                <form action="">
                  <div>
                    <input type="radio" class="none absolute" id="sort" />
                    <label for="sort">Rilevanza</label>
                  </div>
                  <div>
                    <input type="radio" class="none absolute" id="sort" />
                    <label for="sort">Prezzo (Ascendente)</label>
                  </div>
                  <div>
                    <input type="radio" class="none absolute" id="sort" />
                    <label for="sort">Prezzo (Discendente)</label>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <ul class="productList z-1 relative">
            <?php for($i = 0 ; $i < count($templateParams["articoli"]); $i++):?>
            <?php $articolo = $templateParams["articoli"][$i]; ?>
            <li class="center inline-block fullWidth">
                <a href="articolo.php?id=<?php echo $articolo["ID_Articolo"];?>">
                <div class="floatingHalf m-20b inline-block">
                <img
                    src="<?php echo findExtension("./img/" . $articolo["Cartella_immagini"], 1);?>"
                    alt="<?php echo $articolo["Nome"] . " immagine risultato" ;?>"
                    class="resultImage"
                  />
                <h2 class="resultTitle"><?php echo $articolo["Nome"];?></h2>
                </a>
                <div class="inline-block">
                  <?php $n = (int) $articolo["Voto_medio"]; 
                    for($j = 0; $j < $n; $j++):?>
                    <img src="./img/star.png" alt="" class="resultStar" />
                    <?php endfor; 
                    if ($articolo["Voto_medio"] - (float)$n >= 0.5): $n++;?>
                    <img src="./img/halfStar.png" alt="" class="resultStar" />
                    <?php endif; 
                    for($j=0; $j < 5 - $n; $j++):?>
                    <img src="./img/emptyStar.png" alt="" class="resultStar" />
                    <?php endfor; ?>
                </div>
                <section>
                  <div class="priceSection">
                    <div class="m-10">
                      <span class="<?php if (is_null($articolo["Sconto"]) || $articolo["Sconto"] == 0) 
                    { echo "none";} else { echo "saledPrice lineThroughNumber"; } ?>">
                      <?php $price = explode(".",$articolo["Costo_listino"]);
                      if (count($price) == 1) {
                        echo $price[0];
                        echo ", 00";
                      }
                      else {
                        echo $price[0];
                        echo ", ". $price[1];
                      }
                      ?>
                      &#128;</span>
                      <?php if (!is_null($articolo["Sconto"]) && $articolo["Sconto"] != 0): ?>
                      <span class="sale"> <?php echo " - ". (string) ((float)$articolo["Sconto"]*100)." &#37; "?></span>
                      <?php endif; ?>
                    </div>
                    <?php if (!is_null($articolo["Sconto"])): ?>
                    <p class="m-0 priceTitle f-20"><?php $price = explode(".",
                    (string)((float)$articolo["Costo_listino"] - round((float)$articolo["Sconto"]*(float)$articolo["Costo_listino"], 2)));
                      if (count($price) == 1) {
                        echo $price[0];
                        echo ", 00";
                      }
                      else {
                        echo $price[0];
                        echo ", ". $price[1];
                      }
                      ?></p>
                    <?php endif; ?>
                  </div>
                </section>
                <footer>
                  <div class="resultFooter">
                    <form>
                        <?php if (isUserLoggedIn()): ?>
                      <button <?php $isInTheCart = $dbh->isInTheCart($_SESSION["username"], $articolo["ID_Articolo"]); 
                      if ($isInTheCart)  
                        {
                            echo "disabled=\"true\" class=\"disabledCartResult\"";
                        } else {
                            echo "class=\"addToCart\"";
                        }
                        ?> id="<?php echo $articolo["ID_Articolo"];?>" type="button" onClick="addToCart(this, '<?php echo $articolo["ID_Articolo"]; ?>', 
                        '<?php echo findExtension("./img/".$articolo["Cartella_immagini"],1);?>')"><?php if ($isInTheCart) {
                            echo "&#10004;";
                        } else {
                            echo "";
                        }?>
                      </button>
                      <?php else : ?>
                        <button disabled="true" class="disabledCartResult">Accedi per aggiungere al cartello</button>
                        <?php endif; ?>
                    </form>
                  </div>
                </footer>
              </div>
              <?php $i++;?>
              <?php if ($i < count($templateParams["articoli"])) :?>
              <?php $articolo = $templateParams["articoli"][$i]; ?>
              <a href="articolo.php?id=<?php echo $articolo["ID_Articolo"];?>">
              <div class="floatingHalf m-20b inline-block">
                <img
                    src="<?php echo findExtension("./img/" . $articolo["Cartella_immagini"], 1);?>"
                    alt="<?php echo $articolo["Nome"] . " immagine risultato" ;?>"
                    class="resultImage"
                  />
                <h2 class="resultTitle"><?php echo $articolo["Nome"];?></h2>
              </a>
                <div class="inline-block">
                  <?php $n = (int) $articolo["Voto_medio"]; 
                    for($j = 0; $j < $n; $j++):?>
                    <img src="./img/star.png" alt="" class="resultStar" />
                    <?php endfor; 
                    if ($articolo["Voto_medio"] - (float)$n >= 0.5): $n++;?>
                    <img src="./img/halfStar.png" alt="" class="resultStar" />
                    <?php endif; 
                    for($j=0; $j < 5 - $n; $j++):?>
                    <img src="./img/emptyStar.png" alt="" class="resultStar" />
                    <?php endfor; ?>
                </div>
                <section>
                  <div class="priceSection">
                    <div class="m-10">
                      <span class="<?php if (is_null($articolo["Sconto"]) || $articolo["Sconto"] == 0) 
                    { echo "none";} else { echo "saledPrice lineThroughNumber"; } ?>">
                      <?php $price = explode(".",$articolo["Costo_listino"]);
                      if (count($price) == 1) {
                        echo $price[0];
                        echo ", 00";
                      }
                      else {
                        echo $price[0];
                        echo ", ". $price[1];
                      }
                      ?>
                      &#128;</span>
                      <?php if (!is_null($articolo["Sconto"]) && $articolo["Sconto"] != 0): ?>
                      <span class="sale"> <?php echo " - ". (string) ((float)$articolo["Sconto"]*100)." &#37; "?></span>
                      <?php endif; ?>
                    </div>
                    <?php if (!is_null($articolo["Sconto"])): ?>
                    <p class="m-0 priceTitle f-20"><?php $price = explode(".",
                    (string)((float)$articolo["Costo_listino"] - round((float)$articolo["Sconto"]*(float)$articolo["Costo_listino"], 2)));
                      if (count($price) == 1) {
                        echo $price[0];
                        echo ", 00";
                      }
                      else {
                        echo $price[0];
                        echo ", ". $price[1];
                      }
                      ?></p>
                    <?php endif; ?>
                  </div>
                </section>
                <footer>
                  <div class="resultFooter">
                    <form>
                        <?php if (isUserLoggedIn()): ?>
                      <button <?php $isInTheCart = $dbh->isInTheCart($_SESSION["username"], $articolo["ID_Articolo"]); 
                      if ($isInTheCart)  
                        {
                            echo "disabled=\"true\" class=\"disabledCartResult\"";
                        } else {
                            echo "class=\"addToCart\"";
                        }
                        ?> id="<?php echo $articolo["ID_Articolo"];?>" type="button" onClick="addToCart(this, '<?php echo $articolo["ID_Articolo"]; ?>', 
                        '<?php echo findExtension("./img/".$articolo["Cartella_immagini"],1);?>')"><?php if ($isInTheCart) {
                            echo "&#10004;";
                        } else {
                            echo "";
                        }?>
                      </button>
                      <?php else : ?>
                        <button disabled="true" class="disabledCartResult">Accedi per aggiungere al cartello</button>
                        <?php endif; ?>
                    </form>
                  </div>
                </footer>
              </div>
            </li>
            <?php endif; endfor;?>
            
          </ul>
          <footer class="resultsFooter">
            <div>
            <?php if ($_GET["pagenum"] != 1):?>
              <a href="?pagenum=<?php if ($_GET["pagenum"] != 1) {echo $_GET["pagenum"]-1;}?>" class="p-10r"
                ><span class="pageText"
                  ><img src="./img/leftArrow.png" alt="" /></span
              ></a>
            <?php endif; ?>
             <span class="pageText"><?php if ($_GET["pagenum"] > 2) {echo "...";}?></span>
              <a href="?pagenum=<?php if ($_GET["pagenum"] > 1) {echo $_GET["pagenum"]-1;}?>" class="pageText"><span><?php if ($_GET["pagenum"] != 1) {echo $_GET["pagenum"]-1;}?> </span></a>
              <a href="" class="currentPageText"><span><?php echo $_GET["pagenum"];?></span></a>
              <a href="?pagenum=<?php if ($_GET["pagenum"] < $templateParams["pageNumber"]) {echo $_GET["pagenum"]+1;}?>" class="pageText"><span><?php if ($_GET["pagenum"] < $templateParams["pageNumber"]) {echo $_GET["pagenum"]+1;}?></span></a>
              <span class="pageText"><?php if ($_GET["pagenum"] < $templateParams["pageNumber"]-1) {echo "...";}?></span>
              <?php if ($_GET["pagenum"] < $templateParams["pageNumber"]):?>
              <a href="?pagenum=<?php if ($_GET["pagenum"] < $templateParams["pageNumber"]) {echo $_GET["pagenum"]+1;}?>" class="p-10l"
                ><span class="pageText"
                  ><img src="./img/rightArrow.png" alt="" /></span
              ></a>
            <?php endif; ?>
            </div>
          </footer>
        </div>
    </main>