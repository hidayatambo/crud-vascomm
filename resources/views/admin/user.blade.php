@extends('admin.master')
@section('content')
    <div class="row mt-4">
        <div class="col-10">
            <h3>Manajemen User</h3>
        </div>
        <div class="col">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUserModal">
                Tambah User
            </button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <table class="table table-striped" id="userTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Modal Tambah Produk -->
        <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="tambahForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Tambah user</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form fields for editing product -->
                            <div class="mb-3">
                                <label for="edit-name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="edit-name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="edit-email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="edit-email" name="email">
                            </div>
                            <!-- Other form fields -->

                            <!-- Image preview -->
                            <div class="mb-3">
                                <label for="edit-image" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="edit-telepon" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="edit-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="edit-password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="edit-confirm-password" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="edit-confirm-password"
                                    name="password_confirmation">
                            </div>
                            <!-- Status selection -->
                            <div class="mb-3">
                                <label for="edit-status" class="form-label">Status user</label>
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


        {{-- modal edit produk  --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit user</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form fields for editing product -->
                            <div class="mb-3">
                                <label for="edit-name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="edit-name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="edit-email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="edit-email" name="email">
                            </div>
                            <!-- Other form fields -->

                            <!-- Image preview -->
                            <div class="mb-3">
                                <label for="edit-image" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="edit-telepon" name="phone">
                            </div>

                            <!-- Status selection -->
                            <div class="mb-3">
                                <label for="edit-status" class="form-label">Status user</label>
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

        <!-- Modal Hapus user -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="deleteForm">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus user</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus user ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="button" id="deleteBtn" class="btn btn-danger">Hapus</button>
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
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.user') }}',
                columns: [{
                        data: 'id',
                        name: 'id',
                    }, // Kolom nomor urut
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
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
            var editEmailInput = $('#edit-email');
            var editTeleponInput = $('#edit-telepon');
            var editStatusInput = $('#edit-status');
            // Tampilkan modal Edit saat tombol Edit ditekan
            $('#userTable').on('click', '.edit-btn', function() {
                var productId = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.user.edit', '') }}" + '/' +
                        productId, // Ganti URL dengan route yang benar
                    method: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        editForm.attr('action', "{{ route('admin.user.update', '') }}" + '/' +
                            productId); // Ganti URL dengan route yang benar
                        editNameInput.val(response.name);
                        editEmailInput.val(response.email);
                        editTeleponInput.val(response.phone_number);
                        editStatusInput.val(response.status);
                        editModal.modal('show');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil data user.');
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
                        $('#userTable').DataTable().ajax.reload();
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menyimpan perubahan produk.');
                    }
                });
            });

            var tambahModal = $('#tambahUserModal');
            var tambahForm = $('#tambahForm');
            // Proses submit form tambah
            tambahForm.on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                formData.append('password', $('#edit-password').val());
                formData.append('password_confirmation', $('#edit-confirm-password').val());

                $.ajax({
                    url: "{{ route('admin.user.store') }}", // Ubah sesuai route Anda
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        tambahModal.modal('hide');
                        $('#userTable').DataTable().ajax.reload();
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menambahkan user.');
                    }
                });
            });
            // Tampilkan modal Delete saat tombol Delete ditekan
            $('#userTable').on('click', '.delete-btn', function() {
                var productId = $(this).data('id');
                $('#deleteForm').attr('action', "{{ url('admin/user') }}" + '/' + productId);
                $('#deleteModal').modal('show');
            });
            $('#deleteModal').on('click', '#deleteBtn', function() {
                var productId = $('#deleteForm').attr('action').split('/').pop();
                $.ajax({
                    url: "{{ route('admin.user.destroy', '') }}" + '/' + productId,
                    method: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#deleteModal').modal('hide');
                        // Refresh or reload the DataTable
                        $('#userTable').DataTable().ajax.reload();
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus user.');
                    }
                });
            });
        });
    </script>
@endpush
