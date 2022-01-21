var priceOutput = document.getElementById("price");
var priceTotal = document.getElementById("total");
var necessarySald = document.getElementById("necessarySald");

function changeTotal(sum, shipPrice, sald) {
    total = parseFloat(sum) + parseFloat(shipPrice);
    priceTotal.innerHTML = total + "&#128";
    necessarySald.innerHTML = total - sald;
}

function getTotal(){
    return priceTotal.innerHTML;
}

function changeDisplayed(newprice) {
    priceOutput.innerHTML = newprice.toFixed(Math.max(2, (newprice.toString().split('.')[1] || []).length)) + "&#128";
}

// priceOutput.innerHTML = "10";
// // input.onchange(this.changeDisplayed(input.value));
// input.onchange( function() {
//     priceOutput.innerHTML = input.value + "&#128";
