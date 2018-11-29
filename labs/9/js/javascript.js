function getCountyList_jQuery() {        
    $.ajax({
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
        dataType: "json",
        data: { "state": $("#state").val() },
        success: function(data,status) {
            // alert(data);
             
            $("#county").html("<option> Select One </option>");
            for (var i=0; i< data.length; i++){
                //$("#county").append("<option>" + data["counties"][i].county + "</option>" );
                $("#county").append("<option>" + data[i].county + "</option>");
            }
             
          },
          complete: function(data,status) { //optional, used for debugging purposes
              //alert(status);
        }  
    });
}

function getZipList_jQuery() {        
    $.ajax({
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
        dataType: "json",
        data: { "zip": $("#zip").val() },
        success: function(data,status) {
            // alert(data);
            // console.log(data);
             
            // console.log("city: " + data['city']);
            // console.log("latitude: " + data['latitude']);
            // console.log("longitude: " + data['longitude']);

            $("#citySpan").html(data['city']);
            $("#latSpan").html(data['latitude']);
            $("#longSpan").html(data['longitude']);
          },
          complete: function(data,status) { //optional, used for debugging purposes
              //alert(status);
        
        }  
    });
}

var testCount = 0;

function submit()
{
    testCount += 1;
    console.log(testCount);
}