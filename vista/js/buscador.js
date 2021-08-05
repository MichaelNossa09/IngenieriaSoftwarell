var nombre = null;

function Buscar(){
    nombre = document.getElementsByName("NOMBRE")[0].value;
    if(nombre != ""){
        document.getElementById("pelis").innerHTML ="HOLA";
    }
}