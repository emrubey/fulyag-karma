
<script type="text/javascript">
    jQuery(document).ready(function () {


jQuery.ajax({

      type: "GET",
      contentType: "application/json; charset=utf-8",
      url: "jsons/etkinlikler/"+getSearchParams("id")+".json",
      dataType: "json",
      success: function (data) {
        console.log(data);
        jQuery("#etkinlikDetayBaslik").text(data.baslik)
        jQuery("#etkinlikMetin").text(data.metin)
        for (var i = 0; i < data.resim.length; i++) {
          var div =   '<div class="shadow_img_frame shadow_two_col_large">'+
               '<div class="img-preload lightbox-img">'+
                  "<a href='"+data.resim[i]+"' class='attachment-fadeIn' data-gal='prettyPhoto' title=''>"+
                     '<div class="lightbox-zoom zoom-2" style="position:absolute; display: none;">&nbsp;</div>'+
                     "<img class='tt-fadein img-responsive' src='"+data.resim[i]+"' style='max-height:255px;max-width:425px' alt='' />"+
                  '</a>'+
               '</div>'+
            '</div>'
          var newDiv = jQuery(div)
          jQuery("#resimlistesi").append(newDiv)
        }

      },
      error: function (result) {
          alert("Error");
      }
  });

     })
     function getSearchParams(k){
       var p={};
       location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
       return k?p[k]:p;
     }
</script>
