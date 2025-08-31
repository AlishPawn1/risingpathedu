@extends('layouts.admin.app')
@section('title', 'FAQ Categories Admin')

@section('content')
    <section>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="p-4">
                    <!-- Header -->
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
                        <div class="mb-3 mb-sm-0">
                            <h2 class="h5 mb-1">FAQ Categories</h2>
                            <p class="small">
                                Manage your FAQ categories here ({{ $categories->total() }} total)
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <form method="GET" action="{{ route('admin.faq-categories.index') }}" class="d-flex gap-2">
                                <!-- Show dropdown -->
                                <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                                    <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                                    <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                                    <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                                </select>
                                <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" placeholder="Search categories..." value="{{ request('search') }}">
                            </form>
                            <!-- Create button -->
                            <a href="{{ route('admin.faq-categories.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add new category
                            </a>
                        </div>
                    </div>

                    <!-- Table View -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $categories->firstItem() + $index }}</td>
                                        <td class="text-capitalize">{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.faq-categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.faq-categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
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
                                        <td colspan="5" class="text-center">No categories found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
                        <div class="mb-3 mb-sm-0">
                            Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} categories
                        </div>
                        <nav aria-label="Category pagination">
                            {{ $categories->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection