<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página Inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="container" >
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Gráfico</h1>
                    <canvas id="grafico" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('grafico').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Concluídos', 'Em Andamento', 'Próximos'],
                datasets: [{
                    label: 'Quantidade de Projetos',
                    data: [{{ $concluidos }}, {{ $emAndamento }}, {{ $aFazer }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(255, 99, 132, 0.8)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                animation: {
                    duration: 3000,
                    easing: 'easeOutQuart'
                },
            }
        });
    </script>
</x-app-layout>
