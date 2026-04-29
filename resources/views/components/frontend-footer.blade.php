<footer class="bg-(--primary-color)">

    <div class="container py-10">
        <div class="flex gap-8">

            {{-- Brand --}}
            <div style="flex: 1.6;">
                <h2 class="text-5xl font-black text-white tracking-tight leading-none mb-10">
                    जवाफ<span class="text-gray-300">.</span>
                </h2>
                <p class="text-sm text-gray-300 uppercase tracking-widest mb-4">
                    Jawwaf · Nepal's News Portal
                </p>
                <p class="text-lg text-white leading-relaxed">
                    नेपालको भरपर्दो अनलाइन समाचार पोर्टल।
                    ताजा खबर, विश्लेषण र सामयिक विषयहरू एकै ठाउँमा पाउनुहोस्।
                </p>
            </div>

            {{-- Categories --}}
            <div style="flex: 1;">
                <h3 class="text-sm font-bold uppercase tracking-widest text-white pb-2.5 mb-3"
                    style="border-bottom: 1px solid #6b7280;">विभाग</h3>
                @foreach (['राजनीति', 'अर्थतन्त्र', 'खेलकुद', 'प्रविधि', 'स्वास्थ्य', 'मनोरञ्जन'] as $cat)
                    <a href="#"
                        class="flex items-center gap-2 text-lg text-white hover:text-gray-400 py-2 transition-colors">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>{{ $cat }}
                    </a>
                @endforeach
            </div>

            {{-- Links --}}
            <div style="flex: 1;">
                <h3 class="text-sm font-bold uppercase tracking-widest text-white pb-2.5 mb-3"
                    style="border-bottom: 1px solid #6b7280;">लिंकहरू</h3>
                @foreach (['हाम्रो बारेमा', 'सम्पर्क गर्नुहोस्', 'विज्ञापन', 'गोपनीयता नीति', 'सेवा सर्तहरू'] as $link)
                    <a href="#"
                        class="flex items-center gap-2 text-lg text-white hover:text-gray-400 py-2 transition-colors">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>{{ $link }}
                    </a>
                @endforeach
            </div>

            {{-- Contact --}}
            <div style="flex: 1.2;">
                <h3 class="text-sm font-bold uppercase tracking-widest text-white pb-2.5 mb-3"
                    style="border-bottom: 1px solid #6b7280;">सम्पर्क</h3>
                <div class="flex flex-col gap-4 text-lg text-white">
                    <span>📍 काठमाडौं, नेपाल</span>
                    <span>📞 +977-01-XXXXXXX</span>
                    <span>✉️ info@jawwaf.com.np</span>
                </div>
            </div>

        </div>
    </div>

    {{-- Bottom bar --}}
    <div style="border-top: 1px solid #6b7280;">
        <div class="container py-4 flex items-center justify-between text-base text-white">
            <span>© {{ date('Y') }} <span class="font-bold">जवाफ</span> · सर्वाधिकार सुरक्षित</span>
            <span>नेपालमा <span class="text-gray-300">♥</span> सँग बनाइएको</span>
        </div>
    </div>

</footer>
