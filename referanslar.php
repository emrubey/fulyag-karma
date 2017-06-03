<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en-US">
<!--<![endif]-->


<!-- Mirrored from truethemesdemo.net/_HTML/Karma/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Mar 2017 08:21:22 GMT -->
<head>
<!-- un-comment and delete 2nd meta below to disable zoom (not cool)
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"> -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta charset="UTF-8">
<script type="text/javascript" src="js/jquery.js"></script>
<title>Fulyag</title>


<!-- RSS -->
<link rel="alternate" type="application/rss+xml" title="#" href="#" />


<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.html"/>


<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Lato' rel='stylesheet' type='text/css'>


<!-- Primary CSS -->
<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/_mobile.css" type="text/css" media="all" />


<!-- Color Scheme CSS -->
<link rel="stylesheet" href="css/karma-political-blue.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/secondary-political-blue.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/_font-awesome.css" type="text/css" media="all" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90127439-6', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
   <div id="tt-wide-layout" class="content-style-default">
      <div id="wrapper">
        <div class="header"><?php include('header.html');?></div>

         <!-- ***************** - Main Content Area - ***************** -->
         <div id="main" class="tt-slider-">
			       <div class="main-area">
                  <div class="tools">
					   <span class="tools-top"></span>
					   <div class="frame">
						  <!-- <h1>Archive for 'Events'</h1> -->
						  <h1><a href="index.html">Referasnlarımız </a><span class='current_crumb'>&nbsp;&nbsp; </span></h1>
						  <form role="search" method="get" action="http://truethemesdemo.net/_HTML/Karma/template-blog.html" class="search-form">
							</form>
					   </div><!-- END frame -->

					   <span class="tools-bottom"></span>
					</div><!-- END tools -->

          <main role="main" id="content" class="content_full_width">
             <div class="post_title">
              <a href="" title="Posts by TrueThemes" rel="author"></a>
             </div><!-- END post_title -->


             <?php
               include 'DBO/BusinessTier.php';
               $BT = new BusinessTier();

               $sql = $BT->getAllReferences();
               $html = '';
               while($row = mysql_fetch_array($sql))
               {
                   $name = $row['name'];
                   $imagePath = "img/uploaded/" . $row['image_path'];

                   $html .=
                    "<div class='one_fourth '>" .
                      "<div class='modern_three_col_large' style='height:200px'>" .
                        "<a href='$imagePath' class='attachment-fadeIn' data-gal='prettyPhoto' title=''>" .
                          "<div class='lightbox-zoom zoom-3' style='position:absolute; display: none;'>&nbsp;</div>" .
                          "<img class='tt-fadein' src='$imagePath' alt='' />" .
                        "</a>" .
                      "</div>" .
                      "<div class='portfolio_content'>" .
                         "<h3>$name</h3>" .
                      "</div>".
                   "</div>";
               }
               echo $html;
             ?>



               </main><!-- END main #content -->
               <!-- END sidebar -->
            </div><!-- END main-area -->

         <div id="footer-top">&nbsp;</div>
      </div><!-- END main -->



         <!-- ***************** - Footer Starts Here - ***************** -->
         <div class="footer"><?php include('footer.html');?></div>

</div><!-- END wrapper -->
</div><!-- END tt-layout -->




<!-- ***************** - JavaScript Starts Here - ***************** -->
<script type="text/javascript" src="js/custom-main.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/jquery.fitvids.js"></script>
<script type="text/javascript" src="js/scrollWatch.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.tabs.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.accordion.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
jQuery(document).ready(function () {
    jQuery('.tt-parallax-text').fadeIn(1000); //delete this to remove fading content

    var $window = jQuery(window);
    jQuery('section[data-type="background"]').each(function () {
        var $bgobj = jQuery(this);

        jQuery(window).scroll(function () {
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));
            var coords = '50% ' + yPos + 'px';
            $bgobj.css({
                backgroundPosition: coords
            });
        });
    });
});
</script>

<!--[if !IE]><!--><script>
  if (/*@cc_on!@*/false) {
	  document.documentElement.className+=' ie10';
  }
</script><!--<![endif]-->
</body>

<!-- Mirrored from truethemesdemo.net/_HTML/Karma/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Mar 2017 08:21:22 GMT -->
</html>
