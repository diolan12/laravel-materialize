@extends('base.dashboard')
@section('extra-css')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/sp-2.1.2/sl-1.6.2/datatables.min.css" rel="stylesheet">
    <style>
        /* DataTables searchpanes extension */
        div.dtsp-panesContainer div.dataTables_wrapper div.dataTables_scrollBody {
            background: var(--background-color-card) !important;
        }

        .dtsp-searchCont input::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: var(--font-color-medium) !important;
            opacity: 1;
            /* Firefox */
        }

        .dtsp-searchCont input:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: var(--font-color-medium) !important;
        }

        .dtsp-searchCont input::-ms-input-placeholder {
            /* Microsoft Edge */
            color: var(--font-color-medium) !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <table id="example-table" class="display responsive-table striped highlight">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Favourite Color</th>
                            <th>Date Of Birth</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Oli Bob</td>
                            <td>12</td>
                            <td>red</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Mary May</td>
                            <td>1</td>
                            <td>blue</td>
                            <td>14/05/1982</td>
                        </tr>
                        <tr>
                            <td>Christine Lobowski</td>
                            <td>42</td>
                            <td>green</td>
                            <td>22/05/1982</td>
                        </tr>
                        <tr>
                            <td>Brendon Philips</td>
                            <td>125</td>
                            <td>orange</td>
                            <td>01/08/1980</td>
                        </tr>
                        <tr>
                            <td>Margret Marmajuke</td>
                            <td>16</td>
                            <td>yellow</td>
                            <td>31/01/1999</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.4/sp-2.1.2/sl-1.6.2/datatables.min.js">
    </script>
    <script>
        let table = new DataTable('#example-table', {
            responsive: true,
            dom: 'Plfrtip',
            // searching: true,
            serverSide: false,
            bAutoWidth: false,
            processing: false,
            // stateSave: true,
            // scrollX: true,
            // scrollY: "500px",
            scrollCollapse: true,
            fixedColumns: {
                left: 1
            },
            select: true,
            searchPanes: {
                columns: [1, 2, 3],
                viewTotal: true
            },
            columnDefs: [{
                searchPanes: {
                    show: true,
                    viewTotal: true
                },
                targets: [1, 2, 3],
            }],
            paging: true,
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ],
        });
    </script>
@endsection
