<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Search</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    /* Add your styles here */
  </style>
</head>
<body>
  <h1>Product Search</h1>
  <input type="text" id="search" placeholder="Search for a product">
  <div id="result"></div>

  <script>
    $(document).ready(function(){
      $('#search').keyup(function(){
        var query = $(this).val();
        if(query !== ''){
          $.ajax({
            url: 'search.php',
            method: 'POST',
            data: {query: query},
            success: function(data){
              $('#result').html(data);
            }
          });
        } else {
          $('#result').html('');
        }
      });
    });
  </script>
</body>
</html>
