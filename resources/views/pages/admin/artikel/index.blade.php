@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
                <a href="#">Kelola Artikel</a>
                <h4 class="page-title"></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="/admin">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Artikel</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Kelola Artikel</a>
            </li>
        </ul>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kelola Data Artikel</h4>
                </div>
                <div class="card-body">
                    <button href="#" class="btn btn-primary" data-bs-target="#artikel1" data-bs-toggle="modal">Tambah Data</button>
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th style="width: 5px;">No</th>
                                    <th>Gambar</th>
                                    <th>Nama Artikel</th>
                                    <th>Deskripsi</th>
                                    <th>Deskripsi 2</th>
                                    <th>Deskripsi 2</th> 
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @php
                                use Illuminate\Support\Str;
                            @endphp
                            <tbody>
                                @foreach ($artikels as $artikel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ url('images/'.$artikel->image) }}" width="150px" height="100px"></td>
                                    <td>{{ $artikel->name }}</td>
                                    <td>{{ Str::limit($artikel->description, 20) }}</td>
                                    <td>{{ Str::limit($artikel->description2, 20) }}</td>
                                    <td>{{ Str::limit($artikel->description3, 20) }}</td>
                                    <td class="m-40">
                                        <br><br>
                                        <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                            onclick="event.preventDefault(); confirmDelete({{ $artikel->id }});">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="delete-form-{{ $artikel->id }}" action="{{ route('artikel.delete', $artikel->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                            
                                        <button class="btn btn-sm btn-warning edit-btn" 
                                                data-bs-target="#updateArtikel"
                                                data-bs-toggle="modal"
                                                data-id="{{ $artikel->id }}"
                                                data-image="{{ url('images/' . $artikel->image) }}"
                                                data-name="{{ $artikel->name }}"
                                                data-description="{{ $artikel->description }}"
                                                data-description2="{{ $artikel->description2 }}"
                                                data-description3="{{ $artikel->description3 }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button><br><br><br>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<!-- Modal Tambah Data -->
<div class="modal fade" id="artikel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                <button style="border: none; width: 30px; height: 30px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="image" class="form-label">Gambar</label>
                      <input type="file" placeholder="Gambar" class="form-control" id="image"  name="image" aria-describedby="imageHelp">
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Artikel</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description2" class="form-label">Deskripsi 2</label>
                        <textarea class="form-control" id="description2" name="description2" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description3" class="form-label">Deskripsi 3</label>
                        <textarea class="form-control" id="description3" name="description3" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                  </form>
            </div>
            
        </div>
    </div>
</div>


<!-- Modal Update Data -->
<div class="modal fade" id="updateArtikel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                <button style="border: none; width: 30px; height: 30px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Sebelumnya</label><br>
                        <img id="previousImage" src="" alt="Gambar Sebelumnya" style="max-width: 100%; height: auto;">
                        <p id="noPreviousImage" style="display: none;">Tidak ada gambar sebelumnya</p>
                    </div>

                    <!-- Upload Gambar Baru -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Baru</label>
                        <input type="file" placeholder="Gambar" class="form-control" id="image" name="image" aria-describedby="imageHelp">
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Artikel</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description2" class="form-label">Deskripsi 2</label>
                        <textarea class="form-control" id="description2" name="description2" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description3" class="form-label">Deskripsi 3</label>
                        <textarea class="form-control" id="description3" name="description3" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- alert delete --}}
<script>
    function confirmDelete(id) {
        swal.fire({
            title: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var updateModal = document.getElementById('updateArtikel');
        updateModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Tombol yang mengaktifkan modal
            var id = button.getAttribute('data-id');
            var image = button.getAttribute('data-image');
            var name = button.getAttribute('data-name');
            var description = button.getAttribute('data-description');
            var description2 = button.getAttribute('data-description2');
            var description3 = button.getAttribute('data-description3');
            
            // Update form action URL
            var form = updateModal.querySelector('#updateForm');
            form.action = '/artikel/' + id;

            // Update modal form fields
            // form.querySelector('#image').value = image;
            form.querySelector('#name').value = name;
            form.querySelector('#description').value = description;
            form.querySelector('#description2').value = description2;
            form.querySelector('#description3').value = description3;

            // Update previous image
            var previousImage = form.querySelector('#previousImage');
            var noPreviousImage = form.querySelector('#noPreviousImage');
            if (image && image !== 'undefined' && image !== 'null') {
                previousImage.src = image;
                previousImage.style.display = 'block';
                noPreviousImage.style.display = 'none';
            } else {
                previousImage.style.display = 'none';
                noPreviousImage.style.display = 'block';
            }
        });
    });
</script>
@endpush

@endsection





