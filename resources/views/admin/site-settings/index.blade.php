@extends('layouts.admin.app')
@section('title', 'Site Settings Admin')

@section('content')
<section>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="p-4">
                <!-- Header -->
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
                    <div class="mb-3 mb-sm-0">
                        <h2 class="h5 mb-1">Site Settings</h2>
                        <p class="small">
                            Manage your site settings here.
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <a href="{{ route('admin.site-settings.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add new setting
                        </a>
                    </div>
                </div>

                <!-- Table View -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Site Name</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Business Hours</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siteSettings as $index => $setting)
                                <tr>
                                    <td>{{ $siteSettings->firstItem() + $index }}</td>
                                    <td>{{ $setting->site_name ?? 'N/A' }}</td>
                                    <td>
                                        @if($setting->site_logo)
                                            <img src="{{ asset('storage/'.$setting->site_logo) }}" alt="site-logo" class="img-thumbnail" style="width:100px; height:100px; object-fit:contain;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $setting->email ?? 'N/A' }}</td>
                                    <td>{{ $setting->contact_number ?? 'N/A' }}</td>
                                    <td>{{ $setting->business_hours ?? 'N/A' }}</td>
                                    <td>{{ $setting->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.site-settings.edit', $setting) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.site-settings.destroy', $setting) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this setting?');">
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
                                    <td colspan="8" class="text-center">No site settings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
                    <div class="mb-3 mb-sm-0">
                        Showing {{ $siteSettings->firstItem() ?? 0 }} to {{ $siteSettings->lastItem() ?? 0 }} of {{ $siteSettings->total() }} settings
                    </div>
                    <nav aria-label="Settings pagination">
                        {{ $siteSettings->withQueryString()->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
