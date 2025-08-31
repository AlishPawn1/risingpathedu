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
                            <form method="GET" action="{{ route('admin.faqs.index') }}" class="d-flex gap-2">
                                <!-- Category filter -->
                                <select class="form-select w-auto mb-3 mb-sm-0" name="category_id" onchange="this.form.submit()">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <!-- Show dropdown -->
                                <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                                    <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                                    <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                                    <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                                </select>
                                <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" placeholder="Search FAQs..." value="{{ request('search') }}">
                            </form>
                            <!-- Create button -->
                            <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add new FAQ
                            </a>
                        </div>
                    </div>

                    <!-- Table View -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $index => $faq)
                                    <tr>
                                        <td>{{ $faqs->firstItem() + $index }}</td>
                                        <td class="text-capitalize">{{ $faq->question }}</td>
                                        <td>{!! Str::limit($faq->answer, 50) !!}</td>
                                        <td>{{ $faq->category->name ?? 'N/A' }}</td>
                                        <td>{{ $faq->order ?? '0' }}</td>
                                        <td>{{ $faq->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $faq->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
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
                                        <td colspan="8" class="text-center">No FAQs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
                        <div class="mb-3 mb-sm-0">
                            Showing {{ $faqs->firstItem() }} to {{ $faqs->lastItem() }} of {{ $faqs->total() }} FAQs
                        </div>
                        <nav aria-label="FAQ pagination">
                            {{ $faqs->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection