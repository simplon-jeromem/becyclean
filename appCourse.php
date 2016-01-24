<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

	<head>
		<link rel="stylesheet" href="styleCoursier.css" media="screen" title="no title" charset="utf-8">
    <title>App coursier</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			function initialiser() {
				var latlng = new google.maps.LatLng(45.7701052,4.8088019);
				
				var options = {
					center: latlng,
					zoom: 19,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var requete2 = new XMLHttpRequest();
			requete2.onload = iternaire;
        requete2.open("POST","requete.php",true);
        requete2.send();
                function iternaire(){
        var data2 = JSON.parse(this.responseText);
                    
                    direction = new google.maps.DirectionsRenderer({
    map   : carte, 
    panel : panel 
});
                     var request = {
            origin      : data2[0].adresse,
            destination : data2[1].adresse,
            travelMode  : google.maps.DirectionsTravelMode.BICYCLING // Type de transport
        }
        var directionsService = new google.maps.DirectionsService(); // Service de calcul d'itinéraire
        directionsService.route(request, function(response, status){ // Envoie de la requête pour calculer le parcours
            if(status == google.maps.DirectionsStatus.OK){
                direction.setDirections(response); // Trace l'itinéraire sur la carte et les différentes étapes du parcours
            }
        });
                }
				var carte = new google.maps.Map(document.getElementById("carte"), options);
			}
		</script>
         <style media="screen">
      #timer{
        border: solid black 1px;
        border-radius: 3px;
        margin-left: 10px;
      }
    </style>
	</head>

	<body onload="initialiser()">
        <ul id="liste"></ul>
        <div id="panel"></div>
		<div id="carte" style="width:50%; height:50%"></div>
	</body>
</html>
    <script type="text/javascript">
      var requete = new XMLHttpRequest();
        
      var compteARebour;
       
        
      function courseTimer(a,b){
        var minutes = a;
        var secondes = b;
        document.getElementById("timer").style.backgroundColor = "white";
        document.getElementById("timer").style.color = "black";
        compteARebour = setInterval(function(){
          if(minutes >= 10 && secondes >= 10){
            document.getElementById("timer").textContent = minutes+":"+secondes;
          }
          else if(minutes >= 10 && secondes < 10){
            document.getElementById("timer").textContent = minutes+":"+"0"+secondes;
          }
          else if(minutes < 10 && secondes >= 10){
            document.getElementById("timer").textContent = "0"+minutes+":"+secondes;
          }
          else if(minutes < 10 && secondes < 10){
            document.getElementById("timer").textContent = "0"+minutes+":"+"0"+secondes;
          }
          if(minutes < 3){
            document.getElementById("timer").style.backgroundColor = "red";
          }
          secondes--;
          if(secondes === -1 && minutes > 0){
            minutes--;
            secondes = 59;
          }
          else if(secondes === -1 && minutes === 0){
            clearInterval(compteARebour);
          }
        }, 1000);
      }

      function chargementClients(){
        requete.onload = affichage;
        requete.open("POST","requete.php",true);
        requete.send();
      }
      function affichage(){
        console.log(this.responseText);
        var data = JSON.parse(this.responseText);
        var ul = document.getElementById("liste");
        ul.innerHTML ="";
        if(data.length >= 5){
          for(i = 0;i<= 4; i++){
            if(i === 0){
              var itemListe = document.createElement("li");
              var supp = document.createElement("button");
              supp.textContent = "Enlevement terminé";
              supp.addEventListener("click",suppClient);
              supp.setAttribute('data-id',data[i].id);
              var timer = document.createElement("div");
              timer.id = "timer";
              timer.style.display= "inline-block";
              var contentListe = document.createTextNode(data[i].nom+" "+data[i].prenom);
              var listeComp = document.createElement("ul");
              var itemListeComp1 = document.createElement("li");
              var itemListeComp2 = document.createElement("li");
              var itemListeComp3 = document.createElement("li");
              var contentListeAdresse = document.createTextNode(data[i].adresse);
              var contentListeMail =  document.createTextNode(data[i].mail);
              var contentListeInfoCpt = document.createTextNode(data[i].infoSupp);
              ul.appendChild(itemListe);
              itemListe.appendChild(contentListe);
              itemListe.appendChild(supp);
              itemListe.appendChild(timer);
              itemListe.appendChild(listeComp);
              listeComp.appendChild(itemListeComp1);
              listeComp.appendChild(itemListeComp2);
              listeComp.appendChild(itemListeComp3);
              itemListeComp1.appendChild(contentListeAdresse);
              itemListeComp2.appendChild(contentListeMail);
              itemListeComp3.appendChild(contentListeInfoCpt);

            }
            else if(i >= 1){
              var itemListe = document.createElement("li");
              var contentListe = document.createTextNode(data[i].nom+" "+data[i].prenom);
              ul.appendChild(itemListe);
              itemListe.appendChild(contentListe);
            }
          }
        }
        else if(data.length < 5){
          for(i = 0;i<= data.length-1; i++){
            if(i === 0){
              var itemListe = document.createElement("li");
              var supp = document.createElement("button");
              supp.textContent = "Enlevement terminé";
              supp.addEventListener("click",suppClient);
              supp.setAttribute('data-id',data[i].id);
              var timer = document.createElement("div");
              timer.id = "timer";
              timer.style.display= "inline-block";
              var contentListe = document.createTextNode(data[i].nom+" "+data[i].prenom);
              var listeComp = document.createElement("ul");
              var itemListeComp1 = document.createElement("li");
              var itemListeComp2 = document.createElement("li");
              var itemListeComp3 = document.createElement("li");
              var contentListeAdresse = document.createTextNode("-"+data[i].adresse);
              var contentListeMail =  document.createTextNode("-"+data[i].mail);
              var contentListeInfoCpt = document.createTextNode("-"+data[i].infoSupp);
              ul.appendChild(itemListe);
              itemListe.appendChild(contentListe);
              itemListe.appendChild(supp);
              itemListe.appendChild(timer);
              ul.appendChild(listeComp);
              listeComp.appendChild(itemListeComp1);
              listeComp.appendChild(itemListeComp2);
              listeComp.appendChild(itemListeComp3);
              itemListeComp1.appendChild(contentListeAdresse);
              itemListeComp2.appendChild(contentListeMail);
              itemListeComp3.appendChild(contentListeInfoCpt);

            }
            else if(i >= 1){
              var itemListe = document.createElement("li");
              var contentListe = document.createTextNode(data[i].nom+" "+data[i].prenom);
              ul.appendChild(itemListe);
              itemListe.appendChild(contentListe);
            }
          }
        }
        clearInterval(compteARebour);
        courseTimer(14,59);
      }

      function suppClient(e){
          console.log("id : "+e.target.getAttribute("data-id"));
          requete.onload = affichage;
          requete.open("POST","requete.php",true);
          requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          requete.send("access=1&id="+e.target.getAttribute("data-id"));
      }
         
      chargementClients();
       
        
    
    </script>
  </body>
</html>
