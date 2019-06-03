var conta = 0;
function calcular() {
    cont = document.getElementById('contador').value;
        for (var i = 1; i <= cont; i++) {
        var cantidad = Number(document.getElementById('cant'+i).value);
        var vuni = Number(document.getElementById('vuni'+i).value);
        var vtot = cantidad * vuni;
      
        document.getElementById('valortotal'+i).value =  vtot;
        conta += vtot;
        
    }
    iva = (conta * 12) / 100;
    total = conta + iva;
    document.getElementById('subtotal').value = conta;
    document.getElementById('iva').value = iva;
    document.getElementById('totalpagar').value = total;

}