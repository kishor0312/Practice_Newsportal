<x-frontend-layout>
    <section class="py-10">
        <div class="container">

            <div class="bg-white rounded-2xl shadow-md overflow-hidden max-w-3xl mx-auto">

                {{-- Featured Image --}}
                <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-[380px] object-cover">

                {{-- Content --}}
                <div class="p-8">

                    {{-- Category --}}
                    <span
                        class="text-xs font-bold uppercase tracking-widest text-white bg-red-600 px-3 py-1 rounded mb-4 inline-block">
                        {{ $article->category->name ?? 'समाचार' }}
                    </span>

                    {{-- Title --}}
                    <h1 class="text-3xl font-black text-gray-900 leading-tight mt-3 mb-4">
                        {{ $article->title }}
                    </h1>

                    {{-- Meta --}}
                    <div class="flex items-center gap-3 text-sm text-gray-400 mb-6">
                        <span>✍️ {{ $article->author ?? 'Staff Reporter' }}</span>
                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                        <span>📅 {{ $article->created_at->format('M d, Y') }}</span>
                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                        <span>👁️ {{ number_format($article->views) }} views</span>
                    </div>

                    {{-- Divider --}}
                    <hr class="border-gray-100 mb-6">

                    {{-- Description --}}
                    <div class="text-gray-600 text-base leading-relaxed">
                        {!! $article->description !!}
                    </div>

                </div>
            </div>

        </div>
    </section>
</x-frontend-layout>
