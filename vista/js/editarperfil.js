function editarPerfil(){
        document.getElementById("btn1").disabled=false;
        document.getElementById("btn2").disabled=false;
        document.getElementById("btn3").disabled=false;
        document.getElementById("btn4").disabled=false;

        document.getElementById("GC").style.display="block";
        document.getElementById("cancelar").style.display="block";
        document.getElementById("EP").style.display="none";
        document.getElementById("imagenPerfil").style.display="block";
}
function cancelar(){
        document.getElementById("btn1").disabled=true;
        document.getElementById("btn2").disabled=true;
        document.getElementById("btn3").disabled=true;
        document.getElementById("btn4").disabled=true;

        document.getElementById("GC").style.display="none";
        document.getElementById("cancelar").style.display="none";
        document.getElementById("EP").style.display="block";
        document.getElementById("imagenPerfil").style.display="none";
}