let modalId = jQuery('#image-gallery');

jQuery(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      jQuery('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        jQuery('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        jQuery('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      jQuery('#show-next-image, #show-previous-image')
        .click(function () {
          if (jQuery(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = jQuery('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let jQuerysel = selector;
        current_image = jQuerysel.data('image-id');
        jQuery('#image-gallery-title')
          .text(jQuerysel.data('title'));
        jQuery('#image-gallery-image')
          .attr('src', jQuerysel.data('image'));
        disableButtons(counter, jQuerysel.data('image-id'));
      }

      if (setIDs == true) {
        jQuery('[data-image-id]')
          .each(function () {
            counter++;
            jQuery(this)
              .attr('data-image-id', counter);
          });
      }
      jQuery(setClickAttr)
        .on('click', function () {
          updateGallery(jQuery(this));
        });
    }
  });

// build key actions
jQuery(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && jQuery('#show-previous-image').is(":visible")) {
          jQuery('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && jQuery('#show-next-image').is(":visible")) {
          jQuery('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });