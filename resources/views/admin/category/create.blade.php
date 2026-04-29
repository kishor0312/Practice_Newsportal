<x-app-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>create Categories</h4>
            <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Go back</a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf

                <div class="my-3">
                    <label for="title">Title<span class="text-danger">*</span> </label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="my-3">
                    <label for="meta_keywords">Meta keyword<span class="text-danger">*</span> </label>
                    <textarea name="meta_keywords" id="meta_keywords" class="form-control">{{ old('meta_keywords') }}</textarea>
                    @error('meta_keyword')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="my-3">
                    <label for="meta_description">Meta description<span class="text-danger">*</span> </label>
                    <textarea name="meta_description" id="meta_discription" class="form-control">{{ old('meta_description') }}</textarea>
                    @error('meta_discription')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Save Record</button>

            </form>
        </div>
    </div>
</x-app-layout>
