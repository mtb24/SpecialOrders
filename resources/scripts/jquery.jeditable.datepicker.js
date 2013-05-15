jQuery.editable.addInputType('datepicker', {
   element: function(settings, original) {
      var input = $('<input size=6 />');
      input.datepicker({
         dateFormat: 'yy-mm-dd',
      });
      input.datepicker('option', 'showAnim', 'slide');
      $(this).append(input);
      return (input);
   }
});
