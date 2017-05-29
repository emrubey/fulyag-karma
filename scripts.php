<script type="text/javascript" src=""></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
      jQuery.ajax({

            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: "jsons/haberozet.json",
            dataType: "json",
            success: function (data) {

              jQuery("#haber1baslik").text(data[0].baslik)
              jQuery("#haber1ozet").text(data[0].ozet)
              jQuery("#haber1resim").attr('src',(data[0].resim))
              jQuery("#haber1url").attr('href',("haberdetay.php?id="+data[0].url))

              jQuery("#haber2baslik").text(data[1].baslik)
              jQuery("#haber2ozet").text(data[1].ozet)
              jQuery("#haber2resim").prop("src",data[1].resim)
              jQuery("#haber2url").attr('href',("haberdetay.php?id="+data[1].url))

              for (var i = 2; i < data.length; i++) {
                var div = '<div class="one_fourth tt-column">'+
                   '<div class="modern_img_frame modern_four_col_large">' +
                      '<div class="img-preload lightbox-img">' +
                        ' <a href="#" class="">' +
                            '<div class="lightbox-zoom zoom-4 zoom-link" style="position:absolute; display: none;">&nbsp;</div>' +
                            '<img src="' + data[i].resim + '" alt="" />' +
                         '</a>' +
                      '</div>' +
                   '</div>' +
                   '<h4>' + data[i].baslik + '</h4>' +
                   '<p>' + data[i].ozet + '</p>' +
                ' <a href=haberdetay.php?id=' +data[i].url+ '>Devamı</a>' +
                '</div>'
                var newDiv = jQuery(div)
                jQuery("#haberListesi").append(newDiv)
              }

            },
            error: function (result) {
                alert("Error");
            }
        });
    })
</script>
