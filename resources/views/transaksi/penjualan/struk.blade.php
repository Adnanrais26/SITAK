    <html>

    <head>
        <!-- css tambahan  -->
        {{-- <link href="{{ asset('backend/css/root.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    </head>

    <body>

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    {{-- <th>Kode Produk</th> --}}
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Unit</th>
                    <th>Harga</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($struk as $penjualan2)
                        <tr>
                    <input type="text" class="form-control" id="input1"
                        name="userId" readonly
                        value="{{ $penjualan2->id }}">
                        <td>{{ ++$i }}</td>
                        <td>{{ $penjualan2->kodeProduk }}</td>
                        <td>{{ $penjualan2->obat }}</td>
                        <td>{{ $penjualan2->jumlah }}</td>
                        <td>{{ $penjualan2->unit }}</td>
                        <td>{{ $penjualan2->hargaJual }}</td>
                        <td>{{ $penjualan2->total }}</td>
                        </td>
                        </tr>
                        @endforeach
                </tr>
        </table>
    </body>

    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>

    <!-- ================================================
    Bootstrap Core JavaScript File
    ================================================ -->
    <script src="{{ asset('backend/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- jquery datatable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js">
    </script>

    <!-- script tambahan  -->
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js">
    </script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });

    </script>

    </html>
