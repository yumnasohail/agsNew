<!DOCTYPE html>
<html lang="en">
   <head>
      <title>AGS - Contract Slip</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <style>
      .container
        {width:90%;margin:0 auto;}
      .center
        {text-align:center;}
      .underline
        {text-decoration:underline;}
      .p-25
        {padding: 25px;}
      .p-15
        {padding-left: 15px;}
      .mb-20
        {margin-bottom:20px;}
      .mb-15
        {margin-bottom:15px;}
      span ,body
        {color:black;}
      </style>
   </head>
   <body onload="substitutePdfVariables()">
      <div class="container">
         <div class="row p-15 mb-20">
            <div class="col-xs-6">
                <div class="col-xs-12">
                   <span><strong>UMR: </strong><?php echo $formdata['umr']; ?></span>
                </div>
                <div class="col-xs-12">
                   <span><strong>Policy Number:</strong> <?php echo $formdata['policy_number']; ?></span>
                </div> 
            </div>
            <div class="col-xs-6" style="text-align:right;">
                <strong><p>Page <span class="page"></span> of <span class="topage"></span></p></strong>
            </div>
        </div>
      </div>
<script>
        function substitutePdfVariables() {

            function getParameterByName(name) {
                var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
                return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
            }

            function substitute(name) {
                var value = getParameterByName(name);
                var elements = document.getElementsByClassName(name);

                for (var i = 0; elements && i < elements.length; i++) {
                    elements[i].textContent = value;
                }
            }

            ['frompage', 'topage', 'page', 'webpage', 'section', 'subsection', 'subsubsection']
                .forEach(function(param) {
                    substitute(param);
                });
        }
    </script>