@extends('layouts.admin')
@section('title', 'Statistiques')
@section('content')
    <div>
        <section class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-4">
            <div class="sm:ltr:border-l sm:border-l-2 border-t border-b sm:border-b-0 sm:border-t-0 border-sky-400 shadow rounded-lg flex items-center justify-between sm:flex-row gap-3 flex-col-reverse bg-white py-3 sm:py-6 px-2 sm:px-5">
                <div class="text-center sm:ltr:text-left sm:rtl:text-right">
                    <h2 class="text-gray-800 font-semibold">Total des marques</h2>
                    <p class="text-3xl text-sky-400 font-bold">{{$totalBrands}}</p>
                </div>
                <div class="h-[58px] w-[58px] rounded-full flex items-center justify-center bg-sky-400">
                    <svg class="w-10 h-10 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.666A1 1 0 0 1 20 6.68a17.694 17.694 0 0 1-2.023 7.98 17.406 17.406 0 0 1-5.402 6.158 1 1 0 0 1-1.15 0 17.405 17.405 0 0 1-5.403-6.157A17.695 17.695 0 0 1 4 6.68a1 1 0 0 1 .644-.949l7-2.666Zm4.014 7.187a1 1 0 0 0-1.316-1.506l-3.296 2.884-.839-.838a1 1 0 0 0-1.414 1.414l1.5 1.5a1 1 0 0 0 1.366.046l4-3.5Z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <div class="sm:ltr:border-l sm:border-l-2 border-t border-b sm:border-b-0 sm:border-t-0 border-orange-400 shadow rounded-lg flex items-center justify-between sm:flex-row gap-3 flex-col-reverse bg-white py-3 sm:py-6 px-2 sm:px-5">
                <div class="text-center sm:ltr:text-left sm:rtl:text-right">
                    <h2 class="text-gray-800 font-semibold">Total des modèles</h2>
                    <p class="text-3xl text-orange-400 font-bold">{{$totalSeries}}</p>
                </div>
                <div class="h-[58px] w-[58px] rounded-full flex items-center justify-center bg-orange-400">
                    <svg class="w-10 h-10 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.045 3.007 12.31 3a1.965 1.965 0 0 0-1.4.585l-7.33 7.394a2 2 0 0 0 0 2.805l6.573 6.631a1.957 1.957 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 21 11.479v-5.5a2.972 2.972 0 0 0-2.955-2.972Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                    </svg>
                </div>
            </div>
            <div class="sm:ltr:border-l sm:border-l-2 border-t border-b sm:border-b-0 sm:border-t-0 border-red-600 shadow rounded-lg flex items-center justify-between sm:flex-row gap-3 flex-col-reverse bg-white py-3 sm:py-6 px-2 sm:px-5">
                <div class="text-center sm:ltr:text-left sm:rtl:text-right">
                    <h2 class="text-gray-800 font-semibold">Total véhicules</h2>
                    <p class="text-3xl text-red-600 font-bold">{{$totalVehicules}}</p>
                </div>
                <div class="h-[58px] w-[58px] rounded-full flex items-center justify-center bg-red-600">
                    <svg class="w-10 h-10 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.535a3.5 3.5 0 1 0 6.93 0h3.07a3.5 3.5 0 1 0 6.93 0H21a1 1 0 0 0 1-1v-4a.999.999 0 0 0-.106-.447l-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.192 11.59.016.02a1.5 1.5 0 1 1-.016-.021Zm-10 0 .016.02a1.5 1.5 0 1 1-.016-.021Zm5.806-5.572v-2.02h4.396l1 2.02h-5.396Z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <div class="sm:ltr:border-l sm:border-l-2 border-t border-b sm:border-b-0 sm:border-t-0 border-green-600 shadow rounded-lg flex items-center justify-between sm:flex-row gap-3 flex-col-reverse bg-white py-3 sm:py-6 px-2 sm:px-5">
                <div class="text-center sm:ltr:text-left sm:rtl:text-right">
                    <h2 class="text-gray-800 font-semibold">Total visiteurs</h2>
                    <p class="text-3xl text-green-600 font-bold">{{$totalVisitors}}</p>
                </div>
                <div class="h-[58px] w-[58px] rounded-full flex items-center justify-center bg-green-600">
                    <svg class="w-10 h-10 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </section>
        
        <section>
            <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div id="traffics-chart"></div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>
    <script>
        let days = [];
        let data = [];
        for(let i = 0;i < 31;i++){
            days[i] = `Mar ${i+1}`;
            data[i] = Number((Math.random() * (9000 - 1000) + 1000).toFixed(0));
        }
        var options = {
          series: [{
            name: "{{__('Number of Visitors')}}",
            data: data
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: '{{__("Visitors Trend")}}',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: days,
        }
        };

        var trafficsChart = new ApexCharts(document.querySelector("#traffics-chart"), options);
        trafficsChart.render();
        
    </script>
@endsection