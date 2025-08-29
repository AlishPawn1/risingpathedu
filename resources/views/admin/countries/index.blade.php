@extends('layouts.admin.app')
@section('title', 'Countries Admin')

@section('content')
  <section>
    <div class="container-fluid py-4">
      <div class="card">
        <div class="p-4">
          <!-- Header -->
          <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
            <div class="mb-3 mb-sm-0">
              <h2 class="h5 mb-1">Countries</h2>
              <p class="small">
                Manage your countries here ({{ $countries->total() }} total)
              </p>
            </div>
            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-3">
              <form method="GET" action="{{ route('admin.countries.index') }}" class="d-flex flex-column flex-sm-row gap-2">
                <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" placeholder="Search countries..."
                  value="{{ request('search') }}">
                <select class="form-select w-auto mb-3 mb-sm-0" style="min-width: 200px" name="active"
                  onchange="this.form.submit()">
                  <option value="">All Status</option>
                  <option value="1" {{ request('active') == '1' ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ request('active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                  <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                  <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                  <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                </select>
              </form>
              <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">
                  <i class="fas fa-plus me-2"></i>Add new country
                </a>
              </div>
            </div>
          </div>

          <!-- Table View -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">S.N</th>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Active</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($countries  as $c)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      @if($c->flag)
                        <img src="{{ asset('storage/' . $c->flag) }}" class="img-thumbnail" style="max-height: 100px;">
                      @endif
                    </td>
                    <td>{{ $c->name }}</td>
                    <td>
                      <span class="badge bg-{{ $c->is_active ? 'success' : 'secondary' }}">
                        {{ $c->is_active ? 'Yes' : 'No' }}
                      </span>
                    </td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.countries.edit', $c) }}" class="btn btn-sm btn-outline-primary"
                          aria-label="Edit country {{ $c->name }}">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.countries.destroy', $c) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this country?');">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-outline-danger" aria-label="Delete country {{ $c->name }}">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="text-center text-muted">No countries found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
            <div class="mb-3 mb-sm-0">
              Showing {{ $countries->firstItem() ?? 0 }} to {{ $countries->lastItem() ?? 0 }} of {{ $countries->total() }} countries
            </div>
            <nav>
              {{ $countries->links('pagination::bootstrap-4') }}
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection