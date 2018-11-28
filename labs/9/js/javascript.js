alert("hi");

function getCountyList()
{        
   console.log("inside getCountyList");
   
   //var stateSelected = document.getElementById("state").value;
   var stateSelected = document.getElementById("state");
   
   console.log(stateSelected);
   
   var url = "https://www.showdeolabs.com/cors?url=http://hosting.csumb.edu/laramiguel/ajax/countyList.php?state=";

   var ajax;
    if (window.XMLHttpRequest) {
         ajax= new XMLHttpRequest();
     }

   ajax.open("GET", url + stateSelected, true);
   ajax.send();

     ajax.onreadystatechange=function() {
          if (ajax.readyState==4 && ajax.status==200) {
                alert(ajax.responseText);  //displays value retrieved from PHP program
           }
      }  

}
