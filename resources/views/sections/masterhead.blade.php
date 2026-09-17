<div class="relative w-full overflow-hidden bg-black">
    {{-- Desktop Video / Image --}}
    @if(!empty($desktop_video['url']))
        <div class="hidden sm:block w-full max-w-full !h-svh">
            <video
                src="{{ $desktop_video['url'] }}"
                poster="{{ $desktop_thumbnail['url'] ?? '' }}"
                autoplay 
                muted 
                loop 
                playsinline 
                class="w-full h-full object-cover"
            ></video>
        </div>
    @elseif(!empty($desktop_thumbnail['url']))
        <div class="hidden sm:block w-full h-svh">
            <img 
                src="{{ $desktop_thumbnail['url'] }}"
                alt="{{ $header_title }}"
                class="w-full h-full object-cover"
            />
        </div>
    @endif

    {{-- Mobile Video / Image --}}
    @if(!empty($mobile_video['url']))
        <div class="block sm:hidden w-full h-[500px]">
            <video
                src="{{ $mobile_video['url'] }}"
                poster="{{ $mobile_thumbnail['url'] ?? '' }}"
                autoplay
                muted 
                loop 
                playsinline 
                class="w-full h-[500px] object-cover"
            ></video>
        </div>
    @elseif(!empty($mobile_thumbnail['url']))
        <div class="block sm:hidden w-full h-[500px]">
            <img 
                src="{{ $mobile_thumbnail['url'] }}"
                alt="{{ $header_title }}"
                class="w-full h-full"
            />
        </div>
    @endif

    {{-- Title Overlay --}}
    @if(!empty($header_title))
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-[32px] md:!text-[64px] text-white font-IS text-center max-w-[170px] md:max-w-[340px]">
                {!! $header_title !!}
            </div>
        </div>
    @endif
</div>