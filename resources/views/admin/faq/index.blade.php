@extends('layouts.admin.app')
@section('title', 'FAQs Admin')

@section('content')
    <section>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="p-4">
                    <!-- Header -->
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
                        <div class="mb-3 mb-sm-0">
                            <h2 class="h5 mb-1">FAQs</h2>
                            <p class="small">
                                Manage your FAQs here ({{ $faqs->total() }} total)
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <form method="GET" action="{{ route('admin.faq.index') }}" class="d-flex gap-2">
                                <!-- Category filter -->
                                <select class="form-select w-auto mb-3 mb-sm-0" name="category_id" onchange="this.form.submit()">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- Show dropdown -->
                                <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                                    <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                                    <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                                    <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                                </select>
                                <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" 
                                       placeholder="Search FAQs..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                            <!-- Create button -->
                            <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add new FAQ
                            </a>
                        </div>
                    </div>

                    <!-- Categories Section -->
                    @if($categories->count() > 0)
                        <div class="mb-4">
                            <h5>FAQ Categories</h5>
                            @foreach($categories as $category)
                                <div class="card mb-3">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">{{ $category->title }} ({{ $category->faqs->count() }} FAQs)</h6>
                                        <div class="btn-group">
                                            @if($category->faqs->first())
                                                <a href="{{ route('admin.faq.edit', $category->faqs->first()) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i> Edit Category
                                                </a>
                                            @endif
                                            <form action="{{ route('admin.faq.destroy', $category->faqs->first() ?? new App\Models\Faq()) }}" method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this category and all its FAQs?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if($category->faqs->count() > 0)
                                            <div class="row">
                                                @foreach($category->faqs as $faq)
                                                    <div class="col-md-6 mb-2">
                                                        <div class="border p-2 rounded">
                                                            <strong>{{ $faq->title }}</strong>
                                                            @if($faq->description)
                                                                <p class="small text-muted mb-1">{!! Str::limit(strip_tags($faq->description), 100) !!}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted">No FAQs in this category</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Table View for Individual FAQs -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $index => $faq)
                                    <tr>
                                        <td>{{ $faqs->firstItem() + $index }}</td>
                                        <td class="text-capitalize">{{ Str::limit($faq->title, 50) }}</td>
                                        <td>{!! Str::limit(strip_tags($faq->description), 50) !!}</td>
                                        <td>
                                            @if($faq->category)
                                                <span class="badge bg-info">{{ $faq->category->title }}</span>
                                            @else
                                                <span class="badge bg-secondary">Normal FAQ</span>
                                            @endif
                                        </td>
                                        <td>{{ $faq->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.faq.edit', $faq) }}" class="btn btn-sm btn-outline-primary" title="Edit FAQ">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.faq.destroy', $faq) }}" method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger" title="Delete FAQ">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-question-circle fa-3x mb-3"></i>
                                                <p>No FAQs found.</p>
                                                <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-plus me-2"></i>Create your first FAQ
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($faqs->hasPages())
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
                            <div class="mb-3 mb-sm-0">
                                Showing {{ $faqs->firstItem() }} to {{ $faqs->lastItem() }} of {{ $faqs->total() }} FAQs
                            </div>
                            <nav aria-label="FAQ pagination">
                                {{ $faqs->appends(request()->query())->links() }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection