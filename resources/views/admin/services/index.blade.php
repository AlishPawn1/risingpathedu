@extends('layouts.admin')
@section('title','Services')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Services</h1>
  <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add Service</a>
</div>

<table class="table table-striped align-middle">
  <thead><tr>
    <th>#</th><th>Title</th><th>Slug</th><th>Active</th><th>Order</th><th></th>
  </tr></thead>
  <tbody>
  @foreach($services as $s)
    <tr>
      <td>{{ $s->id }}</td>
      <td>{{ $s->title }}</td>
      <td>{{ $s->slug }}</td>
      <td>{!! $s->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
      <td>{{ $s->display_order }}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-warning" href="{{ route('admin.services.edit',$s) }}">Edit</a>
        <form class="d-inline" method="POST" action="{{ route('admin.services.destroy',$s) }}"
              onsubmit="return confirm('Delete this service?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{ $services->links() }}
@endsection
