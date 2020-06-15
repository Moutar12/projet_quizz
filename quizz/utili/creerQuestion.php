<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylecss/style.css">
    <title>CreerQuestion</title>
</head>
<body>

 
<div class="div1 ">
    <div class="parametre">PARAMÉTRER VOTRE QUESTION</div>

    <div class="form" >
    <form action="" id="ajout_question" method="post">
    <div class="question">
    <label for="Question">Question</label>
    <textarea name="question" id="question"class="form-control w-50"  rows="3"></textarea><br>
    <span id="pas_de_question"></span>
    </div>


    <div class="nbrepoint">
    <label for="Nbre de points">Nbres de points</label>
   <select name="score" id="score">
   <option ></option>
   <option >1</option>
   <option >2</option>
   <option>3</option>
   <option >4</option>
   <option >5</option>
   <option >6</option>
   <option>7</option>
   <option >8</option>
   <option >9</option>
   <option >10</option>
   </select>
    </div>



    <div  id="reponse">
    <label for="type de reponse" class="label">Type de reponse</label>
    <div id="row_0">
    <select class="form-control w-25 position-relative" name="choix_de_reponse" id="choix_de_reponse" >
    <option value="defaut">Donnez le type de réponse</option>
    <option value="texte">Type Texte</option>
    <option value="multiple">Type Multiple</option>
    <option value="simple">Type Simple</option>
    </select>
    <button type="button" id="ajoute" class="btn border-primary">
        <img src="../stylecss/ic-ajout.png" alt="">
    </button>
    </div>
    
    <div class="champ" id="champ">
    
    
    
    </div>
    <button type="submit" class="btn" name="Enregistrer" id="enregistrer">Enregistrer</button >

    </form>
    </div>
    </div>
   
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>




<script>


function ajoutChamp(choix,i){
    let radio = `<div class="row"><span>${i}Reponse </span><input class="form-control w-25 mt-3 mr-2" type="text" name="tab[]" id="r_${i}">`
        radio+=`<input type="radio" name="rep[]" id="on_${i}" class="p-5 mt-4 ml-4" >`;
        radio+=`<button  type="button" id="delete" class="btn  mt-1 col-1 " onclick="Delete($(this))"><span class=" fa fa-archive col mr-10 "></span> <img src="../stylecss/ic-supprimer.png" alt=""> </button></div>`;

    let check = `<div class="row"><span>Reponse ${i}</span><input class="form-control w-25 ml-2" type="text" name="tab[]" id="r_${i}">`
        check +=`<input type="checkbox" name="rep[]" id="on_${i}" class="custom-control ml-2">`;
        check +=`<button type="button" id="delete"  class="btn  mt-1 col-1" onclick="Delete($(this))"><span class=" col mr-10"></span> <img src="../stylecss/ic-supprimer.png" alt=""></button></div>`;
        
    let texte= `<div class="row"><span>Reponse</span><textarea class="form-control w-25" rows="${1}" cols="${25}" name="reponse"       id="reponse"></textarea>`;
        texte += `<button id="delete" type="button" id="delete" class="btn btn-danger col-1  mt-1 ml-1" onclick="Delete($(this))"><span class=" fa fa-archive col mr-10 "></span> <img src="../stylecss/ic-supprimer.png" alt=""></button></div>`;

    if(choix == "simple")  {  return radio }
    if(choix == "multiple"){  return check }
    if(choix =="texte" && (i==1)) {return texte} 
}
///delete champ
function Delete(sup){
    sup.parent().remove();
}
// jquery
var choix = "";
    var i = 0;
    var champ = $("#champ")
    $( "select" ).change(function () {
        i=1
        
        $( "select option:selected" ).each(function() {
        choix = $( this ).val();
        
        })
        champ.html('')
        if(choix == "simple")  { champ.append(ajoutChamp(choix,i)); }
        else if(choix == "multiple"){ champ.append(ajoutChamp(choix,i)); }
        else if(choix =="texte")    {champ.append(ajoutChamp(choix,i));} 

       
    
    })

    $("#ajoute").on('click',function(e){
        $( "select option:selected" ).each(function() {
            let  choix = $( this ).val();
            i++;
       
            champ.append(ajoutChamp(choix,i));
        })
    });
   
$(document).ready(function(){
    $("#enregistrer").click(function(){
        var error = 1;
        const question = $("#question");
        var form = $("form")[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
       
        if(question.length < 1){
            $("#question").after('<span class="error ">Veuillez saisir le prénom</span>');
      error = 0;
        }
    });
});



   
</script>
