
<x-layout>

    <x-slot:title>
        Charts
    </x-slot:title>

    <x-slot:heading>
        Charts Page
    </x-slot:heading>
    <div class="bg-white rounded-md border my-8 px-6 py-6 mx-40">
        <div>
            <h2 class="text-2xl font-semibold">Charts</h2>
            <div class="my-6">
                <div>Last Year: {{ array_sum($lastYearJobs) }}</div>
                <div>This Year: {{ array_sum($thisYearJobs) }}</div>
            </div>
            <div class="mt-4"><canvas id="myChart"></canvas></div>
        </div>
    </div>
    <script>
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Last Year Jobs',
                backgroundColor: 'lightgray',
                data: {{ Js::from($lastYearJobs) }},
            }, {
                label: 'This Year Jobs',
                backgroundColor: 'lightgreen',
                data: {{ Js::from($thisYearJobs) }},
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {

            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</x-layout>
