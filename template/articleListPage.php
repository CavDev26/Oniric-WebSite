<main>
      <div class="center block fullWidth relative">
        <div class="searchResultsBack">
          <div class="relative z-1 p-20t center">
            <div class="fullWidth center">
              <div class="fullWidth inline-block center m-20t">
                <form class="wrapper"action="articleList.php" method="GET" >
                <input class="resultSearch" placeholder="Cerca qui il tuo prodotto" type="text" name="name" />
                <label class="littleSearch-icon" for="submitSearch2"><img src="./img/Search.png"/></label>
                <input class="none" type="submit" name="submitSearch2" id="submitSearch2"/>
                </form>
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
                            Tag
                          </button>
                          <div class="panel p-10r p-10l">
                            <ul class="filterList">
                                <?php $i = 0; foreach($templateParams["tags"] as $tag):?>
                              <li>
                                <label class="checkContainer p-10t">
                                  #<?php echo $tag["Nome"]; ?>
                                  <input type="checkbox" name="tag[]" value="<?php echo $tag["Nome"]; ?>" 
                                  <?php if (isset($_GET["tag"])) {if (checkForChecked($_GET["tag"], $tag["Nome"])) { echo "checked"; }}?>/>
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
                                  <input type="checkbox" name="price[]" value="1" 
                                  <?php if (isset($_GET["price"])) {if (checkForChecked($_GET["price"], 1)) {echo "checked";}}?>/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  tra 500 e 1000 €
                                  <input type="checkbox" name="price[]" value="2"
                                  <?php if (isset($_GET["price"])) {if (checkForChecked($_GET["price"], 2)) {echo "checked";}}?>/>
                                  <span class="checkmark"></span>
                                </label>
                              </li>
                              <li>
                                <label class="checkContainer p-10t">
                                  sopra 1000 €
                                  <input type="checkbox" name="price[]" value="3"
                                  <?php if (isset($_GET["price"])) {if (checkForChecked($_GET["price"], 3)) {echo "checked";}}?>/>
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
                                  <input type="checkbox" name="category[]" value="<?php echo $categoria["Nome"] ?>"
                                  <?php if (isset($_GET["category"])) {if (checkForChecked($_GET["category"], $categoria["Nome"])) {echo "checked";}}?>/>
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
                                  <input type="checkbox" name="vote[]" value="1"
                                  <?php if (isset($_GET["vote"])) {if (checkForChecked($_GET["vote"], 1)) {echo "checked";}}?>/>
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
                                  <input type="checkbox"  name="vote[]" value="2"
                                  <?php if (isset($_GET["vote"])) {if (checkForChecked($_GET["vote"], 2)) {echo "checked";}}?>/>
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
                                  <input type="checkbox"  name="vote[]" value="3"
                                  <?php if (isset($_GET["vote"])) {if (checkForChecked($_GET["vote"], 3)) {echo "checked";}}?>/>
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
                                  <input type="checkbox"  name="vote[]" value="4"
                                  <?php if (isset($_GET["vote"])) {if (checkForChecked($_GET["vote"], 4)) {echo "checked";}}?>/>
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
                                  <input type="checkbox"  name="vote[]" value="5"
                                  <?php if (isset($_GET["vote"])) {if (checkForChecked($_GET["vote"], 5)) {echo "checked";}}?>/>
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
            <?php if (isset($templateParams["errorearticolo"])) :?>
            <li class="m-20 f-24"><?php echo $templateParams["errorearticolo"];?> </li>
            <?php else: ?>
            <?php for($i = 0 ; $i < count($templateParams["articoli"]); $i++):?>
            <?php $articolo = $templateParams["articoli"][$i]; ?>
            <li class="center inline-block fullWidth">
                <div class="floatingHalf m-20b inline-block">
                <a href="articolo.php?id=<?php echo $articolo["ID_Articolo"];?>">
                <img
                    src="<?php echo findExtension("./img/" . $articolo["Cartella_immagini"], 1);?>"
                    alt="<?php echo $articolo["Nome"] . " immagine risultato" ;?>"
                    class="resultImage"
                  />
                </a>
                <h2 class="resultTitle"><?php echo $articolo["Nome"];?></h2>
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
                      <?php endif; 
                      if (is_null($articolo["Sconto"]) || $articolo["Sconto"] == 0) {echo "<br />";}
                      ?>
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
                    <form class="fullHeight">
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
                        }?></button>
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
              <div class="floatingHalf m-20b inline-block">
                <a href="articolo.php?id=<?php echo $articolo["ID_Articolo"];?>">
                <img
                    src="<?php echo findExtension("./img/" . $articolo["Cartella_immagini"], 1);?>"
                    alt="<?php echo $articolo["Nome"] . " immagine risultato" ;?>"
                    class="resultImage"
                  />
                </a>
                <h2 class="resultTitle"><?php echo $articolo["Nome"];?></h2>
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
                      <?php endif; 
                      if (is_null($articolo["Sconto"]) || $articolo["Sconto"] == 0) {echo "<br />";}
                      ?>
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
                    <form class="fullHeight">
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
                        }?></button>
                      <?php else : ?>
                        <button disabled="true" class="disabledCartResult">Accedi per aggiungere al cartello</button>
                        <?php endif; ?>
                    </form>
                  </div>
                </footer>
              </div>
            </li>
            <?php endif; endfor; endif;?>
            
          </ul>
          <?php if (!isset($templateParams["errorearticolo"])): ?>
          <footer class="resultsFooter">
            <div>
            <?php if ($_GET["pagenum"] != 1):?>
            <form class="inline-block" action="articleList.php" class="p-10r" method="GET">
                <label for="submit1"class="pageText">
                      <img src="./img/leftArrow.png" alt="" />
                </label>
                <input type="submit" class="none" id="submit1" name="submit1" value="">
                <input type="hidden" name="pagenum" value="<?php if ($_GET["pagenum"] != 1) {echo $_GET["pagenum"]-1;}?>" />
                <?php keepGetValues();?>
            </form>
            <?php endif; ?>
             <span class="pageText"><?php if ($_GET["pagenum"] > 2) {echo "...";}?></span>
             <form class="inline-block page-text" action="articleList.php" method="GET">
                <label class="pageText" for="submit2"><?php if ($_GET["pagenum"] != 1) {echo $_GET["pagenum"]-1;}?> </label>
                <input type="submit" class="none" id="submit2" name="submit2" value="">
                <input type="hidden" name="pagenum" value="<?php if ($_GET["pagenum"] > 1) {echo $_GET["pagenum"]-1;}?>" />
                <?php keepGetValues();?>
            </form>
              <a href="" class="currentPageText"><span><?php echo $_GET["pagenum"];?></span></a>
              <form class="inline-block page-text" action="articleList.php" class="pageText" method="GET">
                <label class="pageText" for="submit3"><?php if ($_GET["pagenum"] < $templateParams["pageNumber"]) {echo $_GET["pagenum"]+1;}?></label>
                <input type="submit" class="none" id="submit3" name="submit3" value="">
                <input type="hidden" name="pagenum" value="<?php if ($_GET["pagenum"] < $templateParams["pageNumber"]) {echo $_GET["pagenum"]+1;}?>" />
                <?php keepGetValues();?>
            </form>
              <span class="pageText"><?php if ($_GET["pagenum"] < $templateParams["pageNumber"]-1) {echo "...";}?></span>
              <?php if ($_GET["pagenum"] < $templateParams["pageNumber"]):?>
              <form class="inline-block" action="articleList.php" class="p-10l" method="GET">
              <label for="submit4" class="pageText"
                  ><img src="./img/rightArrow.png" alt="" />
              </label>
                <input type="submit" class="none" id="submit4" name="submit4" value="">
                <input type="hidden" name="pagenum" value="<?php if ($_GET["pagenum"] < $templateParams["pageNumber"]) {echo $_GET["pagenum"]+1;}?>" />
                <?php keepGetValues();?>
            </form>
            <?php endif; ?>
            </div>
          </footer>
          <?php endif; ?>
        </div>
    </main>