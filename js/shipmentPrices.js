var priceOutput = document.getElementById("price");
var priceTotal = document.getElementById("total");
var necessarySald = document.getElementById("necessarySald");
var radioInputNec = document.getElementById("radiox");

var qauntityInput = document.getElementsByName("valore");
var cardInput = document.getElementsByName("card");
var submitRecharge = document.getElementById("submitRecharge");

var addrInput = document.getElementsByName("addr");
var shipInput = document.getElementsByName("ship-meth");
var purchaseSubmit = document.getElementById("purchaseSubmit");


function changeTotal(sum, shipPrice, sald) {
    total = parseFloat(sum) + parseFloat(shipPrice);
    priceTotal.innerHTML = total + "&#128";
    if( sald >= total ) {
        necessarySald.innerHTML = "Necessario: 0.00&#128";
        radioInputNec.value = 0.00;
    } else {
        necessarySald.innerHTML = total - sald;
        radioInputNec.value = total - sald;
    }
}

function getTotal(){
    return priceTotal.innerHTML;
}

function changeDisplayed(newprice) {
    priceOutput.innerHTML = newprice.toFixed(Math.max(2, (newprice.toString().split('.')[1] || []).length)) + "&#128";
}

function checkIfRechargeable() {
    rechargeableCard = false;
    rechargeableQuantity = false;
    if (cardInput.length > 0) {
        cardInput.forEach(element => {
            if(element.checked == true) {
                rechargeableCard = true;
            }
        });
        qauntityInput.forEach(element => {
            if(element.checked == true) {
                rechargeableQuantity = true;
            }
        });
    }
    if (rechargeableQuantity == true && rechargeableCard == true) {
        submitRecharge.disabled = false;
        submitRecharge.value= "Ricarica";
        submitRecharge.style.opacity = "1";
    }
}

function changeTotalAndPurchasable(sum, shipPrice, sald){
    this.changeTotal(sum, shipPrice, sald);
    this.checkIfPurchasable();
}
function checkIfPurchasable() {
    addr = false;
    ship = false;
    if (addrInput.length > 0) {
        addrInput.forEach(element => {
            if(element.checked == true) {
                addr = true;
            }
        });
        shipInput.forEach(element => {
            if(element.checked == true) {
                ship = true;
            }
        });
    }
    if (addr == true && ship == true) {
        purchaseSubmit.disabled = false;
        purchaseSubmit.style.opacity = "1";
    }
}
