
  /* Product Tag Filters - Good for any number of filters on any type of collection pages */
  /* Brought to you by Caroline Schnapp */
  var collFilters = jQuery('.coll-filter');
  collFilters.change(function() {
    var newTags = [];
    collFilters.each(function() { 
      if (jQuery(this).val()) {
        newTags.push(jQuery(this).val());
      }
    });
    if (newTags.length) {
      var query = newTags.join('+');
      window.location.href = jQuery('<a href="/collections/desserts/tag" title="Show products matching tag tag">tag</a>').attr('href').replace('tag', query);
    } 
    else {
      
      window.location.href = '/collections/desserts';
      
    }
  });
