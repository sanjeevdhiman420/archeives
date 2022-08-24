// var counter=0;
// $(".sec-main div").each(function(){
//     var self=$(".div");
// counter++;
//  self.addClass("div_"+counter);
// });
var counter=0;

$(document).ready(function(){
$('#sec-main .div').each(function(){
    counter++;
$(this).addClass("active_"+counter);
});
});