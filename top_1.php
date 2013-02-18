<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-fileupload.js"></script>
        <script src="js/bootstrap-tab.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-fileupload.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <script src="jquery/jquery1.8.3.js"></script>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="assets/css/docs.css" rel="stylesheet">
        <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
        <script>
            $("form#myForm").submit(function(){
               var formData = new FormData($this[0]);
               $.post($(this).attr("action"), formData, function(){
                   alert("ok");
               });
               return false;
            });
        </script>
    </head>
    <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar">
              <ul class="nav">
                  <li class="">
                      <a href="index.php"><b>Candidates</b></a>
                  </li>
                  <li class="active">
                      <a href="employer_page.php"><b>Employers</b></a>
                  </li>
              </ul>
          </div>
        </div>
      </div>
    </div>
        
        <!-- image top -->
        <header class="jumbotron subhead" id="overview">
            <div class="container">
                <h1 align="center">Hire The Right Talent Faster</h1>
                    <div align="center">
                        <p style="font-size: 20px">
                            Post jobs in a few easy steps<br/>
                            Filter and see the most relevant applicants<br/>
                            Track and manage the application process<br/>
                        </p>
                    </div>
                </div>
        </header>