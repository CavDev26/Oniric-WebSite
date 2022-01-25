function addRiga(){
    var text = "<tr><th><input class=\"box-input m-10t f-14\" type=\"text\" name=\"nomeDettaglio[]\" placeholder=\"Nome Dettaglio\"/></th><td><input class=\"box-input m-10t f-14\" type=\"text\" name=\"valoreDettaglio[]\" placeholder=\"Valore Dettaglio\"/></td></tr>";
    $(".detailsTable").append(text);
}