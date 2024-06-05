@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Course</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <divclass="card">
        <div class="card-body">
            <a href="/admin/course/create" class="btn btn-primary my-3">+ Admin</a>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $course->name}}</td>
                        <td>{{ $course->category}}</td>
                        <td>{{ $course->desc}}</td>
                        <td class="d-flex">
                            <a href="/admin/course/edit/{{$course->id}}" class="btn btn-warning me-2">Edit</a>
                            <form action="/admin/course/delete/{{$course->id}}" method="post">
                              @method('DELETE')
                              @csrf
                              <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
  </section>

@endsection