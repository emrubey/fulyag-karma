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
  <?php
    include 'DBO/BusinessTier.php';
    $BT = new BusinessTier();

?>
   <div id="tt-wide-layout" class="content-style-default">
      <div id="wrapper">
        <div class="header"><?php include('header.html');?></div>

         <!-- ***************** - Main Content Area - ***************** -->
         <div id="main" class="tt-slider-">
			       <div class="main-area">
                  <div class="tools">
					   <span class="tools-top"></span>

					   <span class="tools-bottom"></span>
					</div><!-- END tools -->

          <main role="main" id="content" class="content_full_width">
             <div class="post_title">
              <a href="" title="Posts by TrueThemes" rel="author"></a>
             </div><!-- END post_title -->


             <div class="tabs-area">
                <ul class="tabset">
                   <li><a href="#tab-1" class="tab"><span>Ürün Ekleme</span></a></li>
                   <li><a href="#tab-2" class="tab"><span>Haber Ekleme</span></a></li>
                   <li><a href="#tab-3" class="tab"><span>Referans Ekleme</span></a></li>
                </ul>

                <div id="tab-1" class="tab-box">
                  <form action="add_product.php" method="post" id="addProductForm" enctype="multipart/form-data">

                  <div class="form-group row"  style="margin-top:-10px">
                        <div class="col-md-4">
                        <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Marka Seç:</h4></label></div>
                        <div class="col-md-4">
                        <select class="from-control" name="selectBrand" style="margin-left:30px">
                        <?php
                          $sql = $BT->getAllBrands();
                          while($row = mysql_fetch_array($sql))
                          {
                              $id = $row['id'];
                              $name = $row['name'];
                              $html .= "<option value='$id' id='$id'>$name</option>";
                          }
                          echo $html;
                        ?>
                        </select></div>
                        <div class="col-md-4" align="right">
                        <a href="admin_add_brand.php">
                          <button type="button" name="button">Marka Ekle</button>
                        </a>
                      </div>
                    </div>
                  <div class="form-group row"  style="margin-top:-10px">
                        <div class="col-md-4">
                        <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Kategori Seç:</h4></label></div>
                        <div class="col-md-4">
                        <select class="from-control" name="selectCat" style="margin-left:30px">
                          <?php
                            $sql = $BT->getAllCategories();
                            while($row = mysql_fetch_array($sql))
                            {
                                $catId = $row['id'];
                                $catName = $row['name'];
                                $catHtml .= "<option value='$catId' id='$catId'>$catName</option>";
                            }
                            echo $catHtml;
                          ?>
                        </select></div>
                        <div class="col-md-4" align="right">
                        <a href="admin_add_category.php">
                          <button type="button" name="button">Kategori Ekle</button>
                        </a>
                      </div>
                    </div>
                      <div style="margin-top:-10px">
                           <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Ürün Adı:</h4></label>
                           <input name="productName" type="text" class="form-control" id="productName">
                           <br>  <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Ürün Açıklaması:</h4></label>
                           <input name="productDescription" type="text" class="form-control" id="productDescription">
                           <br>  <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Resim:</h4></label>
                           <input name="productImage" type="file" id="productImage">
                     </div>
                     <div>
                       <button type="submit" name="addProduct">Ürün Ekle</button>
                     </div>
                  </form>
                </div>
                <div id="tab-2" class="tab-box">
                  <form action="add_news.php" method="post" id="addNewsForm" enctype="multipart/form-data">
                    <div  style="margin-top:-10px">
                         <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Haber Adı:</h4></label>
                         <input name="newsName" type="text" class="form-control" id="newsName">
                         <br>  <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Haber Metni:</h4></label>
                         <input name="newsDescription" type="text" class="form-control" id="newsDescription">
                         <br>  <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Resim:</h4></label>
                         <input name="newsImage" type="file" id="newsImage">
                   </div>
                   <div>
                     <button type="submit" name="addNews">Haber Ekle</button>
                   </div>
               </form>
                </div>

                <div id="tab-3" class="tab-box">
                  <form action="add_reference.php" method="post" id="addReferenceForm" enctype="multipart/form-data">
                    <div  style="margin-top:-10px">
                         <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Referans Adı:</h4></label>
                         <input name="referenceName" type="text" class="form-control" id="referenceName">
                         <br>  <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Referans Detayı:</h4></label>
                         <input name="referenceDescription" type="text" class="form-control" id="referenceDescription">
                         <br>  <label for="name"><h4 style="font-size:20px; font-family:candara; font-style:italic;">Resim:</h4></label>
                         <input name="referenceImage" type="file" id="referenceImage">
                   </div>
                   <div>
                     <button type="submit" name="addReference">Referans Ekle</button>
                   </div>
                </form>
                </div>
             </div>
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
