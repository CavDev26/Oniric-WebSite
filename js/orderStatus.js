var status1 = document.getElementById("PresoInCarico");
var status2 = document.getElementById("Spedito");
var status3 = document.getElementById("InConsegna");
var status4 = document.getElementById("Consegnato");

    function changeStatus(expr){
        switch (expr) {
            case 'Ricevuto':
                status1.classList.add("statusOrderBig");
                break;
            case 'Spedito':
                status2.classList.add("statusOrderBig");
                break;
            case 'InConsegna':
                status3.classList.add("statusOrderBig");
                 break;
            case 'Consegnato':
                status4.classList.add("statusOrderBig");
            default:
        }
    }