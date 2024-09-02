<div
    wire:ignore
    class="mt-4"
    x-data="{
         selectedYear: @entangle('selectedYear'),
         lastYearJobs: @entangle('lastYearJobs'),
         thisYearJobs: @entangle('thisYearJobs'),
         init() {
             const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
             const data = {
                 labels: labels,
                 datasets: [{
                     label: `${this.selectedYear - 1} Jobs`,
                     backgroundColor: 'lightgray',
                     data: this.lastYearJobs,
                 }, {
                     label: `${this.selectedYear} Jobs`,
                     backgroundColor: 'lightgreen',
                     data: this.thisYearJobs,
                 }]
             };
             const config = {
                 type: 'bar',
                 data: data,
                 options: {}
             };
             const myChart = new Chart(
                 this.$refs.canvas,
                 config
             );
             Livewire.on('updateTheChart', () => {
                 myChart.data.datasets[0].label = `${this.selectedYear - 1} Jobs`;
                 myChart.data.datasets[1].label = `${this.selectedYear} Jobs`;
                 myChart.data.datasets[0].data = this.lastYearJobs;
                 myChart.data.datasets[1].data = this.thisYearJobs;
                 myChart.update();
             })
         }
     }">
    <span>Year: </span>
    <select name="selectedYear" id="selectedYear" class="border" wire:model="selectedYear" wire:change="updateJobsCount">
        @foreach ($availableYears as $year)
            <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select>
    <div>
        Selected: <span x-text="selectedYear"></span>
    </div>
    <div class="my-6">
        <div>
            <span x-text="selectedYear - 1"></span> Jobs:
            <span x-text="lastYearJobs.reduce((a, b) => a + b)"></span>
        </div>

        <div>
            <span x-text="selectedYear"></span> Jobs:
            <span x-text="thisYearJobs.reduce((a, b) => a + b)"></span>
        </div>
    </div>
    <canvas id="myChart" x-ref="canvas"></canvas>
</div>
