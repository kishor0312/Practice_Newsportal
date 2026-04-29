<x-app-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Edit Articles</h4>
            <a href="{{ route('admin.article.index') }}" class="btn btn-primary">Go back</a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.article.update', $article->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="my-3 col-4">
                        <label for="title">Title<span class="text-danger">*</span> </label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title', $article->title) }}">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3 col-4">
                        <label for="author">Author<span class="text-danger">*</span> </label>
                        <input type="text" name="author" id="author" class="form-control"
                            value="{{ old('author', $article->author) }}">
                        @error('author')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3 col-4">
                        <label for="title">Status<span class="text-danger">*</span> </label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status', $article->status) == 1 ? 'selected' : '' }}>Visible
                            </option>
                            <option value="0" {{ old('status', $article->status) == 0 ? 'selected' : '' }}>hidden
                            </option>
                        </select>
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>



                <div class="my-3">
                    <label>Category<span class="text-danger">*</span></label>
                    <div class="d-flex flex-wrap gap-2 mt-1">
                        @foreach ($categories as $category)
                            <div class="form-check me-3">
                                <input type="checkbox" name="categories[]" id="category_{{ $category->id }}"
                                    class="form-check-input" value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', $article->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <label class="form-check-label" for="category_{{ $category->id }}">
                                    {{ $category->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('categories')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-3">
                    <label for="description">Description<span class="text-danger">*</span> </label>
                    <textarea name="description" id="description" class="form-control summernote">{{ old('description', $article->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="my-3">
                    <label for="meta_keywords">Meta keywords<span class="text-danger">*</span> </label>
                    <textarea name="meta_keywords" id="meta_keywords" class="form-control">{{ old('meta_keywords', $article->meta_keywords) }}</textarea>
                    @error('meta_keywords')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="my-3">
                    <label for="meta_description">Meta description<span class="text-danger">*</span> </label>
                    <textarea name="meta_description" id="meta_description" class="form-control">{{ old('meta_description', $article->meta_description) }}</textarea>
                    @error('meta_description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="my-3">
                    <label for="image">Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img src="{{ asset($article->image) }}" alt="Article Image" width="100" class="mt-2">
                    @error('image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Save Record</button>

            </form>


        </div>
    </div>
    </div>
</x-app-layout>
