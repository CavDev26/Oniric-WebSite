<div class="m-50t">
    <form method="POST" action="#">
        <input type="submit" value="Indietro" name="exit" class="purchase-button" />
    </form>
</div>
<div class="lightBack center fullWidth">
    <div class="floatingBack inline-block m-20b mw-800 z-1">
        <header class="category p-10">I tuoi acquisti</header>
        <hr class="span-order"/>
        <?php if (isset($templateParams["nessunacquisto"])): ?>
            <h1 class="mediumTitle center"><?php echo $templateParams["nessunacquisto"]?></h1>
        <?php else: ?>
            <ul class="list">
                <?php foreach($templateParams["datiOrdine"] as $element): ?>
                    <li class="product-container">    
                        <a href="<?php echo "orderHistory.php?id=".$element["ID_Ordine"] ?>">
                            <div class="product">
                                <img class="product-image" src="<?php echo findExtension("./img/".$element["Cartella_immagini"] . "/",1); ?>" 
                                alt="Immagine prodotto"/>
                                <h1 class="product-name left-text">Ordine: <span><?php echo $element["ID_Ordine"]; ?></span></h1>
                                <hr class="span-cart">
                                    <div class="articolo">
                                        <span class="limit-text"><?php echo $element["Nome"]; ?></span>
                                    </div>
                                <div class="status-consegna">
                                    <span>Status spedizione:</span>
                                    <span class="status-text"><?php echo $element["Status_Ordine"]; ?></span>
                                </div>
                                <div class="price-section">
                                    <span></span>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
