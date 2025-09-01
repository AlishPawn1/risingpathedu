@extends('layouts.admin.app')
@section('title', 'Contact Admin')

@section('content')
    <section>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="p-4">
                    <!-- Header -->
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
                        <div class="mb-3 mb-sm-0">
                            <h2 class="h5 mb-1">Contact List</h2>
                            <p class="small">
                                Manage your contacts here ({{ $contacts->total() }} total)
                            </p>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <form method="GET" action="{{ route('admin.contacts.index') }}" class="d-flex gap-2">
                                <!-- Service filter -->
                                <select class="form-select w-auto mb-3 mb-sm-0" name="service" onchange="this.form.submit()">
                                    <option value="">All Services</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service }}" {{ request('service') == $service ? 'selected' : '' }}>
                                            {{ $service }}
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
                                       placeholder="Search Contacts..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Table View for Contacts -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $index => $contact)
                                    <tr>
                                        <td>{{ $contacts->firstItem() + $index }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->service }}</td>
                                        <td>{!! Str::limit(strip_tags($contact->message), 50) !!}</td>
                                        <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger" title="Delete Contact">
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
                                                <i class="fas fa-address-book fa-3x mb-3"></i>
                                                <p>No contacts found.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($contacts->hasPages())
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
                            <div class="mb-3 mb-sm-0">
                                Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} Contacts
                            </div>
                            <nav aria-label="Contact pagination">
                                {{ $contacts->appends(request()->query())->links() }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection