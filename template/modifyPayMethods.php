<main class="fullHeight">
    <div class="centered">
      <form method="POST" action="#">
          <input type="submit" value="Indietro" name="exit" class="purchase-button" />
    </form>
    </div>

    <div class="lightBack center">
      <div class="floatingBack inline-block m-20b fullWidth mw-800">
        <header>
          <h1 class="title">Gestisci le tue carte</h1>
        </header>
        <hr class="span-accordion"></hr>
        <aside class="center">
          <div>
          <ul class="accordionList list left-text m-20l">
            <?php foreach($templateParams["payMethods"] as $payMethod): ?>
            <li>
                <div class="paymentMethod w-75 inline-block">
                    <h3 class="m-0 right w-60 center f-16 p-10b">
                        <?php echo $payMethod["Nome"]; ?>
                    </h3>
                    <img
                        src="./img/visaLogo.png"
                        class="left p-10t littlePaymentIcon"
                    />
                    <p class="w-68 right m-0 center f-14 lh-10">
                        <?php for($i = 0; $i < strlen((string)$payMethod["Numero"])-2; $i++) {echo "●";} 
                              echo substr((string)$payMethod["Numero"], -4); ?>
                    </p>
                </div>
                <button class="inline-block right modalModify m-10b m-20t w-90"><img class="simplePencil" src="./img/pencil.png" alt=""></button>
                <div class="profileModal center">
                <div class="profileModal-content">
                    <span class="profileModalClose">&times;</span>
                    <form action="#" method="POST">
                        <input type="hidden" value="<?php echo $payMethod["Nome"]?>" name="modifyMethod" />
                        <div class="simpleForm p-20t m-20l">
                        <div class="left p-10l p-10r">
                            <label for="mname" class="form-label lh-20 f-15 ">Modifica Nome del Metodo di Pagamento</label><br />
                            <input
                            class="box-input m-10t f-14"
                            type="text"
                            id="mname"
                            name="mname"
                            placeholder="(Es. Carta Personale)"
                            value="<?php echo $payMethod["Nome"]; ?>"
                            required
                            />
                        </div>
                        <div class="left p-10l p-10r">
                            <label for="mnumber" class="form-label">Numero Carta</label><br />
                            <input
                            class="box-input"
                            type="text"
                            id="mnumber"
                            name="mnumber"
                            placeholder="•••• •••• •••• ••••"
                            value="<?php echo $payMethod["Numero"]; ?>"
                            required
                            />
                        </div>
                        <div class="left p-10l p-10r inline">
                            <label for="mscadenza" class="form-label inline-block w-30 lh-20 p-20t left">Scadenza</label><br />
                            <label for="mcircuit" class="form-label inline-block right w-30 lh-20 ">Circuito Pagamento</label><br />
                            <input
                            class="box-input inline-block w-30 m-10t left"
                            type="text"
                            id="mscadenza"
                            name="mscadenza"
                            value="<?php echo date("y"); ?>"
                            required 
                            />
                            <input
                            class="box-input inline-block w-30 m-10t p-10r right"
                            type="text"
                            id="mcircuit"
                            name="mcircuit"
                            value="<?php echo $payMethod["Circuito_pagamento"]; ?>"
                            required
                            />
                        </div>
                        </div>
                        <div class="inline-block fullWidth">
                            <input class="save-button" type="submit" value="Salva modifiche">
                        </div>
                    </form>
                    <footer class="fullWidth center">
                        <button class="remove-method m-0">Elimina <img src="./img/trash.png" alt="" class="trash-img"/></button>
                        <div class="profileModal center">
                            <div class="profileModal-content">
                                <span class="profileModalClose">&times;</span>
                                <form action="#" class="simpleForm p-20t m-20l" method="POST">
                                    <input type="hidden" value="<?php echo $payMethod["Nome"]?>" name="deleteMethod" />
                                    <div class="center">
                                        <label for="Sure" class="form-label inline-block lh-20">Sei sicuro di voler rimuovere il metodo di pagamento?</label><br />
                                    </div>
                                    <div class="inline-block fullWidth m-20t">
                                        <input class="hardButton" type="submit" value="Conferma" />
                                        <button class="hardButton m-10t" type="button"onClick="closeModal(this)">Annulla</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </footer>
                    </div>
                </div>
            </li>
          <?php endforeach; ?>
          </ul>
          </div>
          <div class="center">
            <button class="modalButton paymentMethod m-10b m-20t w-90">Aggiungi Metodo di Pagamento</button>
            <div class="profileModal">
              <div class="profileModal-content">
                <span class="profileModalClose">&times;</span>
                <form action="#" class="simpleForm p-20t m-20l" method="POST">
                    <input type="hidden" value="1" name="insertMethod" />
                  <div class="left p-10l p-10r">
                    <label for="name" class="form-label lh-20 f-15 ">Inserisci il Nome del Metodo di Pagamento</label><br />
                    <input
                      class="box-input m-10t f-14"
                      type="text"
                      id="name"
                      name="name"
                      placeholder="(Es. Carta Personale)" required
                    />
                  </div>
                  <div class="left p-10l p-10r">
                    <label for="number" class="form-label">Numero Carta</label><br />
                      <input
                      class="box-input"
                      type="text"
                      id="number"
                      name="number"
                      placeholder="•••• •••• •••• ••••" required /> 
                  </div>
                  <div class="left p-10l p-10r inline">
                    <label for="scadenza" class="form-label inline-block w-30 lh-20 p-20t left">Scadenza</label><br />
                    <label for="circuit" class="form-label inline-block right w-50 lh-20 ">Circuito di Pagamento</label><br />
                    <input
                      class="box-input inline-block w-30 m-10t left"
                      type="text"
                      id="scadenza"
                      name="scadenza" value="<?php echo date("y"); ?>"required />
                    <input
                      class="box-input inline-block w-30 m-10t p-10r right"
                      type="text"
                      id="circuit"
                      name="circuit" required />
                    </input>
                  </div>
                <footer class="center">
                  <div class="center">
                    <input class="hardButton m-10b m-20t w-90" type="submit" value="Aggiungi Metodo di Pagamento">
                  </div>
                </footer>
              </form>
            </div>
          </div>
        </div>
        </aside>
      </div>
    </div>
  </main>