<x-layout>
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($appliedJobs as $appliedJob)
            <a href="/jobs/{{ $appliedJob['job_listing_id'] }}">
                <div class="block px-4 py-6 border border-gray-200 rounded-lg bg-black text-white">
                    <div class="flex justify-between">
                        <div class="self-start text-sm">{{ $appliedJob->job->employer->name }}</div>
                        <div class="self-start text-sm">Applied on {{ $appliedJob->created_at }}</div>
                    </div>


                    <div class="py-8 font-bold">
                        <h3>{{ $appliedJob->title }}</h3>
                        <p>Full Time - From {{ $appliedJob->salary }}</p>
                    </div>
                </div>
            </a>
        @endforeach

        <div>
            {{ $appliedJobs->links() }}
        </div>
    </div>
</x-layout>
