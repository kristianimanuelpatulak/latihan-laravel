<x-app>

    <x-slot:title>{{ $title }}</x-slot>


    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <a class="btn btn-primary mb-3" href="{{ route('lecturer.create') }}" role="button">Create</a>

    <form action="">

        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" name="keyword"
                    placeholder="Search lecturer name ...." value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <select class="form-select" id="department_id" name="department_id">
                    <option value="">All Departments</option>

                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ request('department_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>

    </form>
    <table class="table table-bordered border-dark table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAMA</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lecturers as $lecturer)
                <tr>
                    <th scope="row">{{ $lecturers->firstItem() + $loop->index }}</th>
                    <td>{{ $lecturer->name }} -- {{ $lecturer->department->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('lecturer.edit', $lecturer) }}"
                            role="button">Edit</a>

                        <form action="{{ route('lecturer.destroy', $lecturer) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $lecturers->links() }}

</x-app>
