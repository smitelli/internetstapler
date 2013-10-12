<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Internet Stapler</title>
  <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  <style>
    body, html     { margin:0; height:100%; overflow:hidden; font-family:Helvetica,Arial,sans-serif; }
    #landing       { text-align:center; padding-top:200px; }
    #landing input { border:1px solid #888; font-size:24px; }
    #landing-url   { width:400px; color:#888; }
    #landing-go    { background:#44f; color:#fff; }
    #overlay-box   { position:absolute; width:400px; height:150px; background:url(/images/stapler.png) no-repeat; }
    #content-box   { border:0; width:100%; height:100%; }
    .flipped       { transform:scaleX(-1); filter:FlipH; -moz-transform:scaleX(-1); -o-transform:scaleX(-1); -webkit-transform:scaleX(-1); -ms-filter:FlipH; }
  </style>
</head>

<!-- There are dumb things, and then there are /dumb/ things. -->

<body>
<?php

  define('GOOD_INIT', TRUE);

  $matches = array();
  preg_match('~/go/(.*)$~i', $_SERVER['REQUEST_URI'], $matches);
  $url = isset($matches[1]) ? $matches[1] : FALSE;

  if ($url) {
    if (preg_match('~^http://~i', $url) == 0) $url = 'http://' . $url;
    require dirname(__FILE__) . '/include/overlay.php';

  } else {
    require dirname(__FILE__) . '/include/landing-page.php';
  }

?>

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-43715823-1'], ['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</body>
</html>