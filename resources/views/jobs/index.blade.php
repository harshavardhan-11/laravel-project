<x-layout>
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}">
                <x-job-card :job="$job"></x-job-card>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
