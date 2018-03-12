function ideal(){
    var weight = Number(document.getElementById("weight").value);
var height = Number(document.getElementById("height").value);
var e = document.getElementById("gender");
var gender = e.options[e.selectedIndex].text;
if(gender=="Male")
{
    var idealWeight = (height - 100) + -((height-100)*10/100);
}
else {
    var idealWeight = (height - 100) + -((height-100)*15/100);
}
if(weight-idealWeight>0)
{
    var text = (weight-idealWeight).toFixed(2);
    text = "You need to decrease your weight by - "+text+" kilos";
    document.getElementById("idealWeight").innerHTML = text;
    text = (weight-idealWeight).toFixed(2);
    document.getElementById("advice").innerHTML = "The amount of exercise needed to lose " + text + " kilos of body fat per week:<br> Approximately "+(10*text).toFixed(2)+" hours of walking at 5kph (3mph) per week; <br> Approximately "+(4*text).toFixed(2)+" hours of jogging at 10kph (6mph) per week; <br> Approximately "+(4.5*text).toFixed(2)+" hours of cycling at around 20kph (12mph) per week.";
    show('exercise',idealWeight);
}
else{
    var text = (idealWeight-weight).toFixed(2);
    text = "You need to increase your weight by - "+text+" kilos";
    document.getElementById("idealWeight").innerHTML = text;
    text = (idealWeight-weight).toFixed(2);
    document.getElementById("advice").innerHTML = "It takes 3500 calories to add 0.5 kilos. You would need take "+3500*2*text+" calories in order to get fit.";
    document.getElementById("headingThird").innerHTML = "How would you do that?";
    show('caloric',idealWeight);
}
}
// AJAX
function show(str,text) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("way").innerHTML=this.responseText;
    }
  }
   var weight = Number(document.getElementById("weight").value);
   var username = '<?php echo $username; ?>';
  xmlhttp.open("GET","readDB.php?caloric="+str+"&username="+username+"&weight="+weight+"&idealWeight="+text,true);
  xmlhttp.send();
}
