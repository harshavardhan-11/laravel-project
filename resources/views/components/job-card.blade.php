@props(['job' => []])
<div class="block px-4 py-6 border border-gray-200 rounded-lg bg-black text-white">
    <div class="self-start text-sm">{{ $job->employer->name }}</div>

    <div class="py-8 font-bold">
        <h3>{{ $job['title'] }}</h3>
        <p>Full Time - From {{ $job['salary'] }}</p>
    </div>


    <div class="flex justify-between items-center mt-auto">
        <div>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
        </div>

    </div>
</div>
