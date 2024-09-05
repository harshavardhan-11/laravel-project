<x-layout>
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($appliedJobs as $appliedJob)
            <a href="/jobs/{{ $appliedJob->job['id'] }}">
                <x-job-card :job="$appliedJob->job" :appliedOn="$appliedJob->created_at"></x-job-card>
            </a>
        @endforeach

        <div>
            {{ $appliedJobs->links() }}
        </div>
    </div>
</x-layout>
