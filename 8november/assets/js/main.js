$(document).ready(function(){
  $('#formKTP').submit(function(event){
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url : 'test.php',
      data : $('#formKTP').serialize()
    })
    .done(function(data){
      //console.log(data);
      $('#disini').html(data);
    })
    .fail(function(data){
      //console.log(data);
    });
  });
});
$(document).on('click', '.delete-btn', function(event){
  event.preventDefault();
  var id_del=$(this).closest('td').find('.product-id').text();
  $.post("delete.php", {id:id_del})
      .done(function(data){
        //console.log(data);
        $('#disini').html(data);
      });
});
