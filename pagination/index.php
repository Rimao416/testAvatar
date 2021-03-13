<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination System</title>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
        <br>
        <div class="container">
            <h3 align="center">Live Data Search With Pagination PHP Mysql Using Ajax</h3>
            <br>
            <div class="card">
                <div class="card-header">Dynamic Data</div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name='search_box' id="search_box" class="form-control" placeholder="Type Your Search query here">
                    </div>
                    <div id="dynmic_content" class="table-responsive">

                    </div>
                </div>
            </div>
        </div>

</body>
</html>
<script>
   $(document).ready(function(){

load_data(1);

function load_data(page, query = '')
{
  $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{page:page, query:query},
    success:function(data)
    {
      $('#dynmic_content').html(data);
    }
  });
}

$(document).on('click', '.page-link', function(){
  var page = $(this).data('page_number');
  var query = $('#search_box').val();
  load_data(page, query);
});

$('#search_box').keyup(function(){
  var query = $('#search_box').val();
  load_data(1, query);
});

});
</script>