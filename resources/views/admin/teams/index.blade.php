@extends('layouts.admin.app')
@section('title', 'Team Admin')

@section('content')
  <section>
    <div class="container-fluid py-4">
      <div class="card">
        <div class="p-4">
          <!-- Header -->
          <div
            class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4">
            <div class="mb-3 mb-sm-0">
              <h2 class="h5 mb-1">Teams</h2>
              <p class="small">
                Manage your teams here ({{ $teams->total() }} total)
              </p>
            </div>
            <div class="d-flex align-items-center gap-4">
              <form method="GET" action="{{ route('admin.teams.index') }}" class="d-flex gap-2">
                <!-- Show dropdown -->
                <select class="form-select w-auto mb-3 mb-sm-0" name="per_page" onchange="this.form.submit()">
                  <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                  <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                  <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                </select>
                <input type="text" name="search" class="form-control w-auto mb-3 mb-sm-0" placeholder="Search teams..."
                  value="{{ request('search') }}">
              </form>
              <!-- Create button -->
              <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add new team
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
                @forelse ($teams as $index => $team)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                      @if ($team->image && Storage::disk('public')->exists($team->image))
                        <img src="{{ asset('storage/' . $team->image) }}" alt="team-img" class="img-thumbnail"
                          style="width: 100px; height: 100px; object-fit: cover;">
                      @else
                        <img src="{{ asset('assets/img/team/default.png') }}" alt="default-img" class="img-thumbnail"
                          style="width: 100px; height: 100px; object-fit: cover;">
                      @endif
                    </td>
                    <td class="text-capitalize">{{ $team->name }}</td>
                    <td>{{ $team->post }}</td>
                    <td>{!! Str::limit($team->description, 50) !!}</td>
                    <td>{{ $team->created_at->format('M d, Y') }}</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="{{ route('admin.teams.edit', $team) }}" class="btn btn-sm btn-outline-primary">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this team?');">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-outline-danger" aria-label="Delete team {{ $team->name }}">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center">No teams found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mt-4">
            <div class="mb-3 mb-sm-0">
              Showing {{ $teams->firstItem() }} to {{ $teams->lastItem() }} of {{ $teams->total() }} teams
            </div>
            <nav aria-label="Team pagination">
              {{ $teams->links() }}
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection