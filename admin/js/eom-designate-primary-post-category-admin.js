(function ($) {
    'use strict';
    // execute when the DOM is ready
    $(document).ready(function () {

        $('#categorychecklist input:checkbox').on('change', function () {

            // Remove the Option from the Select box if the checkbox gets unchecked
            let el = $(this);
            let labelText = $(this).parent().text();
            let label = $.trim(labelText);
            if (el.prop('checked')) {
                $('#primary-category-select ').append($('<option>', {
                    value: label,
                    text: label
                }));
            } else {
                $("#primary-category-select option[value='" + label + "']").remove();
            }

        });

        // if the user is using the Block Editor (Gutenberg) remove the categories panel, aka the categories meta box
        if (wp.data.dispatch('core/edit-post')) {
            wp.data.dispatch('core/edit-post').removeEditorPanel('taxonomy-panel-category');
        }
    });
})(jQuery);
