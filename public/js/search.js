
// $(document).ready(function(){

//     fetch_customer_data();
   
//     function fetch_customer_data(query = '')
//     {
//      $.ajax({
//       url:"{{ route('livesearch') }}",
//       method:'GET',
//       data:'_token = <?php echo csrf_token() ?>',
//       data:{query:query},
//       dataType:'json',
//       success:function(data)
//       {
//        $('tbody').html(data.table_data);
//        $('#total_records').text(data.total_data);
//       }
//      })
//     }
   
//     $(document).on('keyup', '#search', function(){
//      var query = $(this).val();
//      fetch_customer_data(query);
//     });
//    });