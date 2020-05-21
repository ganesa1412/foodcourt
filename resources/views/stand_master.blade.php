<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Foodcourt Stand </title>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.png"/>
    <link href="/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="/assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> --}}
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        .layout-px-spacing {
            min-height: calc(100vh - 166px)!important;
        }
    </style>
     <link href="/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/plugins/table/datatable/dt-global_style.css">

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content"> <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 792 723" style="enable-background:new 0 0 792 723;" xml:space="preserve"> <g> <g> <path class="st0" d="M213.9,584.4c-47.4-25.5-84.7-60.8-111.8-106.1C75,433.1,61.4,382,61.4,324.9c0-57,13.6-108.1,40.7-153.3 S166.5,91,213.9,65.5s100.7-38.2,159.9-38.2c49.9,0,95,8.8,135.3,26.3s74.1,42.8,101.5,75.7l-85.5,78.9 c-38.9-44.9-87.2-67.4-144.7-67.4c-35.6,0-67.4,7.8-95.4,23.4s-49.7,37.4-65.4,65.4c-15.6,28-23.4,59.8-23.4,95.4 s7.8,67.4,23.4,95.4s37.4,49.7,65.4,65.4c28,15.6,59.7,23.4,95.4,23.4c57.6,0,105.8-22.7,144.7-68.2l85.5,78.9 c-27.4,33.4-61.4,58.9-102,76.5c-40.6,17.5-85.8,26.3-135.7,26.3C314.3,622.7,261.3,809.9,213.9,584.4z"/> </g> <circle class="st1" cx="375.4" cy="322.9" r="100"/> </g> <g> <circle class="st2" cx="275.4" cy="910" r="65"></circle> <circle class="st4" cx="475.4" cy="910" r="65"></circle> </g> </svg> </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="/assets/img/logo.png" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="/" class="nav-link"> Foodcourt </a>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <div class="page-title">
                            <h3>@yield('title')</h3>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">
                <div class="shadow-bottom"></div>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="/stand" {!! $page == 'dashboard' ? 'data-active="true"' : '' !!} aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span> Dashboard Stand</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#submenu2" {!! $page == 'menu' ? 'data-active="true"' : '' !!} data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>
                                <span> Menu</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="{{ $page == 'menu'?'':'collapse' }} submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                            <li {!! $page_child == 'category' ? 'class="active"' : '' !!}>
                                <a href="/stand/category"> Kategori Menu </a>
                            </li>
                            <li {!! $page_child == 'menu' ? 'class="active"' : '' !!}>
                                <a href="/stand/menu"> Daftar Menu </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="/logout" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span> Log Out</span>
                            </div>
                        </a>
                    </li>
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                    @yield('content')
                </div>

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">© 2020. <a href="#">Sistem Informasi 2018 B</a></p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="/bootstrap/js/popper.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="/plugins/apex/apexcharts.min.js"></script>
 <script src="/plugins/table/datatable/datatables.js"></script>
     <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 15, 30, 50, 100],
            "pageLength": 15,
             "order": []
        });
    </script>

     <script src="/plugins/apex/apexcharts.min.js"></script>

    <!-- script type="text/javascript">
          $.ajax({
            type: "POST", 
            url: "#", 
            data: {}, 
            dataType: "json",
            beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
              }
            },
            success: function(response){
              var nom = [], nom2 = [], month = [];
              $.each(response, function(index, val) {
                nom.push(val.in);
                nom2.push(val.out);
                month.push(val.month);
              });
              try {
                Apex.tooltip = {
                    theme: 'dark'
                }

                var options1 = {
                  chart: {
                    fontFamily: 'Nunito, sans-serif',
                    height: 365,
                    type: 'area',
                    zoom: {
                        enabled: false
                    },
                    dropShadow: {
                      enabled: true,
                      opacity: 0.3,
                      blur: 5,
                      left: -7,
                      top: 22
                    },
                    toolbar: {
                      show: false
                    },
                    events: {
                      mounted: function(ctx, config) {
                        const highest1 = ctx.getHighestValueInSeries(0);
                        const highest2 = ctx.getHighestValueInSeries(1);

                        ctx.addPointAnnotation({
                          x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
                          y: highest1,
                          label: {
                            style: {
                              cssClass: 'd-none'
                            }
                          },
                          customSVG: {
                              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                              cssClass: undefined,
                              offsetX: -8,
                              offsetY: 5
                          }
                        })

                        ctx.addPointAnnotation({
                          x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
                          y: highest2,
                          label: {
                            style: {
                              cssClass: 'd-none'
                            }
                          },
                          customSVG: {
                              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                              cssClass: undefined,
                              offsetX: -8,
                              offsetY: 5
                          }
                        })
                      },
                    }
                  },
                  colors: ['#1b55e2', '#e7515a'],
                  dataLabels: {
                      enabled: false
                  },
                  markers: {
                    discrete: [{
                    seriesIndex: 0,
                    dataPointIndex: 7,
                    fillColor: '#000',
                    strokeColor: '#000',
                    size: 5
                  }, {
                    seriesIndex: 2,
                    dataPointIndex: 11,
                    fillColor: '#000',
                    strokeColor: '#000',
                    size: 4
                  }]
                  },
                  subtitle: {
                    text: '7 Hari Terakhir',
                    align: 'left',
                    margin: 0,
                    offsetX: -10,
                    offsetY: 35,
                    floating: false,
                    style: {
                      fontSize: '14px',
                      color:  '#888ea8'
                    }
                  },
                  title: {
                    text: 'Data Pemasukan Stand',
                    align: 'left',
                    margin: 0,
                    offsetX: -10,
                    offsetY: 0,
                    floating: false,
                    style: {
                      fontSize: '25px',
                      color:  '#bfc9d4'
                    },
                  },
                  stroke: {
                      show: true,
                      curve: 'smooth',
                      width: 2,
                      lineCap: 'square'
                  },
                  // DATA PEMASUKAN & PENGELUARAN HERE
                  series: [{
                      name: 'Pemasukan',
                      data: nom
                  }, {
                      name: 'Pengeluaran',
                      data: nom2
                  }],
                  labels: month,
                  xaxis: {
                    axisBorder: {
                      show: false
                    },
                    axisTicks: {
                      show: false
                    },
                    crosshairs: {
                      show: true
                    },
                    labels: {
                      offsetX: 0,
                      offsetY: 5,
                      style: {
                          fontSize: '12px',
                          fontFamily: 'Nunito, sans-serif',
                          cssClass: 'apexcharts-xaxis-title',
                      },
                    }
                  },
                  yaxis: {
                    labels: {
                      formatter: function(value, index) {
                        return (value / 1000) + 'K'
                      },
                      offsetX: -22,
                      offsetY: 0,
                      style: {
                          fontSize: '12px',
                          fontFamily: 'Nunito, sans-serif',
                          cssClass: 'apexcharts-yaxis-title',
                      },
                    }
                  },
                  grid: {
                    borderColor: '#191e3a',
                    strokeDashArray: 5,
                    xaxis: {
                        lines: {
                            show: true
                        }
                    },   
                    yaxis: {
                        lines: {
                            show: false,
                        }
                    },
                    padding: {
                      top: 0,
                      right: 0,
                      bottom: 0,
                      left: -10
                    }, 
                  }, 
                  legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    offsetY: -50,
                    fontSize: '16px',
                    fontFamily: 'Nunito, sans-serif',
                    markers: {
                      width: 10,
                      height: 10,
                      strokeWidth: 0,
                      strokeColor: '#fff',
                      fillColors: undefined,
                      radius: 12,
                      onClick: undefined,
                      offsetX: 0,
                      offsetY: 0
                    },    
                    itemMargin: {
                      horizontal: 0,
                      vertical: 20
                    }
                  },
                  tooltip: {
                    theme: 'dark',
                    marker: {
                      show: true,
                    },
                    x: {
                      show: false,
                    }
                  },
                  fill: {
                      type:"gradient",
                      gradient: {
                          type: "vertical",
                          shadeIntensity: 1,
                          inverseColors: !1,
                          opacityFrom: .28,
                          opacityTo: .05,
                          stops: [45, 100]
                      }
                  },
                  responsive: [{
                    breakpoint: 575,
                    options: {
                      legend: {
                          offsetY: -30,
                      },
                    },
                  }]
                }

            var chart1 = new ApexCharts(
                document.querySelector("#incomeDaily"),
                options1
            );
            chart1.render();
        } catch(e) {
            console.log(e);
        }
            },
            error: function (xhr, ajaxOptions, thrownError) { 
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });

    </script> -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>