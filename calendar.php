<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
    <meta charset="utf-8">
    <title>Calendrier plage horaire</title>
  </head>
  <body>
    <!-- ////////////////////////////////////////////////header////////////////////////////////////////////////////////////////////////-->

    <div class="head">
      <div id="logo"></div>
      <div id="titre">
        <h1>Programmer un passage</h1>
      </div>
      <div id="log">
        <ul>
          <li>Connexion</li>
          <li>S'inscrire</li>
          <li>S'abonner</li>
        </ul>
      </div>
    </div>

    <!-- ///////////////////////////////////////////////titre/////////////////////////////////////////////////////////////////////////-->
    <!-- <div class="centre">

    </div> -->
    <!-- ///////////////////////////////////////////////map  et etapes/////////////////////////////////////////////////////////////////////////-->
    <div class="content">
      <div id="carte"></div>
      <div id="etapes">
        <div id="cal">
            <div id="moisAnnee"></div>
            <div id="calendrier"></div>
        </div>
        <form id="form"></form>
      </div>
      <div id="ok"><h4>Votre demmande a bien été enregistrée</h4></div>
    </div>
    <!-- ////////////////////////////////////////////////info complementaires////////////////////////////////////////////////////////////////////////-->
  <div class="centre">
      <div id="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
  </div>


<script type="text/javascript">

    var monthNames= ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'];
    var weekDays= ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim'];
    var monthDays= [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    var now = new Date();
    var annee  = now.getFullYear();
    var mois = now.getMonth() ;
    var jour = now.getDate();
    var jourS = now.getDay();
    var firstday = new Date(annee,mois,1, 1);
    var jour1 = firstday.getDay();

    function createCalendar(){
      var calendrier = document.getElementById("calendrier");


        for(i=1;i<=35;i++){
            var days = document.createElement("div");
            days.style.display = "inline-block";
            days.id = i;
            calendrier.appendChild(days);
            days.classList.add("cadre");
            days.textContent = "_";
        }
        for(j = 1; j<= monthDays[mois];j++){
          document.getElementById(j+jour1-1).textContent = j;
          if(j == jour){
          document.getElementById(j+jour1-1).style.backgroundColor = "black";
          document.getElementById(j+jour1-1).style.color  = "white";
          }
          if(j < jour){
            document.getElementById(j+jour1-1).style.backgroundColor = "gray";
          }
          if(j> jour){
            document.getElementById(j+jour1-1).addEventListener("click", afficheForm);
          }
        }
        var month = document.createElement("h4");
        var recycle = document.createElement('img');
        recycle.src = "220px-Recycling_symbol2.svg.png";
        recycle.alt = "recycle";
        var recycle1 = document.createElement('img');
        recycle1.src = "220px-Recycling_symbol2.svg.png";
        recycle1.alt = "recycle"
        var contentMonth = document.createTextNode(monthNames[mois]);
        var contentYear = document.createTextNode(" "+annee);
        var moisAnnee =  document.getElementById("moisAnnee");
        month.appendChild(contentMonth);
        month.appendChild(contentYear);
        moisAnnee.appendChild(recycle);
        moisAnnee.appendChild(month);
        moisAnnee.appendChild(recycle1);

    }
    function afficheForm(e){

        e.target.style.backgroundColor = "green";

        var form = document.getElementById("form");
        //document.getElementById("cal").style.display ="none";
        form.innerHTML= "";
        var inputNom = document.createElement("input");
        inputNom.type = "text";
        inputNom.name = "inputNom";
        inputNom.placeholder = "Nom";
        var inputPrenom = document.createElement("input");
        inputPrenom.type = "text";
        inputPrenom.name = "inputPrenom";
        inputPrenom.placeholder = "Prenom";
        var inputMail = document.createElement("input");
        inputMail.type = "text";
        inputMail.name = "inputMail";
        inputMail.placeholder = "Mail";
        var inputAdresse = document.createElement("input");
        inputAdresse.type = "text";
        inputAdresse.name = "inputAdresse";
        inputAdresse.placeholder = "Adresse";
        var inputInfoCPT = document.createElement("input");
        inputInfoCPT.type = "text";
        inputInfoCPT.name = "inputInfoCPT";
        inputInfoCPT.placeholder = "Info complementaire";
        var validation = document.createElement("button");
        validation.type = "button";
        validation.textContent = "Valider";
        validation.addEventListener("click",afficheSucces);

        form.appendChild(inputNom);
        form.appendChild(inputPrenom);
        form.appendChild(inputMail);
        form.appendChild(inputAdresse);
        form.appendChild(inputInfoCPT);
        form.appendChild(validation);
    }
    function afficheSucces(){
      document.getElementById('etapes').style.display = "none";
      document.getElementById('ok').style.display= "block";
    }
    createCalendar();
    </script>
  </body>
</html>
