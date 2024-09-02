<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Job;

class ChartJobs extends Component
{

    public $selectedYear;
    public $thisYearJobs;
    public $lastYearJobs;

    public function mount()
    {
        $this->selectedYear = date('Y');
        $this->updateJobsCount();
    }

    public function updateJobsCount()
    {
        $this->thisYearJobs = Job::query()
            ->whereYear('created_at', date('Y') )
            ->groupByMonth();
        $this->lastYearJobs = Job::query()
            ->whereYear('created_at', date('Y') - 1)
            ->groupByMonth();
    }

    public function render()
    {
        $availableYears = [
            date('Y'), date('Y') - 1, date('Y') - 2, date('Y') - 3,
        ];

        return view('livewire.chart-jobs', [
            'availableYears' => $availableYears,
        ]);
    }
}
