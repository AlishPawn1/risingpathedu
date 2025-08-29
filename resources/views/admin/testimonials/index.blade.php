@extends('layouts.admin.app')
@section('title', 'Testimonial Admin')

@section('content')
<section>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="p-4">
                <!-- Header -->
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
                    <div class="mb-3 mb-sm-0">
                        <h2 class="h5 mb-1">Testimonials</h2>
                        <p class="small">
                            Manage your testimonials here ({{ $testimonials->total() }} total)
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <form method="GET" action="{{ route('admin.testimonials.index') }}" class="d-flex gap-2">
                            <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                                <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                                <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                                <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                            </select>
                            <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" placeholder="Search testimonials..."
                                value="{{ request('search') }}">
                        </form>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add new testimonial
                        </a>
                    </div>
                </div>

                <!-- Table View -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Post</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($testimonials as $index => $testimonial)
                                <tr>
                                    <td>{{ $testimonials->firstItem() + $index }}</td>
                                    <td>
                                        @if($testimonial->image)
                                            <img src="{{ asset('storage/'.$testimonial->image) }}" alt="testimonial-img" class="img-thumbnail" style="width:100px; height:100px; object-fit:cover;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-capitalize">{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->post }}</td>
                                    <td>{!! Str::limit($testimonial->description, 50) !!}</td>
                                    <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
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
                                    <td colspan="7" class="text-center">No testimonials found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
                    <div class="mb-3 mb-sm-0">
                        Showing {{ $testimonials->firstItem() ?? 0 }} to {{ $testimonials->lastItem() ?? 0 }} of {{ $testimonials->total() }} testimonials
                    </div>
                    <nav aria-label="Testimonial pagination">
                        {{ $testimonials->withQueryString()->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection