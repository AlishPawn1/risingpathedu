@extends('layouts.admin.app')
@section('title', 'Service Admin')

@section('content')
  <section>
    <div class="container-fluid py-4">
      <div class="card">
        <div class="p-4">
          <div
            class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
            <div class="mb-3 mb-sm-0">
              <h2 class="h5 mb-1">Services</h2>
              <p class="small">Manage your services here ({{ $services->total() }} total)</p>
            </div>
            <div class="d-flex align-items-center gap-4">
              <form method="GET" action="{{ route('admin.services.index') }}" class="d-flex gap-2">
                <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                  <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                  <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                  <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                </select>
                <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" placeholder="Search services..."
                  value="{{ request('search') }}">
              </form>
              <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add new service
              </a>
            </div>
          </div>

          <!-- Table View -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Short Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($services as $index => $service)
                  <tr>
                    <td>{{ $services->firstItem() + $index }}</td>
                    <td>
                      @if ($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-thumbnail"
                          style="width: 80px; height: 80px; object-fit: cover;">
                      @else
                        <img src="{{ asset('assets/img/service/placeholder.jpg') }}" alt="placeholder" class="img-thumbnail"
                          style="width: 80px; height: 80px; object-fit: cover;">
                      @endif
                    </td>
                    <td class="text-capitalize">{{ $service->title }}</td>
                    <td>
                      {!! $service->is_active
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-secondary">Inactive</span>' !!}
                    </td>
                    <td>{!! Str::limit($service->short_description, 50) !!}</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this service?');">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center">No services found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
            <div class="mb-3 mb-sm-0">
              Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} services
            </div>
            <nav aria-label="Service pagination">
              {{ $services->links() }}
            </nav>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection