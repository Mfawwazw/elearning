@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>+ Student</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Student</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <divclass="card">
        <div class="card-body">
            <form action="/admin/course/store" method="post" class="mt-3">
                @csrf
                <div class="mb-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" name="category" id="category" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <input type="text" name="desc" id="desc" class="form-control">
                </div>





                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </section>

@endsection