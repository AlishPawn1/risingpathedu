@extends('layouts.admin')
@section('title','Success Stories')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Success Stories</h1>
  <a href="{{ route('admin.success-stories.create') }}" class="btn btn-primary">Add Story</a>
</div>

<table class="table table-striped align-middle">
  <thead><tr>
    <th>#</th><th>Title</th><th>Student</th><th>Country</th><th>Service</th><th>Published</th><th></th>
  </tr></thead>
  <tbody>
  @foreach($stories as $st)
    <tr>
      <td>{{ $st->id }}</td>
      <td>{{ $st->title }}</td>
      <td>{{ $st->student_name }}</td>
      <td>{{ $st->country?->name }}</td>
      <td>{{ $st->service?->title }}</td>
      <td>{!! $st->is_published ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-warning" href="{{ route('admin.success-stories.edit',$st) }}">Edit</a>
        <form class="d-inline" method="POST" action="{{ route('admin.success-stories.destroy',$st) }}"
              onsubmit="return confirm('Delete this story?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{ $stories->links() }}
@endsection
