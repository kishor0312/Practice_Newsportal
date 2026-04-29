<x-app-layout>

    {{-- {{ $categories }} --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Articles</h4>
            <a href="{{ route('admin.article.create') }}" class="btn btn-primary">Add new</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">
                                S.N
                            </th>
                            <th>Title</th>
                            <th>slug</th>
                            <th>status</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $i => $article)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->slug }}</td>
                                <td>
                                    @if ($article->status == true)
                                        <span class="badge bg-success text-white">visible</span>
                                    @else
                                        <span class="badge bg-danger text-white">hidden</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($article->image)
                                        <img src="{{ asset($article->image) }}" alt="" width="100">
                                    @else
                                        N/A
                                    @endif
                                <td>
                                    <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('admin.article.edit', $article->id) }}"
                                            class="btn btn-primary btn-sm ">Edit</a>

                                        <button type="submit" class="btn bg-danger text-white btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
