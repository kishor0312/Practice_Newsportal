<x-frontend-layout>


    <section class="py-10">
        <div class="container">
            <h2 class="text-2xl text-(--primary-color) p-3 bg-(--primary-color)/20 border-1-4 rounded-md font-bold mb-2">
                {{ $category->title }}</h2>

            <div class="grid grid-cols-3 gap-6 mb-10 ">
                @foreach ($category->articles()->where('status', true)->latest()->take(3)->get() as $article)
                    <a href="{{ route('article.show', $article->slug) }}"
                        class="block rounded-2xl overflow-hidden bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 hover:border-gray-300 dark:hover:border-gray-600 transition-colors">
                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                            class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2">
                                {{ $article->title }}
                            </h3>
                            <p class="text-xs text-gray-400 mt-1 line-clamp-1">
                                {{ Str::limit(strip_tags($article->description), 55) }}
                            </p>
                        </div>
                    </a>
                @endforeach

            </div>

        </div>

    </section>
</x-frontend-layout>
