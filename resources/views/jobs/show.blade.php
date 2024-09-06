<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>

    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>

    @can('edit', $job)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
    @endcan
    @can('apply', $job)
    <div class="mt-6">
        <x-form-button form="apply-job">Apply Job</x-form-button>
        <!-- <button form="apply-job" class="text-red-500 text-sm font-bold">Apply Job</button> -->
    </div>
    @endcan

    <form method="POST" action="/jobs/{{ $job->id }}/apply" id="apply-job" class="hidden">
        @csrf
    </form>
</x-layout>
