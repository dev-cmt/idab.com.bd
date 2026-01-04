<x-app-layout>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">News & Blogs List<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    @can('Event create')
                    <a href="{{ route('blog.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Author</th>
                                    <th class="px-4 py-2">Publish</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Home</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td class="px-4 py-2">{{ $row->title }}</td>
                                    <td class="px-4 py-2">{{ $row->author->name }}</td>
                                    <td class="px-4 py-2">{{ $row->publish_date }}</td>
                                    <td>
                                        @if ( $row->status == 'published' )
                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>{{ ucfirst($row->status) }}</span>
                                        @else
                                            <span class="badge light badge-info"><i class="fa fa-circle text-info mr-1"></i>{{ ucfirst($row->status) }}</span>
                                        @endif 
                                    </td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('blog.toggleHome', $row->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-xs {{ $row->is_home ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $row->is_home ? 'ON' : 'OFF' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('blog.edit', $row->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        {{-- <a href="{{ route('blog.show', $row->id) }}"class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a> --}}
                                        <a href="{{ route('blog.delete', $row->id) }}"class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
