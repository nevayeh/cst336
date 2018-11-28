// function changeTotal1()
// {
//     document.getElementById("").innerHTML
    
    
// }

// function changeTotal2()
// {
//     document.getElementById().innerHTML
// }

var unit1Price = 0;
var unit2Price = 0;
var shippingPirce = 0;
var subtotalPrice = 0;
var taxPrice = 0;
var finalTotal = 0;

$("#unit1Quant").change(function()
{
    var quant = $("#unit1Quant").val();
    // $("#unit1Total").innerHTML = "$" + (quant * 30);
    unit1Price = quant * 30;
    $("#unit1Total").html("$" + unit1Price);

    // console.log("tot: " + $("#unit1Total").val());
    // updateEverything();
    
    // console.log(quant);
    // console.log($("#unit1Total").innerHTML = "$" + (quant * 30) + "");
});

$("#unit2Quant").change(function()
{
    var quant = $("#unit2Quant").val();
    unit2Price = quant * 20;
    $("#unit2Total").html("$" + unit2Price);
    
    // updateEverything();
});

$("#nextDayShipping").click(function()
{
    
});

$("#threeDayShipping").click(function()
{
    
});

$("#regularShipping").click(function()
{
    
});

function updateEverything()
{
    shippingPrice = 0;
    
}