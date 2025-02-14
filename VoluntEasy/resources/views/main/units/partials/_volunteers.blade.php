<table id="volunteersTable" class="display table table-striped data-table" cellspacing="0" width="100%"
       data-unit-id="{{ $unit->id }}">
    <thead>
    <tr>
        <th>{{ trans('entities/volunteers.id') }}</th>
        <th>{{ trans('entities/volunteers.name') }}</th>
        <th>{{ trans('entities/volunteers.email') }}</th>
        <th>{{ trans('entities/volunteers.address') }}</th>
        <th>{{ trans('entities/volunteers.phone') }}</th>
        <th>{{ trans('entities/volunteers.status') }}</th>
    </tr>
    </thead>

    <tfoot>
    <tr>
    <tr>
        <th>{{ trans('entities/volunteers.id') }}</th>
        <th>{{ trans('entities/volunteers.name') }}</th>
        <th>{{ trans('entities/volunteers.email') }}</th>
        <th>{{ trans('entities/volunteers.address') }}</th>
        <th>{{ trans('entities/volunteers.phone') }}</th>
        <th>{{ trans('entities/volunteers.status') }}</th>
    </tr>
    </tfoot>
</table>


@section('footerScripts')
<script>
    var table = $('#volunteersTable').dataTable({
        "bFilter": false,
        "ajax": $("body").attr('data-url') + '/api/units/' + $('#volunteersTable').attr('data-unit-id') + '/volunteers',
        "columns": [
            {data: "id"},
            {
                //concat first name with last name
                data: null, render: function (data, type, row) {
                return '<a href="' + $("body").attr('data-url') + '/volunteers/one/' + data.id + '">' + data.name + ' ' + data.last_name + '</a>';
            }
            },
            {
                //make email address clickable
                data: null, render: function (data, type, row) {
                return '<a href="mailto:' + data.email + '">' + data.email + '</a>';
            }
            },
            {
                //concat address with city, post box and country
                data: null, render: function (data, type, row) {
                var address = '';
                if (data.address != null && data.address != '')
                    address += data.address;
                if (data.city != null && data.city != '')
                    address += ', ' + data.city;
                if (data.post_box != null && data.post_box != '')
                    address += ', ' + data.post_box;
                if (data.country != null && data.country != '')
                    address += ', ' + data.country;

                return address;
            }
            },
            {
                //concat all phones
                data: null, render: function (data, type, row) {
                var phones = '';
                if (data.cell_tel != null && data.cell_tel != '')
                    phones += data.cell_tel;
                if (data.home_tel != null && data.home_tel != '')
                    phones += '<br/>' + data.home_tel;
                if (data.work_tel != null && data.work_tel != '')
                    phones += '<br/>' + data.work_tel;

                return phones;
            }
            },
            {
                // display unit statuses
                data: null, render: function (data, type, row) {
                var status = '';
                console.log(data);
                if (data.units[0].status == 'Pending')
                    status += '<div class="status pending">' + Lang.get('js-components.pending') + '</div>';
                else if (data.units[0].status == 'Available')
                    status += '<div class="status available">' + Lang.get('js-components.available') + '</div>';
                else if (data.units[0].status == 'Active')
                    status += '<div class="status active">' + Lang.get('js-components.active') + '</div>';

                return status;
            }
            }
        ],
        //custom text
        "language": {
            "lengthMenu": Lang.get('js-components.lengthMenu'),
            "zeroRecords": Lang.get('js-components.zeroVolunteers'),
            "info": Lang.get('js-components.info'),
            "infoEmpty": Lang.get('js-components.zeroVolunteers'),
            "paginate": {
                "first": Lang.get('js-components.first'),
                "last": Lang.get('js-components.last'),
                "next": ">",
                "previous": "<"
            }
        },
        dom: 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": $("body").attr('data-url') + "/assets/plugins/data-tables/extras/tabletools/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {
                    "sExtends": "copy",
                    "sButtonText": Lang.get('js-components.copy')
                },
                {
                    "sExtends": "print",
                    "sButtonText": Lang.get('js-components.print')
                },
                {
                    "sExtends": "csv",
                    "sButtonText": Lang.get('js-components.csv')
                }
            ]
        }
    });

</script>
@append
