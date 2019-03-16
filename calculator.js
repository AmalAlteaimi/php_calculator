$( document ).ready(function() {

 $(".button-key").on("click", function(event){
    event.preventDefault();
    var input = $(".u_input");
    input.val( $(this).val());
 });


//handles taking in the values from form
//prints calculated values and resets input form

 $(".enter").on("click", function(event){
    event.preventDefault();
    var data = $(".u_input").val();
    console.log(data);
    var request = $.ajax({
        type: 'GET',
        url: 'runner.php',
        data: ({data_array:data}),

    });
    request.done(function(response){
      console.log(response);
      $(".calc_output").text(response);
     // $(".u_input").val("");
    });
 });
});
