
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Page Title</title>

    <script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
  </head>
  <body>
  <center>
<a href="./index.php">#Estonia</a>
<div id="content"> </div>
<button id="loadButton" onclick="loadTweets()">LOAD MORE</button>
     <script>
      function loadTweets() {
        var lastId = document.getElementById("content").lastChild.id;
        xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
                $("#content").append(this.responseText);
                twttr.widgets.load(document.getElementById("content"));
						}
				}
				xmlhttp.open("GET","getEstonianTweets.php?q="+lastId,true);
				xmlhttp.send();
			}
      loadTweets();
    </script>
    </center>
  </body>
</html>