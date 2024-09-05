@props(['job' => [], 'appliedOn' => null])
<div class="block px-4 py-6 border border-gray-200 rounded-lg bg-black text-white">
    <div class="flex justify-between">
        <div class="self-start text-sm">{{ $job->employer->name }}</div>
        @if($appliedOn)
            <div class="self-start text-sm"> Applied On {{ $appliedOn }}</div>
        @endif
    </div>

    <div class="py-8 font-bold">
        <h3>{{ $job['title'] }}</h3>
        <p>Full Time - From {{ $job['salary'] }}</p>
    </div>


    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag>{{$tag->name}}</x-tag>
            @endforeach

        </div>

    </div>
</div>
