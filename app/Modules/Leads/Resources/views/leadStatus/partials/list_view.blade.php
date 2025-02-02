<div id="listViewss" >

    <style>
        /* Force table and thead to take 100% width */
        #currencies-table {
            width: 100% !important;
            table-layout: auto;
            /* Allow column width to adjust naturally */
        }

        #currencies-table thead {
            display: table-header-group;
            /* Ensure proper display */
            width: 100% !important;
        }
    </style>

    <table id="currencies-table" class="table  table-bordered" >
        <thead>
            <tr>
                {{-- <th><input type="checkbox" id="select-all"></th> --}}
                <th>Name</th>
                <th>Color</th>
                <th>Order</th>
{{--                <th>Leads</th>--}}
                <th>Actions</th>
            </tr>
        </thead>
    </table>

</div>
