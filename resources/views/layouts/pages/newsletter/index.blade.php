<x-app-layout>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Newsletter List<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    @can('Event create')
                    <a href="{{ route('newsletters.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">SL</th>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">File Dwonload</th>
                                    <th class="px-4 py-2">Publish Date</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $row)
                                <tr>
                                    <td class="px-4 py-2">{{ ++$key }}</td>
                                    <td class="px-4 py-2">{{ $row->title }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('newsletter.download', $row->id) }}" class="btn btn-info btn-sm shadow rounded-pill">
                                            <i class="fa fa-download"></i> Download
                                        </a>
                                    </td>
                                    <td class="px-4 py-2">{{ $row->publish_date }}</td>
                                    <td>
                                        @if ( $row->status == true )
                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Active</span>
                                        @else
                                            <span class="badge light badge-info"><i class="fa fa-circle text-info mr-1"></i>Inactive</span>
                                        @endif 
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('newsletters.edit', $row->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        
                                        <form action="{{ route('newsletters.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this newsletter?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger shadow btn-xs sharp mr-1" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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
