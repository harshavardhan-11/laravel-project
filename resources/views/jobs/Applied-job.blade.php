<x-layout>
    <x-slot:title>
        Applied Job
    </x-slot:title>

    <x-slot:heading>
        Job
    </x-slot:heading>

    <div class="flex justify-between">
        <h2 class="font-bold text-lg">{{ $appliedJob->job->title }}</h2>
        <h2 class="font-bold text-lg">Applied On {{ $appliedJob->created_at }}</h2>

    </div>

    <p>
        This job pays {{ $appliedJob->job->salary }} per year.
    </p>


    <div class="flex items-center mt-6">
        <button form="delete-job-applicaion" class="text-red-500 text-sm font-bold">Delete Job Application</button>
    </div>

    <form method="POST" action="/applied-jobs/{{ $appliedJob->id }}" id="delete-job-applicaion" class="hidden">
        @csrf
        @method('DELETE')
    </form>
    
</x-layout>