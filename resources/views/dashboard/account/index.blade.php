@extends('base.dashboard')
@section('extra-css')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/sp-2.1.2/sl-1.6.2/datatables.min.css" rel="stylesheet">
    <style>
        /* DataTables searchpanes extension */
        div.dtsp-panesContainer div.dataTables_wrapper div.dataTables_scrollBody {
            background: var(--background-color-card) !important;
        }

        .dtsp-searchCont input:hover {
            background: var(--background-color-card) !important;

        }

        div.dtsp-topRow.dtsp-bordered:hover {
            background-color: var(--focus-color) !important;
        }

        /* Searchpane button */
        button.dtsp-paneButton {
            background-color: var(--font-color-medium) !important;
            border-radius: 50%;
        }

        button.dtsp-paneButton:hover {
            background-color: var(--font-color-main) !important;
            border-radius: 50% !important;
        }

        /* Placeholder color */
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

        /* PLaceholder color hover */
        .dtsp-searchCont input:hover::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: var(--font-color-main) !important;
            opacity: 1;
            /* Firefox */
        }

        .dtsp-searchCont input:hover:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: var(--font-color-medium) !important;
        }

        .dtsp-searchCont input:hover::-ms-input-placeholder {
            /* Microsoft Edge */
            color: var(--font-color-medium) !important;
        }

        /* Filter pill */
        span.dtsp-pill {
            background-color: var(--primary-color) !important;
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
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data->users as $user):?>
                        <tr>
                            <td><?= $user->name?></td>
                            <td><?= $user->email?></td>
                        </tr>
                        <?php endforeach;?>
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
                columns: [0, 1],
                viewTotal: true
            },
            columnDefs: [{
                searchPanes: {
                    show: true,
                    viewTotal: true
                },
                targets: [0, 1],
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
