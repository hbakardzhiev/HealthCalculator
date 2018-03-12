function calculate(){
  var age = Number(document.getElementById("age").value);
  var e = document.getElementById("gender");
  var gender = e.options[e.selectedIndex].text;
  var isChecked = false;
  var dailyIntake = 0;
  if(document.getElementById('pregnant').checked){
    isChecked = true;
  }
  else {
    isChecked = false;
  }
  if(age<4) {
    dailyIntake = 700;
    document.getElementById("calciumIntake").innerHTML = "700mg/day";
    show(dailyIntake);
  }
  else if(age<9) {
    dailyIntake = 1000;
    document.getElementById("calciumIntake").innerHTML = "1000mg/day";
    show(dailyIntake);
  }
  else if (age<14) {
    dailyIntake = 1300;
    document.getElementById("calciumIntake").innerHTML = "1300mg/day";
    show(dailyIntake);
  }
  else if (age<19) {
    dailyIntake = 1300;
    document.getElementById("calciumIntake").innerHTML = "1300mg/day";
    show(dailyIntake);
  }
  else if (age<31) {
    dailyIntake = 1000;
    document.getElementById("calciumIntake").innerHTML = "1000mg/day";
    show(dailyIntake);
  }
  else if (age<51) {
    dailyIntake = 1000;
    document.getElementById("calciumIntake").innerHTML = "1000mg/day";
    show(dailyIntake);
  }
  else if(age>50&&gender=="Male")
  {
    dailyIntake = 1000;
    document.getElementById("calciumIntake").innerHTML = "1000mg/day";
    show(dailyIntake);
  }
  else if(age>50&&gender=="Female")
  {
    dailyIntake = 1200;
    document.getElementById("calciumIntake").innerHTML = "1200mg/day";
    show(dailyIntake);
  }


}
function show(dailyIntake){
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
xmlhttp.open("GET","calculateCalciumIntake.php?dailyIntake="+dailyIntake,true);
xmlhttp.send();
}
function add(clickedId)
{
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("basket").innerHTML+=this.responseText;
    }
  }
  var calciumIntake =  document.getElementById("calciumIntake").innerHTML;
  xmlhttp.open("GET","calculateCalciumIntake.php?basket="+clickedId+"&calciumIntake="+calciumIntake,true);
  xmlhttp.send();
}
// new changes
$(function(){
    //Store the test paragraph node
    var test = $('#basket');

    //Function to change the paragraph

    //Bind the paragraph changing event
    $('#submit1').on('click', changeParagraph);

    //Observe the paragraph
    this.observer = new MutationObserver( function(mutations) {
        alert('Paragraph changed!')
    }.bind(this));
    this.observer.observe(test.get(0), {characterData: true, childList: true});
});
