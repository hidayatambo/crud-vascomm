@extends('admin.master')
@section('content')
    <div class="row mt-4">
        <div class="col-10">
            <h3>Manajemen Produk</h3>
        </div>
        <div class="col">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
                Tambah Produk
            </button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <table class="table table-striped" id="productTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Modal Tambah Produk -->
        <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="tambahForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form fields for adding product -->
                            <div class="mb-3">
                                <label for="tambah-name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="tambah-name" name="name">
                            </div>
                            <!-- Field for harga -->
                            <div class="mb-3">
                                <label for="tambah-price" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="tambah-price" name="price">
                            </div>
                            <!-- Field for status -->
                            <div class="mb-3">
                                <label for="tambah-status" class="form-label">Status Produk</label>
                                <select class="form-control" id="tambah-status" name="status">
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                            <!-- Image upload -->
                            <div class="mb-3">
                                <label for="tambah-image" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="tambah-image" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- modal edit produk  --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form fields for editing product -->
                            <div class="mb-3">
                                <label for="edit-name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="edit-name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="edit-harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="edit-harga" name="price">
                            </div>
                            <!-- Other form fields -->

                            <!-- Image preview -->
                            <div class="mb-3">
                                <label for="edit-image" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="edit-image" name="image">
                            </div>

                            <!-- Status selection -->
                            <div class="mb-3">
                                <label for="edit-status" class="form-label">Status Produk</label>
                                <select class="form-control" id="edit-status" name="status">
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Produk -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="deleteForm">
                        @csrf
                        <div class="modal-header" style="border: none; margin: 0;">
                            <h5 class="modal-title" id="deleteModalLabel"><img src="{{asset('admin/images/logout.png')}}" style="margin-left: -15px; margin-top: -15px;" alt="" srcset=""></h5>
                        </div>
                        <div class="modal-body"> <br><br>
                            <h3 class="text-center">Konfirmasi Hapus</h3>

                            <p class="text-center text-muted">Apakah Anda yakin ingin menghapus <span id="deleteProductName"></span>?</p>
                        </div>
                        <div class="modal-footer mt-2 mb-2">
                            <br>
                            <button type="button" class="btn btn-light text-muted mt-3" data-bs-dismiss="modal" style="color: #ffffff">Tidak</button>
                            <button type="button" id="deleteBtn" class="btn mt-3" style="background-color: #41A0E4; color: #ffffff">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            function formatRupiah(number) {
                var formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                });
                return formatter.format(number);
            }

            function formatRupiahK(angka, prefix = 'Rp ') {
                var numberString = angka.replace(/[^,\d]/g, '').toString();
                var splitDecimal = numberString.split(',');
                var wholeNumber = splitDecimal[0];
                var decimalValue = splitDecimal[1] ? ',' + splitDecimal[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(wholeNumber)) {
                    wholeNumber = wholeNumber.replace(rgx, '$1' + '.' + '$2');
                }
                return prefix + wholeNumber + decimalValue;
            }
            $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.produk') }}',
                columns: [{
                        data: 'id',
                        name: 'id',
                        title: 'No'
                    }, // Kolom nomor urut
                    {
                        data: 'name',
                        name: 'name',
                        title: 'Nama'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        title: 'Harga',
                        render: function(data) {
                            return formatRupiah(data); // Format harga menjadi rupiah
                        }
                    },
                    {
                        data: 'image',
                        name: 'image',
                        title: 'Gambar',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        title: 'Status',
                        render: function(data) {
                            if (data == 1) {
                                return '<span class="badge bg-success">Aktif</span>';
                            } else {
                                return '<span class="badge bg-danger">Nonaktif</span>';
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [1, 'asc'] // Urutkan berdasarkan kolom nama secara menaik
                ],
                rowCallback: function(row, data, index) {
                    var api = this.api();
                    var startIndex = api.page() * api.page.len();
                    var currentRowNumber = startIndex + index + 1;
                    $('td:eq(0)', row).html(currentRowNumber); // Kolom pertama untuk nomor urut
                }
            });
            var editModal = $('#editModal');
            var editForm = $('#editForm');
            var editNameInput = $('#edit-name');
            var editHargaInput = $('#edit-harga');
            var editImageInput = $('#edit-image');
            var editStatusInput = $('#edit-status');
            // Tampilkan modal Edit saat tombol Edit ditekan
            $('#productTable').on('click', '.edit-btn', function() {
                var productId = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.produk.edit', '') }}" + '/' +
                        productId, // Ganti URL dengan route yang benar
                    method: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        editForm.attr('action', "{{ route('admin.produk.update', '') }}" + '/' +
                            productId); // Ganti URL dengan route yang benar
                        editNameInput.val(response.name);
                        editStatusInput.val(response.status);
                        editHargaInput.val(formatRupiah(response.price)); // Tambahkan baris ini
                        editModal.modal('show');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil data produk.');
                    }
                });
            });

            // Proses submit form edit
            editForm.on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: editForm.attr('action'),
                    method: 'POST', // Ganti method menjadi POST
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        editModal.modal('hide');
                        // $('#productTable').DataTable().ajax.reload();
                        window.location.reload();
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menyimpan perubahan produk.');
                    }
                });
            });


             // Tampilkan modal konfirmasi delete saat tombol Delete ditekan
            $('#productTable').on('click', '.delete-btn', function() {
                var productId = $(this).data('id');
                var productName = $(this).data('name');
                $('#deleteProductName').text(productName); 
                $('#deleteForm').attr('action', "{{ url('admin/produk') }}" + '/' + productId);
                $('#deleteModal').modal('show');
            });

            // Proses hapus saat tombol Hapus di modal konfirmasi ditekan
            $('#deleteModal').on('click', '#deleteBtn', function() {
                var productId = $('#deleteForm').attr('action').split('/').pop();
                $.ajax({
                    url: "{{ route('admin.produk.destroy', '') }}" + '/' + productId,
                    method: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#deleteModal').modal('hide');
                        // Refresh or reload the DataTable
                        // $('#productTable').DataTable().ajax.reload();
                        window.location.reload();

                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus produk.');
                    }
                });
            });
            var tambahModal = $('#tambahProdukModal');
            var tambahForm = $('#tambahForm');
            // Proses submit form tambah
            tambahForm.on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.produk.store') }}", // Ubah sesuai route Anda
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        tambahModal.modal('hide');
                        // $('#productTable').DataTable().ajax.reload();
                        window.location.reload();
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menambahkan produk.');
                    }
                });
            });
            $('#tambah-price').on('keyup', function() {
                var value = $(this).val();
                $(this).val(formatRupiahK(value, 'Rp '));
            });
            $('#edit-harga').on('keyup', function() {
                var value = $(this).val();
                $(this).val(formatRupiahK(value, 'Rp '));
            });

        });
    </script>
@endpush
