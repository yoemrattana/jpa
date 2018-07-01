$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Remove button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
        function(e) {
            e.preventDefault();
            $(this).closest('.form-inline').remove();
        }
    );
    // Add button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
        function(e) {
            e.preventDefault();
            var container = $(this).closest('[data-role="dynamic-fields"]');
            new_field_group = container.children().filter('.form-inline:first-child').clone();
            new_field_group.find('input').each(function(){
                $(this).val('');
            });
            container.append(new_field_group);
        }
    );
    // Date time picker
    $('#datepicker').datepicker({

        minViewMode: 2,
        format: 'yyyy'

    });

    // Confirm delete using form
    $(".delete").on("submit", function(e){
        if(!confirm('Do you want to delete this item?')){
            e.preventDefault();
        }
    });

    // Confirm delete using simple button
    $("a.delete").on('click', function(e){
        if(!confirm("Do you want to delete this item?")) {
            e.preventDefault();
        }
    });

    // typeahead
    // auto_complete for status field form
    var auto_complete_status = [];
    $.ajax({
        type: 'POST',
        url: $my_url,
        //async: false,
        success:function(data) {
            //auto_complete_status = data;
            var $input_status = $(".auto-complete-status");
            $input_status.typeahead({

                source: data,
                autoSelect: true
            });
        }
    });
    //console.log(auto_complete_status);

    // var $input_status = $(".auto-complete-status");
    // $input_status.typeahead({
    //
    //     source: auto_complete_status,
    //     autoSelect: true
    // });

    // visa type class

    var auto_complete_visa_type_class = [];
    $.ajax({
        type: 'POST',
        url: $url_get_visa_type_class,
        //async: false,
        success:function(data) {
            //auto_complete_visa_type_class = data;
            var $input_visa_type_class = $(".auto-complete-visa-type-class");
            $input_visa_type_class.typeahead({
                source: data,
                autoSelect: true
            });
        }
    });

    // var $input_visa_type_class = $(".auto-complete-visa-type-class");
    // $input_visa_type_class.typeahead({
    //     source: auto_complete_visa_type_class,
    //     autoSelect: true
    // });

    // var $input = $(".auto-complete-visa-type-class");
    // $input.typeahead({
    //     source: [
    //         {id: "someId1", name: "Display name 1"},
    //         {id: "someId2", name: "Display name 2"}
    //     ],
    //     autoSelect: true
    // });
});