<?php
error_reporting(0);
require_once('assets/main.php');
if ($_POST) {
    $words = ($_POST['words']>0)? $_POST['words'] : 100; 
    $paragraphs = ($_POST['paragraphs']>0)? $_POST['paragraphs'] : 4; 
    $wordType = (strlen($_POST['wordType']) > 0) ? $_POST['wordType'] : "All"; 
    $results = showParagraphs($words,$paragraphs,$wordType);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dalek Ipsum</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68259201-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
    <div class="main-container">
        <div class="container-fluid header">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <h1>dalek ipsum</h1>
                </div>  
            </div>
        </div>
        <div class="container theForm">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form method="post">
                        How many words per paragraph?<br /> 
                        <div class="inner-addon left-addon">
                            <i class="glyphicon glyphicon-edit"></i> 
                            <input type="text" name="words" id="words" placeholder="20" />
                        </div>
                        How many paragraphs?<br />
                        <div class="inner-addon left-addon">
                            <i class="glyphicon glyphicon-align-justify"></i> 
                            <input type="text" name="paragraphs" id="paragraphs" placeholder="4" />
                        </div>
                        Type of text?<br />
                        <?php
                            $options = getFiles();
                            foreach($options as $option) {
                                echo '<input type="radio" name="wordType" value="'.$option.'">'.$option.'<br/>';
                            }
                            ?> 
                        <input type="radio" name="wordType" value="all" checked>All<br />

                        <input type="submit" class="submitButton" />
                    </form>
                </div>
            </div>
        </div>
        <div class="container results">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 result-paragraphs">
                <?php 
                if ($results) {
                    echo $results;
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
