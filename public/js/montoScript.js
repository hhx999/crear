var values = [30000,50000,80000,100000];
var input = document.getElementById('valores_monto'),
    monto_solicitado = document.getElementById('monto');

input.addEventListener('input',monto);
function monto(){
    monto_solicitado.value = values[this.value];
    console.log(monto_solicitado.value);
};