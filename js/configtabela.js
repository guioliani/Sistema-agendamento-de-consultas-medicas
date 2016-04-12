 $(document).ready(function(){
      $("tr").click(function(){
        $(this).find('td').each(function(i) {
          $th = $("thead th")[i];
          alert(jQuery($th).text() + ": " + $(this).html())
          window.location="agendar.php";
        });                  
      })
    });