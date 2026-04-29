<x-frontend-layout>
    <section class="py-10">
        <div class="container flex gap-5">

            {{-- LEFT: Main featured article --}}
            <div style="flex: 2.2;">
                <a href="{{ route('article.show', $latest->slug) }}"
                    class="block relative rounded-2xl overflow-hidden bg-black group">
                    <img src="{{ asset($latest->image) }}" alt="{{ $latest->title }}"
                        class="w-full h-[460px] object-cover opacity-80 group-hover:opacity-90 group-hover:scale-105 transition-all duration-500">
                    <div class="absolute inset-0 flex flex-col justify-end p-7"
                        style="background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.55) 50%, transparent 100%);">

                        <span
                            class="inline-flex items-center gap-1.5 bg-red-600 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded mb-3 w-fit">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            {{ $latest->category->name ?? 'Breaking News' }}
                        </span>

                        <h2 class="text-white text-2xl font-bold leading-snug mb-3">
                            {{ $latest->title }}
                        </h2>

                        <p class="text-white/65 text-sm leading-relaxed line-clamp-2 mb-4">
                            {{ Str::limit(strip_tags($latest->description), 180) }}
                        </p>

                        <div class="flex items-center gap-2 text-white/45 text-xs mb-4">
                            <span>{{ $latest->author ?? 'Staff Reporter' }}</span>
                            <span class="w-1 h-1 rounded-full bg-white/30"></span>
                            <span>{{ $latest->created_at->format('M d, Y') }}</span>
                        </div>

                        <span
                            class="inline-block bg-white text-gray-900 text-xs font-semibold tracking-wide px-4 py-2 rounded-md w-fit">
                            Read full story →
                        </span>
                    </div>
                </a>
            </div>

            {{-- RIGHT: Most viewed sidebar --}}
            <div style="flex: 1;" class="flex flex-col gap-3">

                <h2
                    class="text-[10px] font-bold uppercase tracking-widest text-gray-400 pb-2.5 border-b-2 border-red-600">
                    Most Viewed
                </h2>

                @foreach ($mostViews as $index => $article)
                    <a href="{{ route('article.show', $article->slug) }}"
                        class="flex items-start gap-3 p-3 bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-xl hover:border-gray-300 dark:hover:border-gray-600 transition-colors">

                        <span
                            class="text-lg font-extrabold leading-none pt-0.5 min-w-[26px]
                        {{ $index === 0 ? 'text-red-600' : 'text-gray-200 dark:text-gray-700' }}">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                            class="w-[72px] h-16 object-cover rounded-lg flex-shrink-0">

                        <div class="flex-1 min-w-0">
                            <div class="text-[10px] font-bold text-red-600 uppercase tracking-wide mb-1">
                                {{ $article->category->name ?? '' }}
                            </div>
                            <h3
                                class="text-[12.5px] font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 leading-snug">
                                {{ $article->title }}
                            </h3>
                            <p class="text-[11px] text-gray-400 mt-1 line-clamp-1">
                                {{ Str::limit(strip_tags($article->description), 55) }}
                            </p>
                        </div>

                    </a>
                @endforeach

            </div>
        </div>
    </section>
    <section class="py-10">
        <div class="container">
            @foreach ($categories as $category)
                <h2
                    class="text-2xl text-(--primary-color) p-3 bg-(--primary-color)/20 border-1-4 rounded-md font-bold mb-2">
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
            @endforeach
        </div>

    </section>
</x-frontend-layout>
