//define the global namespace.
window.scify = {}; //avoiding name space collusion

$(document).ready(function () {

    var assignToolTips = function () {
            $('[data-toggle="tooltip"]').tooltip();
        },
        handleSearchFormFieldsReset = function () {
            $(".search").val('');
            $(".searchDropDown").val('0');
            //  $('.searchCheckbox').parent().removeClass("checked");
        },
        submitSearchForm = function (event) {
            event.preventDefault();

            var data = $(this).serializeArray();

            $(".searchDropDown.getValue").each(function (index, element) {

                $.each(data, function( i, e ) {

                    if(e.name==$(element).attr('data-name') && $("#" + $(element).attr('id') + " option:selected").val()!=0) {
                        e.value = $("#" + $(element).attr('id') + " option:selected").text();
                        return false;
                    }
                    else if(e.name==$(element).attr('data-name') && $("#" + $(element).attr('id') + " option:selected").val()==0){
                        e.value = "";
                        return false;
                    }
                });
            });

            console.log(data);

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: data,
                cache: false,
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function (data) {
                    table.fnClearTable();
                    if (data.data.length > 0) {
                        table.fnAddData(data.data);
                        /*  $('.attribute.rating').raty({
                         starOff: '/assets/plugins/raty/lib/images/star-off.png',
                         starOn: '/assets/plugins/raty/lib/images/star-on.png',
                         starHalf: '/assets/plugins/raty/lib/images/star-half.png',
                         readOnly: true,
                         score: function () {
                         console.log('raty');
                         return $(this).attr('data-score');
                         }
                         });*/
                    }

                }
            });
            return false; // prevent send form
        };


    assignToolTips();
    $("#clear").click(handleSearchFormFieldsReset); //event assignment or delegation
    $('#searchForm').on('submit', submitSearchForm);    //Submit the form through ajax.    //The result data should be reloaded to the datatable


    /**
     * datepickers for the edit form
     */
    $('.startDate').datepicker({
        language: 'el',
        format: 'dd/mm/yyyy',
        autoclose: true
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('.endDate').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('.endDate').datepicker('setStartDate', null);
    });

//add restrictions: user should not be able to check
//an end_date after start_date and vice-versa
    $('.endDate').datepicker({
        language: 'el',
        format: 'dd/mm/yyyy',
        autoclose: true
    }).on('changeDate', function (selected) {
        var endDate = new Date(selected.date.valueOf());
        $('.startDate').datepicker('setEndDate', endDate);
    }).on('clearDate', function (selected) {
        $('.startDate').datepicker('setEndDate', null);
    });


//default user image
    $('img.userImage').one('error', function () {
        this.src = '/assets/images/default.png';
    });

    /**
     * tooltips for the tree
     */
    $('.node.tooltips.notAssigned.disabled').tooltip({
        title: Lang.get('js-components.notUserUnit'),
        placement: 'bottom'
    });

    $('.node.tooltips.parent.hasUnits.disabled').tooltip({
        title: Lang.get('js-components.hasUnits'),
        placement: 'bottom'
    });

    $('.node.tooltips.leaf.hasActions.disabled').tooltip({
        title: Lang.get('js-components.hasActions'),
        placement: 'bottom'
    });

})
;

function getParameterByName(name) {
    var url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
