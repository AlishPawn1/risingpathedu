@extends('layouts.admin.app')
@section('title', 'Blog Admin')

@section('content')
  <section>
    <div class="container-fluid py-4">
      <div class="card">
        <div class="p-4">
          <!-- Header -->
          <div
            class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
            <div class="mb-3 mb-sm-0">
              <h2 class="h5 mb-1">Blogs</h2>
              <p class="small">
                Manage your blogs here ({{ $blogs->total() }} total)
              </p>
            </div>
            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-3">
              <form method="GET" action="{{ route('admin.blogs.index') }}" class="d-flex flex-column flex-sm-row gap-2">
                <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" placeholder="Search blogs..."
                  value="{{ request('search') }}">
                <select class="form-select w-auto mb-3 mb-sm-0" style="min-width: 200px" name="status"
                  onchange="this.form.submit()">
                  <option value="">All Status</option>
                  <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                  <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
                <select class="form-select w-auto mb-3 mb-sm-0" style="min-width: 200px" name="category"
                  onchange="this.form.submit()">
                  <option value="">All Categories</option>
                  @foreach($categories as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}
                    </option>
                  @endforeach
                </select>
                <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                  <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                  <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                  <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                </select>
              </form>
              <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                  <i class="fas fa-plus me-2"></i>Add new blogs
                </a>
              </div>
            </div>
          </div>

          <!-- Table View -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SN</th>
                  <th scope="col">Image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">Categories</th>
                  <th scope="col">Tags</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($blogs as $index => $blog)
                  <tr>
                    <td>{{ ($blogs->currentPage() - 1) * $blogs->perPage() + $index + 1 }}</td>
                    <td>
                      @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-thumbnail"
                          style="width: 100px; height: 100px; object-fit: cover;">
                      @else
                        <img src="{{ asset('images/default.png') }}" alt="No image" class="img-thumbnail"
                          style="width: 100px; height: 100px; object-fit: cover;">
                      @endif
                    </td>
                    <td class="text-capitalize">{{ $blog->title }}</td>
                    <td>{{ $blog->author }}</td>
                    <td>
                      @foreach($blog->categories()->get() as $category)
                        <span class="badge bg-primary me-1 mb-1">{{ $category->name }}</span>
                      @endforeach
                    </td>
                    <td>
                      @foreach($blog->tags()->get() as $tag)
                        <span class="badge bg-secondary me-1 mb-1">{{ $tag->name }}</span>
                      @endforeach
                    </td>
                    <td>{{ $blog->created_at->format('M d, Y') }}</td>
                    <td>
                      <span class="badge bg-{{ $blog->status == 'published' ? 'success' : 'warning' }}">
                        {{ ucfirst($blog->status) }}
                      </span>
                    </td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-outline-primary"
                          aria-label="Edit blog {{ $blog->title }}">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this blog?');">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-outline-danger" aria-label="Delete blog {{ $blog->title }}">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center text-muted">No blogs found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
            <div class="mb-3 mb-sm-0">
              Showing {{ $blogs->firstItem() ?? 0 }} to {{ $blogs->lastItem() ?? 0 }} of {{ $blogs->total() }} blogs
            </div>
            <nav>
              {{ $blogs->links('pagination::bootstrap-4') }}
            </nav>
          </div>
        </div>
      </div>
  </section>
@endsection