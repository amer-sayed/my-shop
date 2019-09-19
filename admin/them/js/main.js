$(document).ready(function(){



$('#inputUnchecked').click(function(){
	$('.password').attr("type", $(this).is(':checked') ? 'text':'password');
});


$('.o_1').click(function(){
  var val = $('.Checked1').val();
  if (val == 0){
    $('.Checked1').val(1);
  }else {
    $('.Checked1').val(0);
  }
  console.log(val);
});


$('.o_2').click(function(){
  var val = $('.Checked2').val();
  if (val == 0){
    $('.Checked2').val(1);
  }else {
    $('.Checked2').val(0);
  }
  console.log(val);
});


$('.o_3').click(function(){
  var val = $('.Checked3').val();
if (val == 0){
    $('.Checked3').val(1);
  }else {
    $('.Checked3').val(0);
  }
  console.log(val); 
});


$('.delet').click(function(){
 return confirm("Are You Sure?");
});

});
