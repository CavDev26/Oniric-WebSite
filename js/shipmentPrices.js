var priceOutput = document.getElementById("price");
var input = document.getElementById("mode1"); //dopo deve essere dinamico
function changeDisplayed(newprice) {
    priceOutput.innerHTML = "newprice&#128";
}

input.onchange(this.changeDisplayed(input.))
