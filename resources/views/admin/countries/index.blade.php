@extends('layouts.admin')
@section('title','Countries')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Countries</h1>
  <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">Add Country</a>
</div>

<table class="table table-striped align-middle">
  <thead><tr>
    <th>#</th><th>Name</th><th>Slug</th><th>Code</th><th>Active</th><th></th>
  </tr></thead>
  <tbody>
  @foreach($countries as $c)
    <tr>
      <td>{{ $c->id }}</td>
      <td>{{ $c->name }}</td>
      <td>{{ $c->slug }}</td>
      <td>{{ $c->code }}</td>
      <td>{!! $c->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-warning" href="{{ route('admin.countries.edit',$c) }}">Edit</a>
        <form class="d-inline" method="POST" action="{{ route('admin.countries.destroy',$c) }}"
              onsubmit="return confirm('Delete this country?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{ $countries->links() }}
@endsection
