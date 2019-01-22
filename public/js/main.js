$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$('.sorting-options .sorting.price').change(function() {
    var val = $(this).val();
    var url_string = window.location.href;
    var url = new URL(removeURLParameter(url_string, 'price_sort'));

    switch (val) {
        case 'asc':
            window.location.replace(url + '&price_sort=asc');
            break;
        case 'desc':
            window.location.replace(url + '&price_sort=desc');
            break;
        default:
            window.location.replace('/lands');
            break;
    }
});

$('#filter-land-category').change(function() {
    var landCategoryId = $(this).val();
    var select_el = $('#filter-view-assignment');

    if (landCategoryId !== undefined && landCategoryId !== '') {
        $.post("/ajax/getAssignment", {landCategoryId: landCategoryId})
            .done(function (data) {
                var data = JSON.parse(data);

                select_el.find('option').remove();
                select_el.show();

                $.each(data, function (index, item) {
                    select_el.append('<option value="' + item.id + '">' + item.name + '</option>');
                });
            });
    } else {
        select_el.hide();
    }
});


function removeURLParameter(url, parameter) {
    //prefer to use l.search if you have a location/link object
    var urlparts= url.split('?');
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (var i= pars.length; i-- > 0;) {
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                pars.splice(i, 1);
            }
        }

        return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
    }
    return url;
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});