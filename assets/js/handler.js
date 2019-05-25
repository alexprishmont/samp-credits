$(document).ready(function(){
  var price = $("#ppc").val();
  $("#credits").change(function(){
    var p = $("#credits").val() * price;
    $("#price").val(p+" eurų");
  });
});
