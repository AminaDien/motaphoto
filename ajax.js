let currentPage = 1;
jQuery('#load-more').on('click', function () {
  currentPage++; // signifie que la prochaine page à charger sera la suivante

  jQuery.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'weichie_load_more',
      paged: currentPage,
    },
    success: function (res) {
        jQuery('.photos_accueil').append(res);
    }
  });
});
console.log('test')

jQuery('#cat1, #format1, #date1').on('change', function() {
    var categorie = jQuery('#cat1').val();
    var format = jQuery('#format1').val();
    var date = jQuery('#date1').val();
  
    var data = {
      action: 'filter_post',
      categorie: categorie,
      format: format,
      date: date // Ajout de la clé 'date' avec la valeur sélectionnée
    };
  
    jQuery.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      data: data,
      success: function(res) {
        jQuery('.photos_accueil').html(res);
      }
    });
  });