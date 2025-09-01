@extends('layouts.admin.app')
@section('title', 'Success Stories Admin')

@section('content')
<section>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="p-4">
                <!-- Header -->
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
                    <div class="mb-3 mb-sm-0">
                        <h2 class="h5 mb-1">Success Stories</h2>
                        <p class="small">
                            Manage your success stories here ({{ $stories->total() }} total)
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <form method="GET" action="{{ route('admin.success-stories.index') }}" class="d-flex gap-2">
                            <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                                <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                                <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                                <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                            </select>
                            <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" placeholder="Search success stories..."
                                value="{{ request('search') }}">
                        </form>
                        <a href="{{ route('admin.success-stories.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add new story
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
                                <th scope="col">Title</th>
                                <th scope="col">Student</th>
                                <th scope="col">Country</th>
                                <th scope="col">Service</th>
                                <th scope="col">Published</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stories as $index => $story)
                                <tr>
                                    <td>{{ $stories->firstItem() + $index }}</td>
                                    <td>
                                        @if($story->image)
                                            <img src="{{ asset('storage/'.$story->image) }}" alt="story-img" class="img-thumbnail" style="width:100px; height:100px; object-fit:cover;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $story->title }}</td>
                                    <td class="text-capitalize">{{ $story->student_name }}</td>
                                    <td>{{ $story->country ?? 'N/A' }}</td>
                                    <td>{{ $story->service ?? 'N/A' }}</td>
                                    <td>
                                        {!! $story->is_published ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.success-stories.edit', $story) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.success-stories.destroy', $story) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this success story?');">
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
                                    <td colspan="8" class="text-center">No success stories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
                    <div class="mb-3 mb-sm-0">
                        Showing {{ $stories->firstItem() ?? 0 }} to {{ $stories->lastItem() ?? 0 }} of {{ $stories->total() }} success stories
                    </div>
                    <nav aria-label="Success story pagination">
                        {{ $stories->withQueryString()->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection