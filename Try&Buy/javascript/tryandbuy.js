/*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/

 // <!-- this part realized by tinycarousel -->
$(document).ready(function()
{
    $('#slider1').tinycarousel();

});
//tinycarousel End

//quality buttons
$(function(){setTotal();});
$(function(){
	$(".add").click(function(){
    var t=$(this).parent().find('input[class=text_box]');
		t.val(parseFloat(t.val())+1);
    setTotal();
	})
	$(".sub").click(function(){
      var t=$(this).parent().find('input[class=text_box]');
      if(t.val()>0){
      t.val(parseFloat(t.val())-1);
    }
    setTotal();
	});
});
function setTotal(){
var total=0;
var s=0;
var myArray;
$("#tab tr").each(function(){
s=parseInt($(this).find('input[class=text_box]').val())*parseFloat($(this).find('span[class=price]').html());
$(this).find(".total").html(s.toFixed(0));
// var s = s.toFixed(2).replace(/[^0-9]/ig,"");
total+=$(this).find(".total").text()*1;
});
// myArray = $('.total');
// // alert(myArray)
// $('.total').each(function() {
//     total += myArray.html();
// });
    $(".allTotal").html(total);
  }

//quality End

//enlarge product pic
var timeoutId;
$(document).ready(function(){
$(".smallImg").hover(function(){
  var self = this;
  timeoutId=null;
  timeoutId=setTimeout(function(){
  $("p#addImage").append('<img id=bigImage src="'+ self.rel + '" alt="" />');
  $(self).find("img").stop().fadeTo("slow",0.5);}, 2000);
  }

  ,function(){
  window.clearTimeout(timeoutId);
  $(this).find("img").stop().fadeTo("slow",1);
  $("img#bigImage").remove();
  });
});


//for hover on MyBag
//$(document).ready(function(){
  //$('#show-quick-cart-zone').mouseenter(function () {
    //  $('#show-quick-cart-details').slideDown(500);
  //});
  //$('#show-quick-cart-zone').mouseleave(function () {
    //  $('#show-quick-cart-details').slideUp(500);
//  });
//});

//enlarge end





// shopping cart
$(function() {
    $('.chk_boxes').click(function() {
        $('.check').prop('checked', this.checked);
    });
});

$(document).ready(function(event) {
    $('form[name=tryandbuy]').submit(function(event){
        var x =$(this).parent().find('input[class=text_box]');
        if (x.val() == "0" ) {
            alert("Select a number.");
            event.preventDefault();
        }
    });
});
