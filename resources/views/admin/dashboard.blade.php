@extends('home')

@section('content')
    <div class="bg-slate-100 w-full h-full grid grid-rows-6">
        <div
            class="bg-slate-400 border border-b-2 border-slate-900 row-span-2 grid grid-cols-3 justify-items-center items-center">
            <div class="dash-card">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[70%] h-[70%]" viewBox="0 0 47.5 47.5" id="box">
                    <defs>
                        <clipPath id="a">
                            <path d="M0 38h38V0H0v38Z"></path>
                        </clipPath>
                    </defs>
                    <g clip-path="url(#a)" transform="matrix(1.25 0 0 -1.25 0 47.5)">
                        <path fill="#662113"
                            d="M5 26V13.625c0-2.042 1.093-2.484 1.093-2.484l11.574-9.099C19.488.61 19 3.625 19 3.625V15L5 26Z">
                        </path>
                        <path fill="#c1694f"
                            d="M33 26V13.625c0-2.042-1.063-2.484-1.063-2.484S22.17 3.474 20.349 2.042C18.526.61 19 3.625 19 3.625V15l14 11Z">
                        </path>
                        <path fill="#d99e82"
                            d="M20.29 36.5c-.753.61-1.988.61-2.742 0L5.566 26.971c-.754-.61-.754-1.607 0-2.216l12.023-9.647c.755-.609 1.989-.609 2.743 0l12.104 9.731c.753.609.753 1.606 0 2.216L20.29 36.5Z">
                        </path>
                        <path fill="#d99e82"
                            d="M19 1.25c-.552 0-1 .482-1 1.078v12.927c0 .596.448 1.078 1 1.078.553 0 1-.482 1-1.078V2.328c0-.596-.447-1.078-1-1.078">
                        </path>
                        <path fill="#99aab5"
                            d="M29 18.164c0-1.104.104-1.646-1-2.442l-2.469-1.878c-1.104-.797-1.531-.113-1.531.992v2.961c0 .193-.026.4-.278.608C21.144 20.53 11.134 28.481 9.31 29.949l4.625 3.678c1.266-.926 10.753-8.252 14.721-11.377.198-.156.344-.328.344-.516v-3.57Z">
                        </path>
                        <path fill="#ccd6dd"
                            d="M28.656 22.25C24.687 25.375 15.2 32.701 13.934 33.627l-1.72-1.368-2.905-2.31c1.825-1.468 11.834-9.419 14.412-11.544a.684.684 0 0 0 .248-.371L28.903 22c-.06.087-.146.171-.247.25">
                        </path>
                        <path fill="#ccd6dd"
                            d="M29 18.164v3.57c0 .188-.146.36-.344.516-3.968 3.125-13.455 10.451-14.721 11.377l-2.074-1.649c3.393-2.669 12.482-9.681 14.861-11.573.256-.204.278-.415.278-.608v-4.836l1 .761c1.104.796 1 1.338 1 2.442">
                        </path>
                        <path fill="#e1e8ed"
                            d="M28.656 22.25C24.687 25.375 15.2 32.701 13.934 33.627l-2.073-1.649c3.393-2.669 12.482-9.681 14.86-11.573.038-.03.06-.059.087-.089L28.903 22c-.06.087-.146.171-.247.25">
                        </path>
                    </g>
                </svg>
                <div class="w-full h-full grid justify-items-center items-center">
                    <h1 class="text-3xl font-bold">Products</h1>
                    <p class="text-4xl font-medium" id="product-count"></p>
                </div>
            </div>
            <div class="dash-card">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[70%] h-[70%]" viewBox="0 0 120 120" id="my-orders">
                    <rect width="17.07" height="25.37" x="58.47" y="15.5" fill="#a50000"></rect>
                    <polygon fill="#f9cc12"
                        points="104.06 25.42 102.24 29.87 100.76 33.48 97.74 40.87 75.66 40.87 75.64 40.86 76.6 38.52 81.83 25.72 83.34 22.03 85.15 17.61 104.06 25.42">
                    </polygon>
                    <path fill="#f21616"
                        d="M28.86 40.92c28.55-.02 57.1-.03 85.64-.05-1.68 16.77-3.37 33.53-5.05 50.3H37.3l-8.45-50.25zM20.29 28.96c0 .19-.02.37-.05.55-.11.7-.44 1.33-.93 1.81-.6.61-1.43.99-2.35.99h-8.12c-1.84 0-3.34-1.5-3.34-3.35 0-.93.37-1.76.98-2.37.6-.61 1.43-.99 2.35-.99h8.12c1.84 0 3.34 1.5 3.34 3.35z">
                    </path>
                    <polygon fill="#498cd6"
                        points="53.58 21.87 52.79 26.24 52.07 30.19 51.35 34.18 50.64 38.11 50.13 40.91 36.38 40.92 37.32 35.69 37.68 33.7 38.05 31.73 38.76 27.76 39.12 25.78 39.13 25.78 39.49 23.8 40.27 19.45 53.58 21.87">
                    </polygon>
                    <path fill="#e5e141"
                        d="M52.79 26.24l-.71 3.95c-.06-.01-.12-.02-.18-.03l-13.14-2.4.36-1.98h.01l.36-1.98 13.13 2.41c.06.01.12.02.17.04zM51.35 34.18l-.71 3.94c-.06 0-.12-.02-.18-.03l-13.14-2.4.36-1.98.36-1.97 13.13 2.4c.06.01.12.03.18.05z">
                    </path>
                    <rect width="55.19" height="5.44" x="49.55" y="52.23" fill="#fff" rx="2.71" ry="2.71">
                    </rect>
                    <rect width="55.19" height="5.44" x="49.55" y="63.3" fill="#fff" rx="2.71" ry="2.71">
                    </rect>
                    <rect width="55.19" height="5.44" x="49.55" y="74.38" fill="#fff" rx="2.71" ry="2.71">
                    </rect>
                    <path fill="#f9cc12"
                        d="m61.07,16.04l14.47,20.9v3.93h-2.1c-.1-.09-.18-.19-.26-.3l-14.71-21.24v-3.83h2.05c.21.14.4.32.55.54Z">
                    </path>
                    <path fill="#fff" d="m75.64,40.86s.01,0,.02.01h-.02s.96-2.36.96-2.36c-.32.78-.64,1.56-.96,2.35Z">
                    </path>
                    <path fill="#444442"
                        d="m102.24,29.87l-1.47,3.61c-.16-.02-.32-.06-.47-.13l-18.24-7.52c-.08-.03-.15-.07-.22-.11l1.5-3.68c.08.01.16.04.24.07l18.24,7.52c.15.06.3.15.42.24Z">
                    </path>
                    <ellipse cx="55.87" cy="97.3" fill="#444442" rx="7.17" ry="7.2"></ellipse>
                    <ellipse cx="91.94" cy="97.3" fill="#444442" rx="7.17" ry="7.2"></ellipse>
                    <path fill="#444442"
                        d="m39.28,90.82l-10.97-61.66c-.17-.96-1-1.66-1.97-1.66h-6.09c-1.11,0-2,.9-2,2.01s.9,2.01,2,2.01h4.42l10.68,60c.17.98,1.02,1.66,1.97,1.66.12,0,.24,0,.35-.03,1.09-.2,1.82-1.24,1.62-2.34Z">
                    </path>
                </svg>
                <div class="w-full h-full grid justify-items-center items-center">
                    <h1 class="text-3xl font-bold">Purchased</h1>
                    <p class="text-4xl font-medium" id="purchased-count"></p>
                </div>
            </div>

            <div class="dash-card">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[70%] h-[70%]" xml:space="preserve" viewBox="0 0 64 64"
                    id="philippines-peso-coin">
                    <circle cx="32" cy="32" r="32" fill="#f9c65b"></circle>
                    <path fill="#ffe27b"
                        d="M55.52 10.3a31.844 31.844 0 0 0-21.7-8.48c-17.67 0-32 14.33-32 32 0 8.37 3.22 15.99 8.48 21.7C3.97 49.67 0 41.3 0 32 0 14.33 14.33 0 32 0c9.3 0 17.67 3.97 23.52 10.3z">
                    </path>
                    <path fill="#f6b444"
                        d="M64 32c0 17.67-14.33 32-32 32-9.28 0-17.64-3.95-23.48-10.26a31.884 31.884 0 0 0 21.74 8.52c17.67 0 32-14.33 32-32 0-8.39-3.23-16.03-8.52-21.74C60.05 14.36 64 22.72 64 32z">
                    </path>
                    <circle cx="32" cy="32" r="26.36" fill="#f6b444"></circle>
                    <path fill="#f09922"
                        d="M51.64 14.42A26.252 26.252 0 0 0 34.06 7.7C19.5 7.69 7.69 19.5 7.69 34.06c0 6.76 2.54 12.92 6.72 17.58C9.03 46.81 5.64 39.8 5.64 32 5.64 17.44 17.44 5.64 32 5.64c7.8 0 14.82 3.39 19.64 8.78z">
                    </path>
                    <circle cx="32" cy="32" r="20.19" fill="#ffca5c" transform="rotate(-22.5 31.998 31.999)">
                    </circle>
                    <path fill="#f09922"
                        d="M54 33.81C54 44.96 44.96 54 33.81 54c-6.04 0-11.45-2.65-15.15-6.85 3.56 3.14 8.23 5.04 13.35 5.04 11.15 0 20.19-9.04 20.19-20.19 0-5.12-1.9-9.79-5.04-13.35 4.19 3.7 6.84 9.12 6.84 15.16z">
                    </path>
                    <path fill="#f09922"
                        d="M46.08 27.87v-3.16h-3.57a8.197 8.197 0 0 0-8.09-6.86H23.5v6.86h-3.58v3.16h3.58v2h-3.58v3.16h3.58v13.11h6.38V39.4h4.55c3.9 0 7.16-2.72 7.99-6.37h3.66v-3.16h-3.46v-2h3.46zM29.9 23.14h3.04c1.27 0 2.39.62 3.08 1.58H29.9v-1.58zm3.04 11.38H29.9v-1.49h6.05a3.76 3.76 0 0 1-3.01 1.49zm3.79-4.64H29.9v-2h6.83v2z">
                    </path>
                </svg>
                <div class="w-full h-full grid justify-items-center items-center">
                    <h1 class="text-3xl font-bold">Total sales</h1>
                    <p class="text-4xl font-medium" id="total-sale"></p>
                </div>
            </div>

        </div>
        <div class="bg-red-400 row-span-4 grid grid-cols-2">
            <div class="bg-slate-800" id="bar"></div>
            <div class="bg-slate-300" id="circle"></div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

        // Create the chart

        let pesoFormatter = new Intl.NumberFormat('en-PH', {
            style: 'currency',
            currency: 'PHP',
        });

        $(document).ready(function() {
            refresh();

        });

        function refresh() {
            getProductsCount();
            getPurchasedCount();
            getTotalSale();

            renderAllChart();
        }

        function renderBarCharts() {
            $.ajax({
                url: "{{ route('dashboard.countCategories') }}",
                type: "GET",
                success: function(data) {
                    createBarChart(data);
                }
            });
        }

        function renderAllChart() {
            renderBarCharts();
            renderDonutChart();
        }

        function createBarChart(data) {
            Highcharts.chart('bar', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'left',
                    text: 'Instrument column chart'
                },
                subtitle: {
                    align: 'left',
                    text: 'Instrument charts help users monitor and analyze key data points for decision-making and performance tracking.'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: ' +
                        '<b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                    name: 'Instruments',
                    colorByPoint: true,
                    data: [{
                            name: 'Acoustic',
                            y: data.acoustic
                        },
                        {
                            name: 'Electric guitar',
                            y: data.electric
                        },
                        {
                            name: 'Bass',
                            y: data.bass
                        },
                    ]

                }],

            });
        }

        function getProductsCount() {
            $.ajax({
                type: "GET",
                url: "{{ route('products.count') }}",
                success: function(response) {
                    $('#product-count').html(response);
                }
            });
        }

        function getPurchasedCount() {
            $.ajax({
                type: "GET",
                url: "{{ route('purchased.count') }}",
                success: function(response) {
                    $('#purchased-count').html(response);
                }
            });
        }

        function getTotalSale() {
            $.ajax({
                type: 'GET',
                url: "{{ route('total.sale') }}",
                success: function(res) {
                    $('#total-sale').html(pesoFormatter.format(res));
                }
            });
        }


        function renderDonutChart() {
            $.ajax({
                type: "GET",
                url: "{{ route('most.sale') }}",
                success: function(response) {
                    console.log(response);
                    createDonutChart(response);
                }
            });
        }

        function createDonutChart(data) {
            Highcharts.chart('circle', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: '<h1 class="text-xl">Most sales</h1>',
                    align: 'left'
                },
                subtitle: {
                    text: 'Our top-selling products showcase the finest in quality, performance, and value, reflecting what musicians and enthusiasts truly love.',
                    align: 'left'
                },

                accessibility: {
                    announceNewData: {
                        enabled: true
                    },
                    point: {
                        valueSuffix: '%'
                    }
                },

                plotOptions: {
                    series: {
                        borderRadius: 5,
                        dataLabels: [{
                            enabled: true,
                            distance: 15,
                            format: '{point.name}'
                        }, {
                            enabled: true,
                            distance: '-30%',
                            filter: {
                                property: 'percentage',
                                operator: '>',
                                value: 5
                            },
                            format: '{point.y:.1f}%',
                            style: {
                                fontSize: '0.9em',
                                textOutline: 'none'
                            }
                        }]
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: ' +
                        '<b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                    name: 'Sales percentage',
                    colorByPoint: true,
                    data: [{
                            name: 'Acoustic',
                            y: data.acoustic,
                            drilldown: 'Acoustic'
                        },
                        {
                            name: 'Electric guitar',
                            y: data.electric,
                            drilldown: 'Electric guitar'
                        },
                        {
                            name: 'Bass',
                            y: data.bass,
                            drilldown: 'Bass'
                        }
                    ]
                }],
                // drilldown: {
                //     series: [{
                //             name: 'Chrome',
                //             id: 'Chrome',
                //             data: [
                //                 [
                //                     'v97.0',
                //                     36.89
                //                 ],
                //                 [
                //                     'v96.0',
                //                     18.16
                //                 ],
                //                 [
                //                     'v95.0',
                //                     0.54
                //                 ],
                //                 [
                //                     'v94.0',
                //                     0.7
                //                 ],
                //                 [
                //                     'v93.0',
                //                     0.8
                //                 ],
                //                 [
                //                     'v92.0',
                //                     0.41
                //                 ],
                //                 [
                //                     'v91.0',
                //                     0.31
                //                 ],
                //                 [
                //                     'v90.0',
                //                     0.13
                //                 ],
                //                 [
                //                     'v89.0',
                //                     0.14
                //                 ],
                //                 [
                //                     'v88.0',
                //                     0.1
                //                 ],
                //                 [
                //                     'v87.0',
                //                     0.35
                //                 ],
                //                 [
                //                     'v86.0',
                //                     0.17
                //                 ],
                //                 [
                //                     'v85.0',
                //                     0.18
                //                 ],
                //                 [
                //                     'v84.0',
                //                     0.17
                //                 ],
                //                 [
                //                     'v83.0',
                //                     0.21
                //                 ],
                //                 [
                //                     'v81.0',
                //                     0.1
                //                 ],
                //                 [
                //                     'v80.0',
                //                     0.16
                //                 ],
                //                 [
                //                     'v79.0',
                //                     0.43
                //                 ],
                //                 [
                //                     'v78.0',
                //                     0.11
                //                 ],
                //                 [
                //                     'v76.0',
                //                     0.16
                //                 ],
                //                 [
                //                     'v75.0',
                //                     0.15
                //                 ],
                //                 [
                //                     'v72.0',
                //                     0.14
                //                 ],
                //                 [
                //                     'v70.0',
                //                     0.11
                //                 ],
                //                 [
                //                     'v69.0',
                //                     0.13
                //                 ],
                //                 [
                //                     'v56.0',
                //                     0.12
                //                 ],
                //                 [
                //                     'v49.0',
                //                     0.17
                //                 ]
                //             ]
                //         },
                //         {
                //             name: 'Safari',
                //             id: 'Safari',
                //             data: [
                //                 [
                //                     'v15.3',
                //                     0.1
                //                 ],
                //                 [
                //                     'v15.2',
                //                     2.01
                //                 ],
                //                 [
                //                     'v15.1',
                //                     2.29
                //                 ],
                //                 [
                //                     'v15.0',
                //                     0.49
                //                 ],
                //                 [
                //                     'v14.1',
                //                     2.48
                //                 ],
                //                 [
                //                     'v14.0',
                //                     0.64
                //                 ],
                //                 [
                //                     'v13.1',
                //                     1.17
                //                 ],
                //                 [
                //                     'v13.0',
                //                     0.13
                //                 ],
                //                 [
                //                     'v12.1',
                //                     0.16
                //                 ]
                //             ]
                //         },
                //         {
                //             name: 'Edge',
                //             id: 'Edge',
                //             data: [
                //                 [
                //                     'v97',
                //                     6.62
                //                 ],
                //                 [
                //                     'v96',
                //                     2.55
                //                 ],
                //                 [
                //                     'v95',
                //                     0.15
                //                 ]
                //             ]
                //         },
                //         {
                //             name: 'Firefox',
                //             id: 'Firefox',
                //             data: [
                //                 [
                //                     'v96.0',
                //                     4.17
                //                 ],
                //                 [
                //                     'v95.0',
                //                     3.33
                //                 ],
                //                 [
                //                     'v94.0',
                //                     0.11
                //                 ],
                //                 [
                //                     'v91.0',
                //                     0.23
                //                 ],
                //                 [
                //                     'v78.0',
                //                     0.16
                //                 ],
                //                 [
                //                     'v52.0',
                //                     0.15
                //                 ]
                //             ]
                //         }
                //     ]
                // }
            });
        }
    </script>
@endsection
