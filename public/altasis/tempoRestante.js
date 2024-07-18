function tempoRestante(id, placedAt){
    
    console.log("calculando tempo...");

    var restFinal;


    var url = "/public/altasis/timeLeft.php"

    var http = new XMLHttpRequest();

    var params = 'placed_at=' + placedAt;

    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = function () {

     if (http.readyState == 4 && http.status == 200) {
      let resposta = http.responseText;
      resposta = this.responseText;
      
      restFinal = resposta;

      console.log(restFinal);
      document.getElementById("TEMPORESTANTE"+id).innerHTML = "";
      document.getElementById("TEMPORESTANTE"+id).innerHTML = restFinal;
  
      //alert(restFinal);
      
     }
     else{
        console.log("Erro verificando tempo, consultar Altasis!");
        document.getElementById("TEMPORESTANTE"+id).innerHTML = "";
        document.getElementById("TEMPORESTANTE"+id).innerHTML = "...";
     }

    }
    http.send(params);

   
}






