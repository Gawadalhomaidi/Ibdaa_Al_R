<div class="p-4 bg-white/80 dark:bg-gray-800 rounded-lg shadow-sm">
    <h3 class="text-sm font-semibold text-gray-500 mb-2">Records per Model</h3>
    <canvas id="modelsChart" style="max-height:300px;"></canvas>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        const ctx = document.getElementById('modelsChart').getContext('2d');

        // destroy existing chart instance if exists (in case of Livewire updates)
        if (window._modelsChartInstance) {
            window._modelsChartInstance.destroy();
        }

        window._modelsChartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Records',
                    data: @json($data['counts']),
                    borderWidth: 1,
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision:0
                        }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    });
</script>
