function calc(){
    var weight = Number(document.getElementById("weight").value);
var numOfDrinks = Number(document.getElementById("numOfDrinks").value);
var drinkPeriod = Number(document.getElementById("drinkPeriod").value);
var e = document.getElementById("gender");
var gender = e.options[e.selectedIndex].text;
var EBAC = 0;
if(gender=="Male")
{
    EBAC = ((0.806*numOfDrinks*1.2)/(0.58*weight)-0.015*drinkPeriod).toFixed(2);
    console.log(EBAC);
}
else {
    EBAC = ((0.806*numOfDrinks*1.2)/(0.49*weight)-0.017*drinkPeriod).toFixed(2);
    console.log(EBAC);
}

    var text = "The alcohol content in your body is: "+EBAC+"<em>g/dL</em>";
    console.log(text);
    document.getElementById("alcoholContent").innerHTML = text;
    if(EBAC>=0.05)
    {
      document.getElementById("info").innerHTML = "In your state it is completely prohibited to operate on any vehicle!"+"<br>You should:"+
      "<br>stop drinking immediately;"+
      "<br>drink glass of water after every drink;"+
      "<br>det some food into your stomach - snacks, peanuts or etc;"+
      "<br>take a quick 30-minute nap.";
      show("yes");
    }
    else {
      document.getElementById("info").innerHTML = "In your state you can operate a vehicle according the law.";
      show("no");
    }
}
// AJAX
function show(str) {
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
  xmlhttp.open("GET","calculateAlcoholContent.php?alcoholic="+str+"&username="+username,true);
  xmlhttp.send();
}
