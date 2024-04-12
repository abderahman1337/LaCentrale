@extends('layouts.admin')
@section('title', 'Statistiques')
@section('content')
    <div class="rounded-md flex relative overflow-x-auto items-center sm:justify-center mb-4" role="group">
        <a href="?period=today">
            <button type="button" class="whitespace-nowrap px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 {{request('period')=='today'?'text-primary':''}}">
                Aujourd'hui
            </button>
        </a>
        <a href="?period=yesterday">
            <button type="button" class="whitespace-nowrap px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 {{request('period')=='yesterday'?'text-primary':''}}">
                Hier
            </button>
        </a>
        <a href="?period=last7days">
            <button type="button" class="whitespace-nowrap px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 {{request('period')==''||request('period')=='last7days'?'text-primary':''}}">
                Les 7 derniers jours
            </button>
        </a>
        <a href="?period=last30days">
            <button type="button" class="whitespace-nowrap px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 {{request('period')=='last30days'?'text-primary':''}}">
                Les 30 derniers jours
            </button>
        </a>
    </div>
    <div>
        <section class="grid grid-cols-2 sm:grid-cols-4 lg:gap-4 gap-2 mb-4">
            <div class="border-sky-400 shadow rounded-lg flex items-center justify-between sm:flex-row gap-3 flex-col-reverse bg-white py-3 sm:py-6 px-2 sm:px-5">
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
            <div class="border-orange-400 shadow rounded-lg flex items-center justify-between sm:flex-row gap-3 flex-col-reverse bg-white py-3 sm:py-6 px-2 sm:px-5">
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
            <div class="border-red-600 shadow rounded-lg flex items-center justify-between sm:flex-row gap-3 flex-col-reverse bg-white py-3 sm:py-6 px-2 sm:px-5">
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
            <div class="border-green-600 shadow rounded-lg flex items-center justify-between sm:flex-row gap-3 flex-col-reverse bg-white py-3 sm:py-6 px-2 sm:px-5">
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
    </div>
    
    <div class="flex justify-between lg:flex-row-reverse flex-col gap-4 mb-4 w-full">
        <div class="bg-white dark:bg-darkSecondary dark:text-gray-200 text-[#171246] dark:border border-gray-200 dark:border-opacity-10 rounded-md shadow-sm transition ease-linear w-full">
            <div class="shadow py-3 px-3 rounded-t-md">
                <h2 class="text-center text-xl font-medium">Statistiques de visites</h2>
            </div>
            <div class="py-4">
                <div class="overflow-hidden" id="visits-insights-chart-container">
                    <x-loading-box></x-loading-box>
                    <div class="chart h-full w-auto mx-auto flex items-center justify-center" dir="ltr" id="visits-insights-chart"></div>
                </div>
            </div>
        </div>
        
    </div>
    <div>
        <div class="flex lg:flex-row flex-col justify-between gap-4 mt-6 mb-6">
            <div class="bg-white dark:bg-darkSecondary dark:text-gray-200 text-[#171246] dark:border border-gray-200 dark:border-opacity-10 rounded-md shadow-sm transition ease-linear w-full lg:w-4/12">
                <div class="shadow py-3 px-3 rounded-t-md">
                    <h2 class="text-center text-xl font-medium">Navigateurs les plus touchés</h2>
                </div>
                <div class="py-4">
                    <div class="overflow-hidden" id="top-browsers-chart-container">
                        <x-loading-box></x-loading-box>
                        <div class="chart h-full w-auto mx-auto flex items-center justify-center" id="top-browsers-chart"></div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-darkSecondary dark:text-gray-200 text-[#171246] dark:border border-gray-200 dark:border-opacity-10 rounded-md shadow-sm transition ease-linear w-full lg:w-4/12">
                <div class="shadow py-3 px-3 rounded-t-md">
                    <h2 class="text-center text-xl font-medium">Principales sources de trafic</h2>
                </div>
                <div class="py-4">
                    <div class="overflow-hidden" id="top-traffic-sources-chart-container">
                        <x-loading-box></x-loading-box>
                        <div class="chart h-full w-auto mx-auto flex items-center justify-center" id="top-traffic-sources-chart"></div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-darkSecondary dark:text-gray-200 text-[#171246] dark:border border-gray-200 dark:border-opacity-10 rounded-md shadow-sm transition ease-linear w-full lg:w-4/12">
                <div class="shadow py-3 px-3 rounded-t-md">
                    <h2 class="text-center text-xl font-medium">Appareils les plus touchés</h2>
                </div>
                <div class="py-4">
                    <div class="overflow-hidden" id="top-devices-chart-container">
                        <x-loading-box></x-loading-box>
                        <div class="chart h-full w-auto mx-auto flex items-center justify-center" id="top-devices-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-darkSecondary dark:text-gray-200 text-[#171246] dark:border border-gray-200 dark:border-opacity-10 rounded-md shadow-sm transition ease-linear w-full">
        <div class="shadow py-3 px-3 rounded-t-md">
            <h2 class="text-center text-xl font-medium">Pages les plus visitées</h2>
        </div>
        <div class="py-4">
            <div class="overflow-hidden" id="top-visited-pages-chart-container">
                <x-loading-box></x-loading-box>
                <div class="chart mx-auto flex justify-center h-full w-auto" dir="ltr" id="top-visited-pages-chart"></div>
            </div>
        </div>
    </div>

    <div class="flex lg:flex-row flex-col justify-between gap-4 mt-6 mb-6">
        <div class="bg-white dark:bg-darkSecondary dark:text-gray-200 text-[#171246] dark:border border-gray-200 dark:border-opacity-10 rounded-md shadow-sm transition ease-linear w-full lg:w-3/6">
            <div class="shadow py-3 px-3 rounded-t-md">
                <h2 class="text-center text-xl font-medium">Villes les plus visitées</h2>
            </div>
            <div class="py-4">
                <div class="overflow-hidden" id="top-visited-cities-chart-container">
                    <x-loading-box></x-loading-box>
                    <div class="chart mx-auto flex justify-center h-full w-auto" dir="ltr" id="top-visited-cities-chart"></div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-darkSecondary dark:text-gray-200 text-[#171246] dark:border border-gray-200 dark:border-opacity-10 rounded-md shadow-sm transition ease-linear w-full lg:w-3/6">
            <div class="shadow py-3 px-3 rounded-t-md">
                <h2 class="text-center text-xl font-medium">Pays ayant l'accès le plus élevé</h2>
            </div>
            <div class="py-4">
                <div class="overflow-hidden" id="highest-access-countries-chart-container">
                    <x-loading-box></x-loading-box>
                    <div class="chart h-full w-auto" dir="ltr" id="highest-access-countries-chart"></div>
                </div>
            </div>
        </div>
    </div>        
@endsection
@section('scripts')
    <script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>

    <script>
        
    async function fetchTopBrowsers() {
        let response = await fetch('/admin/api/insights/top-browsers'+window.location.search);
        let json = await response.json();
        return json;
    }
    fetchTopBrowsers()
    .then(y => {
        let response = y;
        let chartContainer = document.getElementById('top-browsers-chart-container');
        chartContainer.querySelector('.loading-box').remove();
        let ctx = chartContainer.querySelector('#top-browsers-chart');
      
        var topBrowsersChart = new ApexCharts(document.querySelector("#top-browsers-chart"), {
            series: response['data'],
            chart: {
            width: 350,
            type: 'donut',
            margin: 0
        },
        labels: response['labels'],
        legend: {
            position: 'bottom'
        },
        noData: {
            text: "Il n'y a pas de données",
            align: 'center',
            verticalAlign: 'middle',
            offsetX: 0,
            offsetY: 0
        },
        responsive: [{
            breakpoint: 480,
            options: {
            chart: {
                width: 350
            },
            legend: {
                position: 'bottom'
            }
            }
        }]
        });
        topBrowsersChart.render();
    });  
    async function fetchTopTrafficSources() {
        let response = await fetch('/admin/api/insights/traffic-source'+window.location.search);
        let json = await response.json();
        return json;
    }
    fetchTopTrafficSources()
    .then(y => {
        let response = y;
        let chartContainer = document.getElementById('top-traffic-sources-chart-container');
        chartContainer.querySelector('.loading-box').remove();
        let ctx = chartContainer.querySelector('#top-traffic-sources-chart');
        var topTrafficSources = new ApexCharts(ctx, {
            series: response['data'],
            chart: {
            width: 350,
            type: 'donut',
            margin: 0
        },
        labels: response['labels'],
        legend: {
            position: 'bottom'
        },
        noData: {
            text: "Il n'y a pas de données",
            align: 'center',
            verticalAlign: 'middle',
            offsetX: 0,
            offsetY: 0
        },
        responsive: [{
            breakpoint: 480,
            options: {
            chart: {
                width: 350
            },
            legend: {
                position: 'bottom'
            }
            }
        }]
        });
        topTrafficSources.render();
    });
    async function fetchTopDevices() {
        let response = await fetch('/admin/api/insights/top-devices'+window.location.search);
        let json = await response.json();
        return json;
    }
    fetchTopDevices()
    .then(y => {
        let response = y;
        let chartContainer = document.getElementById('top-devices-chart-container');
        chartContainer.querySelector('.loading-box').remove();
        let ctx = chartContainer.querySelector('#top-devices-chart');
        var topDevices = new ApexCharts(ctx, {
            series: response['data'],
            chart: {
            width: 350,
            type: 'donut',
            margin: 0
        },
        labels: response['labels'],
        legend: {
            position: 'bottom'
        },
        noData: {
            text: "Il n'y a pas de données",
            align: 'center',
            verticalAlign: 'middle',
            offsetX: 0,
            offsetY: 0
        },
        responsive: [{
            breakpoint: 480,
            options: {
            chart: {
                width: 350
            },
            legend: {
                position: 'bottom'
            }
            }
        }]
        });
        topDevices.render();
    });
    async function fetchHighestAccessCountries() {
        let response = await fetch('/admin/api/insights/highest-access-countries'+window.location.search);
        let json = await response.json();
        return json;
    }
    fetchHighestAccessCountries()
    .then(y => {
        let response = y;
        let chartContainer = document.getElementById('highest-access-countries-chart-container');
        chartContainer.querySelector('.loading-box').remove();
        let ctx = chartContainer.querySelector('#highest-access-countries-chart');
        var chart = new ApexCharts(ctx, {
            series: [{
            name: "Visites",
            data: response['data']
        }],
            chart: {
            type: 'bar',
            height: 350,
        },
        plotOptions: {
            bar: {
            borderRadius: 4,
            horizontal: true,
            }
        },
        noData: {
            text: "Il n'y a pas de données",
            align: 'center',
            verticalAlign: 'middle',
            offsetX: 0,
            offsetY: 0
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: response['labels'],
            labels: {
                formatter: function(val) {
                    return val.toFixed(0);
                }
            }
        }
        });
        chart.render();
    });
    async function fetchTraffics() {
        let response = await fetch('/admin/api/insights/traffic'+window.location.search);
        let json = await response.json();
        return json;
    }
    fetchTraffics()
    .then(y => {
        let response = y;
        let chartContainer = document.getElementById('visits-insights-chart-container');
        chartContainer.querySelector('.loading-box').remove();
        let ctx = chartContainer.querySelector('#visits-insights-chart');
        
        var traffics = new ApexCharts(ctx, {
            series: [{
            name: "Visites",
            data: response['visits']
        },{
            name: "Vues",
            data: response['views']
        }],
            chart: {
            height: 350,
            type: 'line',
            zoom: {
            enabled: false
            }
        },
        dataLabels: {
            enabled: true
        },
        legend: {
            position: 'top'
        },
        stroke: {
            curve: 'straight'
        },
        noData: {
            text: "Il n'y a pas de données",
            align: 'center',
            verticalAlign: 'middle',
            offsetX: 0,
            offsetY: 0
        },
        grid: {
            row: {
            colors: ['#f3f3f3', 'transparent'],
            opacity: 0.5
            },
        },
        xaxis: {
            categories: response['labels'],
        },yaxis: [
            {
                labels: {
                formatter: function(val) {
                    return val.toFixed(0);
                }
                }
            }
            ],
        });
        traffics.render();
    });


    async function fetchTopVisitedCities() {
        let response = await fetch('/admin/api/insights/top-visited-cities'+window.location.search);
        let json = await response.json();
        return json;
    }
    fetchTopVisitedCities()
    .then(y => {
        let response = y;
        let chartContainer = document.getElementById('top-visited-cities-chart-container');
        chartContainer.querySelector('.loading-box').remove();
        let ctx = chartContainer.querySelector('#top-visited-cities-chart');
        var topVisitedCities = new ApexCharts(ctx, {
            series: response['data'],
            chart: {
            width: 600,
            type: 'pie',
            margin: 0
        },
        labels: response['labels'],
        //colors: ['rgb(255, 205, 86)', 'rgb(255, 99, 132)', 'rgb(54, 162, 235)',],
        legend: {
            position: 'bottom'
        },
        noData: {
            text: "Il n'y a pas de données",
            align: 'center',
            verticalAlign: 'middle',
            offsetX: 0,
            offsetY: 0
        },
        responsive: [{
            breakpoint: 480,
            options: {
            chart: {
                width: 350
            },
            legend: {
                position: 'bottom'
            }
            }
        }]
        });
        topVisitedCities.render();
    });


    async function fetchTopVisitedPages() {
        let response = await fetch('/admin/api/insights/top-visited-pages'+window.location.search);
        let json = await response.json();
        return json;
    }
    fetchTopVisitedPages()
    .then(y => {
        let response = y;
        let chartContainer = document.getElementById('top-visited-pages-chart-container');
        chartContainer.querySelector('.loading-box').remove();
        let ctx = chartContainer.querySelector('#top-visited-pages-chart');
        var chart = new ApexCharts(ctx, {
          series: [{
          name: 'Visits',
          data: response['data']['visits']
        },{
          name: 'Vues',
          data: response['data']['views']
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        noData: {
            text: "Il n'y a pas de données",
            align: 'center',
            verticalAlign: 'middle',
            offsetX: 0,
            offsetY: 0
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: response['labels'],
        },
        fill: {
          opacity: 1
        }
        
        });
        chart.render();

    });
    </script>
@endsection