@extends('dashboard.layouts.master')
@section('content')

    <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol style="direction: ltr" class="breadcrumb">
                                <li class="breadcrumb-item active">فروشگاه</li>
                            </ol>
                        </div>
                        <h4 class="page-title">داشبورد اصلی</h4></div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-eco">
                        <div class="card-body">
                            <h4 class="title-text mt-0">تعداد  کالاهای شما</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ number_format($shop->products()->get()->count()) }}</h3><i class="fa fa-cubes card-eco-icon text-pink align-self-center"></i></div>
                            <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>۱۰.۵٪</span> افزایش نسبت به دیروز</p>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-lg-4">
                    <div class="card card-eco">
                        <div class="card-body">
                            <h4 class="title-text mt-0">تعداد فروش های فروشگاه</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ number_format($shop->purchases()->get()->count()) }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                            <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>۱.۵٪</span> افزایش نسبت به دیروز</p>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <!--end col-->
                <div class="col-lg-4">
                    <div class="card card-eco">
                        <div class="card-body">
                            <h4 class="title-text mt-0"></h4>مجموع فروش شما</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ number_format($sum) }}</h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
                            <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>۱۰.۵٪</span> افزایش نسبت به دیروز</p>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
              <div class="col-lg-8">
    <div class="card">
        <div class="card-body" style="position: relative;">
            <div id="crm_dash_2" class="apex-charts" style="min-height: 380px;">
                <div id="apexcharts0okdwwjz" class="apexcharts-canvas apexcharts0okdwwjz light zoomable" style="width: 986px; height: 365px;">
                    <svg id="SvgjsSvg1342" width="986" height="365" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                        <foreignObject x="0" y="0" width="986" height="365">
                            <div class="apexcharts-legend center position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="right: 0px; position: absolute; left: 20px; top: auto; bottom: 0px;">
                                <div class="apexcharts-legend-series" rel="1" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(77, 121, 246); color: rgb(77, 121, 246); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" data:collapsed="false" style="color: rgb(77, 121, 246); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">نرخ سود</span></div>
                                <div class="apexcharts-legend-series" rel="2" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(238, 241, 245); color: rgb(238, 241, 245); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" data:collapsed="false" style="color: rgb(238, 241, 245); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">تعداد سفارشات</span></div>
                                <div class="apexcharts-legend-series" rel="3" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="3" data:collapsed="false" style="background: rgb(74, 199, 236); color: rgb(74, 199, 236); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="3" data:collapsed="false" style="color: rgb(74, 199, 236); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">فاکتور های ساخته شده</span></div>
                            </div>
                            <style type="text/css">
                                .apexcharts-legend {
                                    display: flex;
                                    overflow: auto;
                                    padding: 0 10px;
                                }

                                .apexcharts-legend.position-bottom,
                                .apexcharts-legend.position-top {
                                    flex-wrap: wrap
                                }

                                .apexcharts-legend.position-right,
                                .apexcharts-legend.position-left {
                                    flex-direction: column;
                                    bottom: 0;
                                }

                                .apexcharts-legend.position-bottom.left,
                                .apexcharts-legend.position-top.left,
                                .apexcharts-legend.position-right,
                                .apexcharts-legend.position-left {
                                    justify-content: flex-start;
                                }

                                .apexcharts-legend.position-bottom.center,
                                .apexcharts-legend.position-top.center {
                                    justify-content: center;
                                }

                                .apexcharts-legend.position-bottom.right,
                                .apexcharts-legend.position-top.right {
                                    justify-content: flex-end;
                                }

                                .apexcharts-legend-series {
                                    cursor: pointer;
                                    line-height: normal;
                                }

                                .apexcharts-legend.position-bottom .apexcharts-legend-series,
                                .apexcharts-legend.position-top .apexcharts-legend-series {
                                    display: flex;
                                    align-items: center;
                                }

                                .apexcharts-legend-text {
                                    position: relative;
                                    font-size: 14px;
                                }

                                .apexcharts-legend-text *,
                                .apexcharts-legend-marker * {
                                    pointer-events: none;
                                }

                                .apexcharts-legend-marker {
                                    position: relative;
                                    display: inline-block;
                                    cursor: pointer;
                                    margin-right: 3px;
                                }

                                .apexcharts-legend.right .apexcharts-legend-series,
                                .apexcharts-legend.left .apexcharts-legend-series {
                                    display: inline-block;
                                }

                                .apexcharts-legend-series.no-click {
                                    cursor: auto;
                                }

                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                .apexcharts-legend .apexcharts-hidden-null-series {
                                    display: none !important;
                                }

                                .inactive-legend {
                                    opacity: 0.45;
                                }
                            </style>
                        </foreignObject>
                        <g id="SvgjsG1344" class="apexcharts-inner apexcharts-graphical" transform="translate(5.833333333333332, 40)">
                            <defs id="SvgjsDefs1343">
                                <clipPath id="gridRectMask0okdwwjz">
                                    <rect id="SvgjsRect1362" width="931.75" height="269.348" x="-2.5" y="-2.5" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                </clipPath>
                                <clipPath id="gridRectMarkerMask0okdwwjz">
                                    <rect id="SvgjsRect1363" width="966.75" height="304.348" x="-20" y="-20" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                </clipPath>
                                <linearGradient id="SvgjsLinearGradient1369" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1370" stop-opacity="1" stop-color="rgba(242,245,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1371" stop-opacity="1" stop-color="rgba(238,241,245,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1372" stop-opacity="1" stop-color="rgba(238,241,245,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1373" stop-opacity="1" stop-color="rgba(242,245,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1379" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1380" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1381" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1382" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1383" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1385" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1386" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1387" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1388" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1389" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1391" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1392" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1393" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1394" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1395" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1397" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1398" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1399" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1400" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1401" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1403" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1404" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1405" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1406" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1407" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1409" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1410" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1411" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1412" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1413" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1415" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1416" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1417" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1418" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1419" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1421" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1422" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1423" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1424" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1425" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1427" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1428" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1429" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1430" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1431" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1433" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1434" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1435" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1436" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1437" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1439" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1440" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1441" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1442" stop-opacity="1" stop-color="rgba(77,121,246,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1443" stop-opacity="1" stop-color="rgba(122,155,248,1)" offset="1"></stop>
                                </linearGradient>
                                <linearGradient id="SvgjsLinearGradient1449" x1="0" y1="1" x2="1" y2="1">
                                    <stop id="SvgjsStop1450" stop-opacity="1" stop-color="rgba(119,213,241,1)" offset="0"></stop>
                                    <stop id="SvgjsStop1451" stop-opacity="1" stop-color="rgba(74,199,236,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1452" stop-opacity="1" stop-color="rgba(74,199,236,1)" offset="1"></stop>
                                    <stop id="SvgjsStop1453" stop-opacity="1" stop-color="rgba(119,213,241,1)" offset="1"></stop>
                                </linearGradient>
                            </defs>
                            <line id="SvgjsLine1348" x1="372.6286348476945" y1="0" x2="372.6286348476945" y2="264.348" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="372.6286348476945" y="0" width="1" height="264.348" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                            <g id="SvgjsG1455" class="apexcharts-xaxis" transform="translate(0, 0)">
                                <g id="SvgjsG1456" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                    <text id="SvgjsText1457" font-family="Helvetica, Arial, sans-serif" x="39.048714058302664" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1458" style="font-family: Helvetica, Arial, sans-serif;">1398</tspan>
                                        <title>1398</title>
                                    </text>
                                    <text id="SvgjsText1459" font-family="Helvetica, Arial, sans-serif" x="125.51372375882998" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1460" style="font-family: Helvetica, Arial, sans-serif;">آذر</tspan>
                                        <title>Feb '03</title>
                                    </text>
                                    <text id="SvgjsText1461" font-family="Helvetica, Arial, sans-serif" x="203.61115187543533" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1462" style="font-family: Helvetica, Arial, sans-serif;">دی</tspan>
                                        <title>Mar '03</title>
                                    </text>
                                    <text id="SvgjsText1463" font-family="Helvetica, Arial, sans-serif" x="290.07616157596266" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1464" style="font-family: Helvetica, Arial, sans-serif;">بهمن</tspan>
                                        <title>Apr '03</title>
                                    </text>
                                    <text id="SvgjsText1465" font-family="Helvetica, Arial, sans-serif" x="373.75197741518264" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1466" style="font-family: Helvetica, Arial, sans-serif;">اسفند</tspan>
                                        <title>May '03</title>
                                    </text>
                                    <text id="SvgjsText1467" font-family="Helvetica, Arial, sans-serif" x="460.21698711570997" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1468" style="font-family: Helvetica, Arial, sans-serif;">فروردین</tspan>
                                        <title>Jun '03</title>
                                    </text>
                                    <text id="SvgjsText1469" font-family="Helvetica, Arial, sans-serif" x="543.89280295493" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1470" style="font-family: Helvetica, Arial, sans-serif;">اردیبهشت</tspan>
                                        <title>Jul '03</title>
                                    </text>
                                    <text id="SvgjsText1471" font-family="Helvetica, Arial, sans-serif" x="630.3578126554572" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1472" style="font-family: Helvetica, Arial, sans-serif;">خرداد</tspan>
                                        <title>Aug '03</title>
                                    </text>
                                    <text id="SvgjsText1473" font-family="Helvetica, Arial, sans-serif" x="716.8228223559845" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1474" style="font-family: Helvetica, Arial, sans-serif;">تیر</tspan>
                                        <title>Sep '03</title>
                                    </text>
                                    <text id="SvgjsText1475" font-family="Helvetica, Arial, sans-serif" x="800.4986381952045" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1476" style="font-family: Helvetica, Arial, sans-serif;">مرداد</tspan>
                                        <title>Oct '03</title>
                                    </text>
                                    <text id="SvgjsText1477" font-family="Helvetica, Arial, sans-serif" x="886.9636478957318" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1478" style="font-family: Helvetica, Arial, sans-serif;">شهریور</tspan>
                                        <title>Nov '03</title>
                                    </text>
                                    <text id="SvgjsText1479" font-family="Helvetica, Arial, sans-serif" x="970.6394637349518" y="293.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                        <tspan id="SvgjsTspan1480" style="font-family: Helvetica, Arial, sans-serif;"></tspan>
                                        <title>Dec '03</title>
                                    </text>
                                </g>
                                <line id="SvgjsLine1481" x1="0" y1="265.348" x2="926.75" y2="265.348" stroke="#bec7e0" stroke-dasharray="0" stroke-width="1"></line>
                            </g>
                            <g id="SvgjsG1495" class="apexcharts-grid">
                                <g id="SvgjsG1496" class="apexcharts-gridlines-horizontal">
                                    <line id="SvgjsLine1509" x1="0" y1="0" x2="926.75" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1510" x1="0" y1="26.434800000000003" x2="926.75" y2="26.434800000000003" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1511" x1="0" y1="52.869600000000005" x2="926.75" y2="52.869600000000005" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1512" x1="0" y1="79.30440000000002" x2="926.75" y2="79.30440000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1513" x1="0" y1="105.73920000000001" x2="926.75" y2="105.73920000000001" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1514" x1="0" y1="132.174" x2="926.75" y2="132.174" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1515" x1="0" y1="158.6088" x2="926.75" y2="158.6088" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1516" x1="0" y1="185.0436" x2="926.75" y2="185.0436" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1517" x1="0" y1="211.4784" x2="926.75" y2="211.4784" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1518" x1="0" y1="237.9132" x2="926.75" y2="237.9132" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                    <line id="SvgjsLine1519" x1="0" y1="264.348" x2="926.75" y2="264.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                </g>
                                <g id="SvgjsG1497" class="apexcharts-gridlines-vertical"></g>
                                <line id="SvgjsLine1498" x1="39.048714058302664" y1="265.348" x2="39.048714058302664" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1499" x1="125.51372375882998" y1="265.348" x2="125.51372375882998" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1500" x1="203.61115187543533" y1="265.348" x2="203.61115187543533" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1501" x1="290.07616157596266" y1="265.348" x2="290.07616157596266" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1502" x1="373.75197741518264" y1="265.348" x2="373.75197741518264" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1503" x1="460.21698711570997" y1="265.348" x2="460.21698711570997" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1504" x1="543.89280295493" y1="265.348" x2="543.89280295493" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1505" x1="630.3578126554572" y1="265.348" x2="630.3578126554572" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1506" x1="716.8228223559845" y1="265.348" x2="716.8228223559845" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1507" x1="800.4986381952045" y1="265.348" x2="800.4986381952045" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1508" x1="886.9636478957318" y1="265.348" x2="886.9636478957318" y2="271.348" stroke="#bec7e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                <line id="SvgjsLine1521" x1="0" y1="264.348" x2="926.75" y2="264.348" stroke="transparent" stroke-dasharray="0"></line>
                                <line id="SvgjsLine1520" x1="0" y1="1" x2="0" y2="264.348" stroke="transparent" stroke-dasharray="0"></line>
                            </g>
                            <g id="SvgjsG1365" class="apexcharts-area-series apexcharts-plot-series">
                                <g id="SvgjsG1366" class="apexcharts-series Vendors" data:longestSeries="true" rel="1" data:realIndex="1">
                                    <path id="apexcharts-area-0" d="M 38.54158790170241 264.348L 38.54158790170241 97.71029226361028C 68.80434129688697 97.71029226361028 94.74384420704517 56.050865329512845 125.00659760222973 56.050865329512845C 152.3406974430416 56.050865329512845 175.7699258780232 109.07195415472776 203.10402571883506 109.07195415472776C 233.3261033702089 109.07195415472776 259.2307413571008 10.604217765042904 289.4528190084746 10.604217765042904C 318.7393545522016 10.604217765042904 343.8420993039676 181.02914613180513 373.12863484769457 181.02914613180513C 403.39138824287915 181.02914613180513 429.3308911530373 101.49751289398276 459.5936445482219 101.49751289398276C 488.8801800919489 101.49751289398276 513.9829248437148 184.81636676217764 543.2694603874419 184.81636676217764C 573.5322137826264 184.81636676217764 599.4717166927846 109.07195415472776 629.7344700879692 109.07195415472776C 659.9972234831538 109.07195415472776 685.9367263933119 52.26364469914034 716.1994797884965 52.26364469914034C 745.5266910760342 52.26364469914034 770.6643007510667 162.09304297994268 799.9915120386044 162.09304297994268C 830.2542654337889 162.09304297994268 856.1937683439471 101.49751289398276 886.4565217391316 101.49751289398276C 886.4565217391316 101.49751289398276 886.4565217391316 101.49751289398276 886.4565217391316 264.348M 886.4565217391316 101.49751289398276z" fill="url(#SvgjsLinearGradient1369)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 38.54158790170241 264.348L 38.54158790170241 97.71029226361028C 68.80434129688697 97.71029226361028 94.74384420704517 56.050865329512845 125.00659760222973 56.050865329512845C 152.3406974430416 56.050865329512845 175.7699258780232 109.07195415472776 203.10402571883506 109.07195415472776C 233.3261033702089 109.07195415472776 259.2307413571008 10.604217765042904 289.4528190084746 10.604217765042904C 318.7393545522016 10.604217765042904 343.8420993039676 181.02914613180513 373.12863484769457 181.02914613180513C 403.39138824287915 181.02914613180513 429.3308911530373 101.49751289398276 459.5936445482219 101.49751289398276C 488.8801800919489 101.49751289398276 513.9829248437148 184.81636676217764 543.2694603874419 184.81636676217764C 573.5322137826264 184.81636676217764 599.4717166927846 109.07195415472776 629.7344700879692 109.07195415472776C 659.9972234831538 109.07195415472776 685.9367263933119 52.26364469914034 716.1994797884965 52.26364469914034C 745.5266910760342 52.26364469914034 770.6643007510667 162.09304297994268 799.9915120386044 162.09304297994268C 830.2542654337889 162.09304297994268 856.1937683439471 101.49751289398276 886.4565217391316 101.49751289398276C 886.4565217391316 101.49751289398276 886.4565217391316 101.49751289398276 886.4565217391316 264.348M 886.4565217391316 101.49751289398276z" pathFrom="M -1 264.348L -1 264.348L 125.00659760222973 264.348L 203.10402571883506 264.348L 289.4528190084746 264.348L 373.12863484769457 264.348L 459.5936445482219 264.348L 543.2694603874419 264.348L 629.7344700879692 264.348L 716.1994797884965 264.348L 799.9915120386044 264.348L 886.4565217391316 264.348"></path>
                                    <path id="apexcharts-area-0" d="M 38.54158790170241 97.71029226361028C 68.80434129688697 97.71029226361028 94.74384420704517 56.050865329512845 125.00659760222973 56.050865329512845C 152.3406974430416 56.050865329512845 175.7699258780232 109.07195415472776 203.10402571883506 109.07195415472776C 233.3261033702089 109.07195415472776 259.2307413571008 10.604217765042904 289.4528190084746 10.604217765042904C 318.7393545522016 10.604217765042904 343.8420993039676 181.02914613180513 373.12863484769457 181.02914613180513C 403.39138824287915 181.02914613180513 429.3308911530373 101.49751289398276 459.5936445482219 101.49751289398276C 488.8801800919489 101.49751289398276 513.9829248437148 184.81636676217764 543.2694603874419 184.81636676217764C 573.5322137826264 184.81636676217764 599.4717166927846 109.07195415472776 629.7344700879692 109.07195415472776C 659.9972234831538 109.07195415472776 685.9367263933119 52.26364469914034 716.1994797884965 52.26364469914034C 745.5266910760342 52.26364469914034 770.6643007510667 162.09304297994268 799.9915120386044 162.09304297994268C 830.2542654337889 162.09304297994268 856.1937683439471 101.49751289398276 886.4565217391316 101.49751289398276" fill="none" fill-opacity="1" stroke="#eef1f5" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 38.54158790170241 97.71029226361028C 68.80434129688697 97.71029226361028 94.74384420704517 56.050865329512845 125.00659760222973 56.050865329512845C 152.3406974430416 56.050865329512845 175.7699258780232 109.07195415472776 203.10402571883506 109.07195415472776C 233.3261033702089 109.07195415472776 259.2307413571008 10.604217765042904 289.4528190084746 10.604217765042904C 318.7393545522016 10.604217765042904 343.8420993039676 181.02914613180513 373.12863484769457 181.02914613180513C 403.39138824287915 181.02914613180513 429.3308911530373 101.49751289398276 459.5936445482219 101.49751289398276C 488.8801800919489 101.49751289398276 513.9829248437148 184.81636676217764 543.2694603874419 184.81636676217764C 573.5322137826264 184.81636676217764 599.4717166927846 109.07195415472776 629.7344700879692 109.07195415472776C 659.9972234831538 109.07195415472776 685.9367263933119 52.26364469914034 716.1994797884965 52.26364469914034C 745.5266910760342 52.26364469914034 770.6643007510667 162.09304297994268 799.9915120386044 162.09304297994268C 830.2542654337889 162.09304297994268 856.1937683439471 101.49751289398276 886.4565217391316 101.49751289398276" pathFrom="M -1 264.348L -1 264.348L 125.00659760222973 264.348L 203.10402571883506 264.348L 289.4528190084746 264.348L 373.12863484769457 264.348L 459.5936445482219 264.348L 543.2694603874419 264.348L 629.7344700879692 264.348L 716.1994797884965 264.348L 799.9915120386044 264.348L 886.4565217391316 264.348"></path>
                                    <g id="SvgjsG1367" class="apexcharts-series-markers-wrap">
                                        <g class="apexcharts-series-markers">
                                            <circle id="SvgjsCircle1527" r="0" cx="0" cy="0" class="apexcharts-marker w6zen0xme" stroke="#ffffff" fill="#eef1f5" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1368" class="apexcharts-datalabels"></g>
                                </g>
                            </g>
                            <g id="SvgjsG1376" class="apexcharts-bar-series apexcharts-plot-series">
                                <g id="SvgjsG1377" class="apexcharts-series Leads" rel="1" data:realIndex="0">
                                    <path id="apexcharts-bar-area-0" d="M 30.731845090041872 264.348L 30.731845090041872 181.14679690726294Q 38.54158790170241 173.3370540956024 46.35133071336294 181.14679690726294L 46.35133071336294 264.348L 30.731845090041872 264.348" fill="url(#SvgjsLinearGradient1379)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 30.731845090041872 264.348L 30.731845090041872 181.14679690726294Q 38.54158790170241 173.3370540956024 46.35133071336294 181.14679690726294L 46.35133071336294 264.348L 30.731845090041872 264.348" pathFrom="M 30.731845090041872 264.348L 30.731845090041872 264.348L 46.35133071336294 264.348L 46.35133071336294 264.348L 30.731845090041872 264.348" cy="177.24192550143266" cx="46.35133071336294" j="0" val="23" barHeight="87.10607449856737" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 117.1968547905692 264.348L 117.1968547905692 226.59344447173285Q 125.00659760222973 218.78370166007232 132.81634041389026 226.59344447173285L 132.81634041389026 264.348L 117.1968547905692 264.348" fill="url(#SvgjsLinearGradient1385)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 117.1968547905692 264.348L 117.1968547905692 226.59344447173285Q 125.00659760222973 218.78370166007232 132.81634041389026 226.59344447173285L 132.81634041389026 264.348L 117.1968547905692 264.348" pathFrom="M 117.1968547905692 264.348L 117.1968547905692 264.348L 132.81634041389026 264.348L 132.81634041389026 264.348L 117.1968547905692 264.348" cy="222.68857306590257" cx="132.81634041389026" j="1" val="11" barHeight="41.65942693409743" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 195.29428290717453 264.348L 195.29428290717453 184.9340175376354Q 203.10402571883506 177.12427472597489 210.9137685304956 184.9340175376354L 210.9137685304956 264.348L 195.29428290717453 264.348" fill="url(#SvgjsLinearGradient1391)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 195.29428290717453 264.348L 195.29428290717453 184.9340175376354Q 203.10402571883506 177.12427472597489 210.9137685304956 184.9340175376354L 210.9137685304956 264.348L 195.29428290717453 264.348" pathFrom="M 195.29428290717453 264.348L 195.29428290717453 264.348L 210.9137685304956 264.348L 210.9137685304956 264.348L 195.29428290717453 264.348" cy="181.02914613180513" cx="210.9137685304956" j="2" val="22" barHeight="83.31885386819486" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 281.64307619681404 264.348L 281.64307619681404 165.99791438577296Q 289.4528190084746 158.18817157411243 297.2625618201351 165.99791438577296L 297.2625618201351 264.348L 281.64307619681404 264.348" fill="url(#SvgjsLinearGradient1397)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 281.64307619681404 264.348L 281.64307619681404 165.99791438577296Q 289.4528190084746 158.18817157411243 297.2625618201351 165.99791438577296L 297.2625618201351 264.348L 281.64307619681404 264.348" pathFrom="M 281.64307619681404 264.348L 281.64307619681404 264.348L 297.2625618201351 264.348L 297.2625618201351 264.348L 281.64307619681404 264.348" cy="162.09304297994268" cx="297.2625618201351" j="3" val="27" barHeight="102.25495702005733" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 365.318892036034 264.348L 365.318892036034 219.01900321098788Q 373.12863484769457 211.20926039932735 380.93837765935507 219.01900321098788L 380.93837765935507 264.348L 365.318892036034 264.348" fill="url(#SvgjsLinearGradient1403)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 365.318892036034 264.348L 365.318892036034 219.01900321098788Q 373.12863484769457 211.20926039932735 380.93837765935507 219.01900321098788L 380.93837765935507 264.348L 365.318892036034 264.348" pathFrom="M 365.318892036034 264.348L 365.318892036034 264.348L 380.93837765935507 264.348L 380.93837765935507 264.348L 365.318892036034 264.348" cy="215.1141318051576" cx="380.93837765935507" j="4" val="13" barHeight="49.23386819484242" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 451.78390173656135 264.348L 451.78390173656135 184.9340175376354Q 459.5936445482219 177.12427472597489 467.4033873598824 184.9340175376354L 467.4033873598824 264.348L 451.78390173656135 264.348" fill="url(#SvgjsLinearGradient1409)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 451.78390173656135 264.348L 451.78390173656135 184.9340175376354Q 459.5936445482219 177.12427472597489 467.4033873598824 184.9340175376354L 467.4033873598824 264.348L 451.78390173656135 264.348" pathFrom="M 451.78390173656135 264.348L 451.78390173656135 264.348L 467.4033873598824 264.348L 467.4033873598824 264.348L 451.78390173656135 264.348" cy="181.02914613180513" cx="467.4033873598824" j="5" val="22" barHeight="83.31885386819486" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 535.4597175757814 264.348L 535.4597175757814 128.12570808204802Q 543.2694603874419 120.3159652703875 551.0792031991025 128.12570808204802L 551.0792031991025 264.348L 535.4597175757814 264.348" fill="url(#SvgjsLinearGradient1415)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 535.4597175757814 264.348L 535.4597175757814 128.12570808204802Q 543.2694603874419 120.3159652703875 551.0792031991025 128.12570808204802L 551.0792031991025 264.348L 535.4597175757814 264.348" pathFrom="M 535.4597175757814 264.348L 535.4597175757814 264.348L 551.0792031991025 264.348L 551.0792031991025 264.348L 535.4597175757814 264.348" cy="124.22083667621774" cx="551.0792031991025" j="6" val="37" barHeight="140.12716332378227" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 621.9247272763087 264.348L 621.9247272763087 188.72123816800791Q 629.7344700879692 180.9114953563474 637.5442128996298 188.72123816800791L 637.5442128996298 264.348L 621.9247272763087 264.348" fill="url(#SvgjsLinearGradient1421)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 621.9247272763087 264.348L 621.9247272763087 188.72123816800791Q 629.7344700879692 180.9114953563474 637.5442128996298 188.72123816800791L 637.5442128996298 264.348L 621.9247272763087 264.348" pathFrom="M 621.9247272763087 264.348L 621.9247272763087 264.348L 637.5442128996298 264.348L 637.5442128996298 264.348L 621.9247272763087 264.348" cy="184.81636676217764" cx="637.5442128996298" j="7" val="21" barHeight="79.53163323782238" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 708.389736976836 264.348L 708.389736976836 101.61516366944055Q 716.1994797884965 93.80542085778002 724.0092226001572 101.61516366944055L 724.0092226001572 264.348L 708.389736976836 264.348" fill="url(#SvgjsLinearGradient1427)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 708.389736976836 264.348L 708.389736976836 101.61516366944055Q 716.1994797884965 93.80542085778002 724.0092226001572 101.61516366944055L 724.0092226001572 264.348L 708.389736976836 264.348" pathFrom="M 708.389736976836 264.348L 708.389736976836 264.348L 724.0092226001572 264.348L 724.0092226001572 264.348L 708.389736976836 264.348" cy="97.71029226361028" cx="724.0092226001572" j="8" val="44" barHeight="166.63770773638973" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 792.1817692269439 264.348L 792.1817692269439 184.9340175376354Q 799.9915120386044 177.12427472597489 807.801254850265 184.9340175376354L 807.801254850265 264.348L 792.1817692269439 264.348" fill="url(#SvgjsLinearGradient1433)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 792.1817692269439 264.348L 792.1817692269439 184.9340175376354Q 799.9915120386044 177.12427472597489 807.801254850265 184.9340175376354L 807.801254850265 264.348L 792.1817692269439 264.348" pathFrom="M 792.1817692269439 264.348L 792.1817692269439 264.348L 807.801254850265 264.348L 807.801254850265 264.348L 792.1817692269439 264.348" cy="181.02914613180513" cx="807.801254850265" j="9" val="22" barHeight="83.31885386819486" barWidth="15.619485623321065"></path>
                                    <path id="apexcharts-bar-area-0" d="M 878.6467789274711 264.348L 878.6467789274711 154.63625249465545Q 886.4565217391316 146.82650968299492 894.2662645507922 154.63625249465545L 894.2662645507922 264.348L 878.6467789274711 264.348" fill="url(#SvgjsLinearGradient1439)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 878.6467789274711 264.348L 878.6467789274711 154.63625249465545Q 886.4565217391316 146.82650968299492 894.2662645507922 154.63625249465545L 894.2662645507922 264.348L 878.6467789274711 264.348" pathFrom="M 878.6467789274711 264.348L 878.6467789274711 264.348L 894.2662645507922 264.348L 894.2662645507922 264.348L 878.6467789274711 264.348" cy="150.73138108882517" cx="894.2662645507922" j="10" val="30" barHeight="113.61661891117483" barWidth="15.619485623321065"></path>
                                    <g id="SvgjsG1378" class="apexcharts-datalabels"></g>
                                </g>
                            </g>
                            <g id="SvgjsG1445" class="apexcharts-line-series apexcharts-plot-series">
                                <g id="SvgjsG1446" class="apexcharts-series InvoicexGenerate" data:longestSeries="true" rel="1" data:realIndex="2">
                                    <path id="apexcharts-line-0" d="M 38.54158790170241 150.73138108882517C 68.80434129688697 150.73138108882517 94.74384420704517 169.66748424068766 125.00659760222973 169.66748424068766C 152.3406974430416 169.66748424068766 175.7699258780232 128.00805730659022 203.10402571883506 128.00805730659022C 233.3261033702089 128.00805730659022 259.2307413571008 150.73138108882517 289.4528190084746 150.73138108882517C 318.7393545522016 150.73138108882517 343.8420993039676 93.92307163323778 373.12863484769457 93.92307163323778C 403.39138824287915 93.92307163323778 429.3308911530373 131.79527793696272 459.5936445482219 131.79527793696272C 488.8801800919489 131.79527793696272 513.9829248437148 21.965879656160382 543.2694603874419 21.965879656160382C 573.5322137826264 21.965879656160382 599.4717166927846 67.41252722063032 629.7344700879692 67.41252722063032C 659.9972234831538 67.41252722063032 685.9367263933119 40.901982808022865 716.1994797884965 40.901982808022865C 745.5266910760342 40.901982808022865 770.6643007510667 128.00805730659022 799.9915120386044 128.00805730659022C 830.2542654337889 128.00805730659022 856.1937683439471 116.64639541547274 886.4565217391316 116.64639541547274" fill="none" fill-opacity="1" stroke="url(#SvgjsLinearGradient1449)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-line" index="2" clip-path="url(#gridRectMask0okdwwjz)" pathTo="M 38.54158790170241 150.73138108882517C 68.80434129688697 150.73138108882517 94.74384420704517 169.66748424068766 125.00659760222973 169.66748424068766C 152.3406974430416 169.66748424068766 175.7699258780232 128.00805730659022 203.10402571883506 128.00805730659022C 233.3261033702089 128.00805730659022 259.2307413571008 150.73138108882517 289.4528190084746 150.73138108882517C 318.7393545522016 150.73138108882517 343.8420993039676 93.92307163323778 373.12863484769457 93.92307163323778C 403.39138824287915 93.92307163323778 429.3308911530373 131.79527793696272 459.5936445482219 131.79527793696272C 488.8801800919489 131.79527793696272 513.9829248437148 21.965879656160382 543.2694603874419 21.965879656160382C 573.5322137826264 21.965879656160382 599.4717166927846 67.41252722063032 629.7344700879692 67.41252722063032C 659.9972234831538 67.41252722063032 685.9367263933119 40.901982808022865 716.1994797884965 40.901982808022865C 745.5266910760342 40.901982808022865 770.6643007510667 128.00805730659022 799.9915120386044 128.00805730659022C 830.2542654337889 128.00805730659022 856.1937683439471 116.64639541547274 886.4565217391316 116.64639541547274" pathFrom="M -1 264.348L -1 264.348L 125.00659760222973 264.348L 203.10402571883506 264.348L 289.4528190084746 264.348L 373.12863484769457 264.348L 459.5936445482219 264.348L 543.2694603874419 264.348L 629.7344700879692 264.348L 716.1994797884965 264.348L 799.9915120386044 264.348L 886.4565217391316 264.348"></path>
                                    <g id="SvgjsG1447" class="apexcharts-series-markers-wrap">
                                        <g class="apexcharts-series-markers">
                                            <circle id="SvgjsCircle1528" r="0" cx="373.12863484769457" cy="0" class="apexcharts-marker wpmtno4e4" stroke="#ffffff" fill="#4ac7ec" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1448" class="apexcharts-datalabels"></g>
                                </g>
                            </g>
                            <line id="SvgjsLine1522" x1="0" y1="0" x2="926.75" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                            <line id="SvgjsLine1523" x1="0" y1="0" x2="926.75" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                            <g id="SvgjsG1524" class="apexcharts-yaxis-annotations"></g>
                            <g id="SvgjsG1525" class="apexcharts-xaxis-annotations"></g>
                            <g id="SvgjsG1526" class="apexcharts-point-annotations"></g>
                            <rect id="SvgjsRect1529" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" class="apexcharts-zoom-rect"></rect>
                            <rect id="SvgjsRect1530" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" class="apexcharts-selection-rect"></rect>
                        </g>
                        <rect id="SvgjsRect1347" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                        <g id="SvgjsG1482" class="apexcharts-yaxis" rel="0" transform="translate(963.5833333333334, 0)">
                            <g id="SvgjsG1483" class="apexcharts-yaxis-texts-g" transform="translate(7.1875, 0)">
                                <text id="SvgjsText1484" font-family="Helvetica, Arial, sans-serif" x="-20" y="42" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">70</text>
                                <text id="SvgjsText1485" font-family="Helvetica, Arial, sans-serif" x="-20" y="68.5348" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">63</text>
                                <text id="SvgjsText1486" font-family="Helvetica, Arial, sans-serif" x="-20" y="95.06960000000001" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">56</text>
                                <text id="SvgjsText1487" font-family="Helvetica, Arial, sans-serif" x="-20" y="121.60440000000001" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">49</text>
                                <text id="SvgjsText1488" font-family="Helvetica, Arial, sans-serif" x="-20" y="148.13920000000002" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">42</text>
                                <text id="SvgjsText1489" font-family="Helvetica, Arial, sans-serif" x="-20" y="174.67400000000004" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">35</text>
                                <text id="SvgjsText1490" font-family="Helvetica, Arial, sans-serif" x="-20" y="201.20880000000005" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">28</text>
                                <text id="SvgjsText1491" font-family="Helvetica, Arial, sans-serif" x="-20" y="227.74360000000007" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">21</text>
                                <text id="SvgjsText1492" font-family="Helvetica, Arial, sans-serif" x="-20" y="254.2784000000001" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">14</text>
                                <text id="SvgjsText1493" font-family="Helvetica, Arial, sans-serif" x="-20" y="280.8132000000001" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">7</text>
                                <text id="SvgjsText1494" font-family="Helvetica, Arial, sans-serif" x="-20" y="307.3480000000001" text-anchor="middle" dominant-baseline="auto" font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">0</text>
                            </g>
                        </g>
                    </svg>
                    <div class="apexcharts-tooltip light" style="left: 384.833px; top: 168.348px;">
                        <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">01 May</div>
                        <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(77, 121, 246);"></span>
                            <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Leads: </span><span class="apexcharts-tooltip-text-value">13%</span></div>
                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                        <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 241, 245);"></span>
                            <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Vendors: </span><span class="apexcharts-tooltip-text-value">22%</span></div>
                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                        <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(74, 199, 236);"></span>
                            <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Invoice Generate: </span><span class="apexcharts-tooltip-text-value">45%</span></div>
                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom light" style="left: 346.142px; top: 306.348px;">
                        <div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 42.6406px;">01 May</div>
                    </div>
                </div>
            </div>
            <div class="resize-triggers">
                <div class="expand-trigger">
                    <div style="width: 1027px; height: 406px;"></div>
                </div>
                <div class="contract-trigger"></div>
            </div>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
                <!--end col-->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0">موقعیت جغرافیایی خریداران شما</h4>
                            <div id="world-map-markers" class="dashboard-map"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mt-3"><span class="text-info">آمریکا</span> <small class="float-right text-muted ml-3 font-14">۸۱٪</small>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-pink" role="progressbar" style="width: 81%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mt-3"><span class="text-info">ایران</span> <small class="float-right text-muted ml-3 font-14">۶۸٪</small>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 68%; border-radius:5px;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-5 ml-auto">
                                    <div class="mt-3"><span class="text-info">استرالیا</span> <small class="float-right text-muted ml-3 font-14">۴۸٪</small>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-purple" role="progressbar" style="width: 48%; border-radius:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mt-3"><span class="text-info">برزیل</span> <small class="float-right text-muted ml-3 font-14">۳۲٪</small>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 32%; border-radius:5px;" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div style="display: none" class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 align-self-center">
                                    <div>
                                        <h4 class="mt-0 header-title">درآمد این ماه</h4>
                                        <h2 class="mt-0 font-weight-bold">$57k</h2>
                                        <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up From Last Month</p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-4 align-self-center">
                                    <div class="icon-info text-right"><i class="dripicons-wallet bg-soft-info"></i></div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                        <div class="card-body overflow-hidden p-0">
                            <div class="d-flex mb-0 h-100 dash-info-box">
                                <div class="w-100">
                                    <div class="apexchart-wrapper">
                                        <div id="eco_dash_2" class="chart-gutters"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-3">New Customers</h4>
                            <div class="row">
                                <div class="col-8">
                                    <div class="align-self-center">
                                        <div id="re_customers" class="apex-charts mb-n4"></div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-4 align-self-center">
                                    <div class="re-customers-detail">
                                        <h3 class="mb-0">21,546</h3>
                                        <p class="text-muted"><i class="mdi mdi-circle text-info mr-1"></i>New Customers</p>
                                    </div>
                                    <div class="re-customers-detail">
                                        <h3 class="mb-0">1535</h3>
                                        <p class="text-muted"><i class="mdi mdi-circle text-light mr-1"></i>Repeated</p>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <!--end col-->
            </div>
            <!--end row-->
            <div style="display: none" class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body order-list">
                            <h4 class="header-title mt-0 mb-3">Order List</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Product</th>
                                        <th class="border-top-0">Pro Name</th>
                                        <th class="border-top-0">Country</th>
                                        <th class="border-top-0">Order Date/Time</th>
                                        <th class="border-top-0">Pcs.</th>
                                        <th class="border-top-0">Amount ($)</th>
                                        <th class="border-top-0">Status</th>
                                    </tr>
                                    <!--end tr-->
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><img class="" src="/dashboard/assets/images/products/img-1.png" alt="user"></td>
                                        <td>Beg</td>
                                        <td><img src="/dashboard/assets/images/flags/us_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                        <td>3/03/2019 4:29 PM</td>
                                        <td>200</td>
                                        <td>$750</td>
                                        <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img class="" src="/dashboard/assets/images/products/img-2.png" alt="user"></td>
                                        <td>Watch</td>
                                        <td><img src="/dashboard/assets/images/flags/french_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                        <td>13/03/2019 1:09 PM</td>
                                        <td>180</td>
                                        <td>$970</td>
                                        <td><span class="badge badge-boxed badge-soft-danger">Delivered</span></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img class="" src="/dashboard/assets/images/products/img-3.png" alt="user"></td>
                                        <td>Headphone</td>
                                        <td><img src="/dashboard/assets/images/flags/spain_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                        <td>22/03/2019 12:09 PM</td>
                                        <td>30</td>
                                        <td>$2800</td>
                                        <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img class="" src="/dashboard/assets/images/products/img-4.png" alt="user"></td>
                                        <td>Purse</td>
                                        <td><img src="/dashboard/assets/images/flags/russia_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                        <td>14/03/2019 8:27 PM</td>
                                        <td>100</td>
                                        <td>$520</td>
                                        <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img class="" src="/dashboard/assets/images/products/img-5.png" alt="user"></td>
                                        <td>Shoe</td>
                                        <td><img src="/dashboard/assets/images/flags/italy_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                        <td>18/03/2019 5:09 PM</td>
                                        <td>100</td>
                                        <td>$1150</td>
                                        <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img class="" src="/dashboard/assets/images/products/img-6.png" alt="user"></td>
                                        <td>Boll</td>
                                        <td><img src="/dashboard/assets/images/flags/us_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                        <td>30/03/2019 4:29 PM</td>
                                        <td>140</td>
                                        <td>$ 650</td>
                                        <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                                    </tr>
                                    <!--end tr-->
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                            <!--end /div-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8 align-self-center">
                        <div class="">
                            <h4 class="mt-0 header-title">درآمد این ماه</h4>
                            <h2 class="mt-0 font-weight-bold">1 میلیون </h2>
                            <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> افزایش نسبت به ماه گذشته</p>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-4 align-self-center">
                        <div class="icon-info text-right"><i class="far fa-money-bill-alt bg-soft-info"></i></div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
            <div class="card-body overflow-hidden p-0">
                <div class="d-flex mb-0 h-100 dash-info-box">
                    <div class="w-100">
                        <div class="apexchart-wrapper" style="position: relative;">
                            <div id="eco_dash_2" class="chart-gutters" style="min-height: 135px;">
                                <div id="apexchartsf1blzh83j" class="apexcharts-canvas apexchartsf1blzh83j light" style="width: 501px; height: 135px;">
                                    <svg id="SvgjsSvg1811" width="501" height="135" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG1813" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                                            <defs id="SvgjsDefs1812">
                                                <clipPath id="gridRectMaskf1blzh83j">
                                                    <rect id="SvgjsRect1816" width="503" height="137" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMaskf1blzh83j">
                                                    <rect id="SvgjsRect1817" width="541" height="175" x="-20" y="-20" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                                </clipPath>
                                            </defs>
                                            <g id="SvgjsG1853" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1854" class="apexcharts-xaxis-texts-g" transform="translate(0, 1.875)"></g>
                                            </g>
                                            <g id="SvgjsG1857" class="apexcharts-grid">
                                                <line id="SvgjsLine1859" x1="0" y1="135" x2="501" y2="135" stroke="transparent" stroke-dasharray="0"></line>
                                                <line id="SvgjsLine1858" x1="0" y1="1" x2="0" y2="135" stroke="transparent" stroke-dasharray="0"></line>
                                            </g>
                                            <g id="SvgjsG1819" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1820" class="apexcharts-series Revenue" rel="1" data:realIndex="0">
                                                    <path id="apexcharts-bar-area-0" d="M 4.848387096774193 135L 4.848387096774193 79.36612903225806Q 7.080645161290322 78.13387096774193 9.312903225806451 79.36612903225806L 9.312903225806451 135L 3.848387096774193 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 4.848387096774193 135L 4.848387096774193 79.36612903225806Q 7.080645161290322 78.13387096774193 9.312903225806451 79.36612903225806L 9.312903225806451 135L 3.848387096774193 135" pathFrom="M 4.848387096774193 135L 4.848387096774193 135L 9.312903225806451 135L 9.312903225806451 135L 3.848387096774193 135" cy="78.75" cx="20.009677419354837" j="0" val="50" barHeight="56.25" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 21.009677419354837 135L 21.009677419354837 68.11612903225806Q 23.241935483870964 66.88387096774193 25.474193548387095 68.11612903225806L 25.474193548387095 135L 20.009677419354837 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 21.009677419354837 135L 21.009677419354837 68.11612903225806Q 23.241935483870964 66.88387096774193 25.474193548387095 68.11612903225806L 25.474193548387095 135L 20.009677419354837 135" pathFrom="M 21.009677419354837 135L 21.009677419354837 135L 25.474193548387095 135L 25.474193548387095 135L 20.009677419354837 135" cy="67.5" cx="36.170967741935485" j="1" val="60" barHeight="67.5" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 37.170967741935485 135L 37.170967741935485 56.866129032258065Q 39.403225806451616 55.633870967741935 41.63548387096774 56.866129032258065L 41.63548387096774 135L 36.170967741935485 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 37.170967741935485 135L 37.170967741935485 56.866129032258065Q 39.403225806451616 55.633870967741935 41.63548387096774 56.866129032258065L 41.63548387096774 135L 36.170967741935485 135" pathFrom="M 37.170967741935485 135L 37.170967741935485 135L 41.63548387096774 135L 41.63548387096774 135L 36.170967741935485 135" cy="56.25" cx="52.332258064516125" j="2" val="70" barHeight="78.75" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 53.332258064516125 135L 53.332258064516125 45.616129032258065Q 55.564516129032256 44.383870967741935 57.79677419354838 45.616129032258065L 57.79677419354838 135L 52.332258064516125 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 53.332258064516125 135L 53.332258064516125 45.616129032258065Q 55.564516129032256 44.383870967741935 57.79677419354838 45.616129032258065L 57.79677419354838 135L 52.332258064516125 135" pathFrom="M 53.332258064516125 135L 53.332258064516125 135L 57.79677419354838 135L 57.79677419354838 135L 52.332258064516125 135" cy="45" cx="68.49354838709677" j="3" val="80" barHeight="90" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 69.49354838709677 135L 69.49354838709677 34.366129032258065Q 71.7258064516129 33.133870967741935 73.95806451612903 34.366129032258065L 73.95806451612903 135L 68.49354838709677 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 69.49354838709677 135L 69.49354838709677 34.366129032258065Q 71.7258064516129 33.133870967741935 73.95806451612903 34.366129032258065L 73.95806451612903 135L 68.49354838709677 135" pathFrom="M 69.49354838709677 135L 69.49354838709677 135L 73.95806451612903 135L 73.95806451612903 135L 68.49354838709677 135" cy="33.75" cx="84.6548387096774" j="4" val="90" barHeight="101.25" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 85.6548387096774 135L 85.6548387096774 23.116129032258065Q 87.88709677419354 21.883870967741938 90.11935483870967 23.116129032258065L 90.11935483870967 135L 84.6548387096774 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 85.6548387096774 135L 85.6548387096774 23.116129032258065Q 87.88709677419354 21.883870967741938 90.11935483870967 23.116129032258065L 90.11935483870967 135L 84.6548387096774 135" pathFrom="M 85.6548387096774 135L 85.6548387096774 135L 90.11935483870967 135L 90.11935483870967 135L 84.6548387096774 135" cy="22.5" cx="100.81612903225805" j="5" val="100" barHeight="112.5" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 101.81612903225805 135L 101.81612903225805 28.741129032258065Q 104.04838709677418 27.508870967741938 106.28064516129031 28.741129032258065L 106.28064516129031 135L 100.81612903225805 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 101.81612903225805 135L 101.81612903225805 28.741129032258065Q 104.04838709677418 27.508870967741938 106.28064516129031 28.741129032258065L 106.28064516129031 135L 100.81612903225805 135" pathFrom="M 101.81612903225805 135L 101.81612903225805 135L 106.28064516129031 135L 106.28064516129031 135L 100.81612903225805 135" cy="28.125" cx="116.97741935483869" j="6" val="95" barHeight="106.875" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 117.97741935483869 135L 117.97741935483869 39.991129032258065Q 120.20967741935482 38.758870967741935 122.44193548387095 39.991129032258065L 122.44193548387095 135L 116.97741935483869 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 117.97741935483869 135L 117.97741935483869 39.991129032258065Q 120.20967741935482 38.758870967741935 122.44193548387095 39.991129032258065L 122.44193548387095 135L 116.97741935483869 135" pathFrom="M 117.97741935483869 135L 117.97741935483869 135L 122.44193548387095 135L 122.44193548387095 135L 116.97741935483869 135" cy="39.375" cx="133.13870967741934" j="7" val="85" barHeight="95.625" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 134.13870967741934 135L 134.13870967741934 51.241129032258065Q 136.37096774193546 50.008870967741935 138.6032258064516 51.241129032258065L 138.6032258064516 135L 133.13870967741934 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 134.13870967741934 135L 134.13870967741934 51.241129032258065Q 136.37096774193546 50.008870967741935 138.6032258064516 51.241129032258065L 138.6032258064516 135L 133.13870967741934 135" pathFrom="M 134.13870967741934 135L 134.13870967741934 135L 138.6032258064516 135L 138.6032258064516 135L 133.13870967741934 135" cy="50.625" cx="149.29999999999998" j="8" val="75" barHeight="84.375" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 150.29999999999998 135L 150.29999999999998 62.491129032258065Q 152.5322580645161 61.258870967741935 154.76451612903224 62.491129032258065L 154.76451612903224 135L 149.29999999999998 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 150.29999999999998 135L 150.29999999999998 62.491129032258065Q 152.5322580645161 61.258870967741935 154.76451612903224 62.491129032258065L 154.76451612903224 135L 149.29999999999998 135" pathFrom="M 150.29999999999998 135L 150.29999999999998 135L 154.76451612903224 135L 154.76451612903224 135L 149.29999999999998 135" cy="61.875" cx="165.46129032258062" j="9" val="65" barHeight="73.125" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 166.46129032258062 135L 166.46129032258062 73.74112903225806Q 168.69354838709674 72.50887096774193 170.92580645161289 73.74112903225806L 170.92580645161289 135L 165.46129032258062 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 166.46129032258062 135L 166.46129032258062 73.74112903225806Q 168.69354838709674 72.50887096774193 170.92580645161289 73.74112903225806L 170.92580645161289 135L 165.46129032258062 135" pathFrom="M 166.46129032258062 135L 166.46129032258062 135L 170.92580645161289 135L 170.92580645161289 135L 165.46129032258062 135" cy="73.125" cx="181.62258064516126" j="10" val="55" barHeight="61.875" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 182.62258064516126 135L 182.62258064516126 62.491129032258065Q 184.85483870967738 61.258870967741935 187.08709677419353 62.491129032258065L 187.08709677419353 135L 181.62258064516126 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 182.62258064516126 135L 182.62258064516126 62.491129032258065Q 184.85483870967738 61.258870967741935 187.08709677419353 62.491129032258065L 187.08709677419353 135L 181.62258064516126 135" pathFrom="M 182.62258064516126 135L 182.62258064516126 135L 187.08709677419353 135L 187.08709677419353 135L 181.62258064516126 135" cy="61.875" cx="197.7838709677419" j="11" val="65" barHeight="73.125" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 198.7838709677419 135L 198.7838709677419 51.241129032258065Q 201.01612903225802 50.008870967741935 203.24838709677417 51.241129032258065L 203.24838709677417 135L 197.7838709677419 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 198.7838709677419 135L 198.7838709677419 51.241129032258065Q 201.01612903225802 50.008870967741935 203.24838709677417 51.241129032258065L 203.24838709677417 135L 197.7838709677419 135" pathFrom="M 198.7838709677419 135L 198.7838709677419 135L 203.24838709677417 135L 203.24838709677417 135L 197.7838709677419 135" cy="50.625" cx="213.94516129032255" j="12" val="75" barHeight="84.375" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 214.94516129032255 135L 214.94516129032255 39.991129032258065Q 217.17741935483866 38.758870967741935 219.4096774193548 39.991129032258065L 219.4096774193548 135L 213.94516129032255 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 214.94516129032255 135L 214.94516129032255 39.991129032258065Q 217.17741935483866 38.758870967741935 219.4096774193548 39.991129032258065L 219.4096774193548 135L 213.94516129032255 135" pathFrom="M 214.94516129032255 135L 214.94516129032255 135L 219.4096774193548 135L 219.4096774193548 135L 213.94516129032255 135" cy="39.375" cx="230.1064516129032" j="13" val="85" barHeight="95.625" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 231.1064516129032 135L 231.1064516129032 28.741129032258065Q 233.3387096774193 27.508870967741938 235.57096774193545 28.741129032258065L 235.57096774193545 135L 230.1064516129032 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 231.1064516129032 135L 231.1064516129032 28.741129032258065Q 233.3387096774193 27.508870967741938 235.57096774193545 28.741129032258065L 235.57096774193545 135L 230.1064516129032 135" pathFrom="M 231.1064516129032 135L 231.1064516129032 135L 235.57096774193545 135L 235.57096774193545 135L 230.1064516129032 135" cy="28.125" cx="246.26774193548383" j="14" val="95" barHeight="106.875" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 247.26774193548383 135L 247.26774193548383 17.491129032258065Q 249.49999999999994 16.258870967741938 251.7322580645161 17.491129032258065L 251.7322580645161 135L 246.26774193548383 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 247.26774193548383 135L 247.26774193548383 17.491129032258065Q 249.49999999999994 16.258870967741938 251.7322580645161 17.491129032258065L 251.7322580645161 135L 246.26774193548383 135" pathFrom="M 247.26774193548383 135L 247.26774193548383 135L 251.7322580645161 135L 251.7322580645161 135L 246.26774193548383 135" cy="16.875" cx="262.42903225806447" j="15" val="105" barHeight="118.125" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 263.42903225806447 135L 263.42903225806447 45.616129032258065Q 265.6612903225806 44.383870967741935 267.8935483870967 45.616129032258065L 267.8935483870967 135L 262.42903225806447 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 263.42903225806447 135L 263.42903225806447 45.616129032258065Q 265.6612903225806 44.383870967741935 267.8935483870967 45.616129032258065L 267.8935483870967 135L 262.42903225806447 135" pathFrom="M 263.42903225806447 135L 263.42903225806447 135L 267.8935483870967 135L 267.8935483870967 135L 262.42903225806447 135" cy="45" cx="278.59032258064514" j="16" val="80" barHeight="90" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 279.59032258064514 135L 279.59032258064514 56.866129032258065Q 281.8225806451613 55.633870967741935 284.05483870967737 56.866129032258065L 284.05483870967737 135L 278.59032258064514 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 279.59032258064514 135L 279.59032258064514 56.866129032258065Q 281.8225806451613 55.633870967741935 284.05483870967737 56.866129032258065L 284.05483870967737 135L 278.59032258064514 135" pathFrom="M 279.59032258064514 135L 279.59032258064514 135L 284.05483870967737 135L 284.05483870967737 135L 278.59032258064514 135" cy="56.25" cx="294.7516129032258" j="17" val="70" barHeight="78.75" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 295.7516129032258 135L 295.7516129032258 68.11612903225806Q 297.98387096774195 66.88387096774193 300.21612903225804 68.11612903225806L 300.21612903225804 135L 294.7516129032258 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 295.7516129032258 135L 295.7516129032258 68.11612903225806Q 297.98387096774195 66.88387096774193 300.21612903225804 68.11612903225806L 300.21612903225804 135L 294.7516129032258 135" pathFrom="M 295.7516129032258 135L 295.7516129032258 135L 300.21612903225804 135L 300.21612903225804 135L 294.7516129032258 135" cy="67.5" cx="310.9129032258065" j="18" val="60" barHeight="67.5" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 311.9129032258065 135L 311.9129032258065 79.36612903225806Q 314.1451612903226 78.13387096774193 316.3774193548387 79.36612903225806L 316.3774193548387 135L 310.9129032258065 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 311.9129032258065 135L 311.9129032258065 79.36612903225806Q 314.1451612903226 78.13387096774193 316.3774193548387 79.36612903225806L 316.3774193548387 135L 310.9129032258065 135" pathFrom="M 311.9129032258065 135L 311.9129032258065 135L 316.3774193548387 135L 316.3774193548387 135L 310.9129032258065 135" cy="78.75" cx="327.07419354838714" j="19" val="50" barHeight="56.25" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 328.07419354838714 135L 328.07419354838714 90.61612903225806Q 330.3064516129033 89.38387096774193 332.5387096774194 90.61612903225806L 332.5387096774194 135L 327.07419354838714 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 328.07419354838714 135L 328.07419354838714 90.61612903225806Q 330.3064516129033 89.38387096774193 332.5387096774194 90.61612903225806L 332.5387096774194 135L 327.07419354838714 135" pathFrom="M 328.07419354838714 135L 328.07419354838714 135L 332.5387096774194 135L 332.5387096774194 135L 327.07419354838714 135" cy="90" cx="343.2354838709678" j="20" val="40" barHeight="45" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 344.2354838709678 135L 344.2354838709678 101.86612903225806Q 346.46774193548396 100.63387096774193 348.70000000000005 101.86612903225806L 348.70000000000005 135L 343.2354838709678 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 344.2354838709678 135L 344.2354838709678 101.86612903225806Q 346.46774193548396 100.63387096774193 348.70000000000005 101.86612903225806L 348.70000000000005 135L 343.2354838709678 135" pathFrom="M 344.2354838709678 135L 344.2354838709678 135L 348.70000000000005 135L 348.70000000000005 135L 343.2354838709678 135" cy="101.25" cx="359.3967741935485" j="21" val="30" barHeight="33.75" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 360.3967741935485 135L 360.3967741935485 84.99112903225806Q 362.6290322580646 83.75887096774193 364.8612903225807 84.99112903225806L 364.8612903225807 135L 359.3967741935485 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 360.3967741935485 135L 360.3967741935485 84.99112903225806Q 362.6290322580646 83.75887096774193 364.8612903225807 84.99112903225806L 364.8612903225807 135L 359.3967741935485 135" pathFrom="M 360.3967741935485 135L 360.3967741935485 135L 364.8612903225807 135L 364.8612903225807 135L 359.3967741935485 135" cy="84.375" cx="375.55806451612915" j="22" val="45" barHeight="50.625" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 376.55806451612915 135L 376.55806451612915 73.74112903225806Q 378.7903225806453 72.50887096774193 381.0225806451614 73.74112903225806L 381.0225806451614 135L 375.55806451612915 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 376.55806451612915 135L 376.55806451612915 73.74112903225806Q 378.7903225806453 72.50887096774193 381.0225806451614 73.74112903225806L 381.0225806451614 135L 375.55806451612915 135" pathFrom="M 376.55806451612915 135L 376.55806451612915 135L 381.0225806451614 135L 381.0225806451614 135L 375.55806451612915 135" cy="73.125" cx="391.7193548387098" j="23" val="55" barHeight="61.875" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 392.7193548387098 135L 392.7193548387098 62.491129032258065Q 394.95161290322596 61.258870967741935 397.18387096774205 62.491129032258065L 397.18387096774205 135L 391.7193548387098 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 392.7193548387098 135L 392.7193548387098 62.491129032258065Q 394.95161290322596 61.258870967741935 397.18387096774205 62.491129032258065L 397.18387096774205 135L 391.7193548387098 135" pathFrom="M 392.7193548387098 135L 392.7193548387098 135L 397.18387096774205 135L 397.18387096774205 135L 391.7193548387098 135" cy="61.875" cx="407.8806451612905" j="24" val="65" barHeight="73.125" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 408.8806451612905 135L 408.8806451612905 51.241129032258065Q 411.11290322580663 50.008870967741935 413.3451612903227 51.241129032258065L 413.3451612903227 135L 407.8806451612905 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 408.8806451612905 135L 408.8806451612905 51.241129032258065Q 411.11290322580663 50.008870967741935 413.3451612903227 51.241129032258065L 413.3451612903227 135L 407.8806451612905 135" pathFrom="M 408.8806451612905 135L 408.8806451612905 135L 413.3451612903227 135L 413.3451612903227 135L 407.8806451612905 135" cy="50.625" cx="424.04193548387116" j="25" val="75" barHeight="84.375" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 425.04193548387116 135L 425.04193548387116 39.991129032258065Q 427.2741935483873 38.758870967741935 429.5064516129034 39.991129032258065L 429.5064516129034 135L 424.04193548387116 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 425.04193548387116 135L 425.04193548387116 39.991129032258065Q 427.2741935483873 38.758870967741935 429.5064516129034 39.991129032258065L 429.5064516129034 135L 424.04193548387116 135" pathFrom="M 425.04193548387116 135L 425.04193548387116 135L 429.5064516129034 135L 429.5064516129034 135L 424.04193548387116 135" cy="39.375" cx="440.2032258064518" j="26" val="85" barHeight="95.625" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 441.2032258064518 135L 441.2032258064518 28.741129032258065Q 443.43548387096797 27.508870967741938 445.66774193548406 28.741129032258065L 445.66774193548406 135L 440.2032258064518 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 441.2032258064518 135L 441.2032258064518 28.741129032258065Q 443.43548387096797 27.508870967741938 445.66774193548406 28.741129032258065L 445.66774193548406 135L 440.2032258064518 135" pathFrom="M 441.2032258064518 135L 441.2032258064518 135L 445.66774193548406 135L 445.66774193548406 135L 440.2032258064518 135" cy="28.125" cx="456.3645161290325" j="27" val="95" barHeight="106.875" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 457.3645161290325 135L 457.3645161290325 23.116129032258065Q 459.59677419354864 21.883870967741938 461.82903225806473 23.116129032258065L 461.82903225806473 135L 456.3645161290325 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 457.3645161290325 135L 457.3645161290325 23.116129032258065Q 459.59677419354864 21.883870967741938 461.82903225806473 23.116129032258065L 461.82903225806473 135L 456.3645161290325 135" pathFrom="M 457.3645161290325 135L 457.3645161290325 135L 461.82903225806473 135L 461.82903225806473 135L 456.3645161290325 135" cy="22.5" cx="472.52580645161316" j="28" val="100" barHeight="112.5" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 473.52580645161316 135L 473.52580645161316 45.616129032258065Q 475.7580645161293 44.383870967741935 477.9903225806454 45.616129032258065L 477.9903225806454 135L 472.52580645161316 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 473.52580645161316 135L 473.52580645161316 45.616129032258065Q 475.7580645161293 44.383870967741935 477.9903225806454 45.616129032258065L 477.9903225806454 135L 472.52580645161316 135" pathFrom="M 473.52580645161316 135L 473.52580645161316 135L 477.9903225806454 135L 477.9903225806454 135L 472.52580645161316 135" cy="45" cx="488.68709677419383" j="29" val="80" barHeight="90" barWidth="6.4645161290322575"></path>
                                                    <path id="apexcharts-bar-area-0" d="M 489.68709677419383 135L 489.68709677419383 68.11612903225806Q 491.91935483871 66.88387096774193 494.15161290322607 68.11612903225806L 494.15161290322607 135L 488.68709677419383 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 489.68709677419383 135L 489.68709677419383 68.11612903225806Q 491.91935483871 66.88387096774193 494.15161290322607 68.11612903225806L 494.15161290322607 135L 488.68709677419383 135" pathFrom="M 489.68709677419383 135L 489.68709677419383 135L 494.15161290322607 135L 494.15161290322607 135L 488.68709677419383 135" cy="67.5" cx="504.8483870967745" j="30" val="60" barHeight="67.5" barWidth="6.4645161290322575"></path>
                                                    <g id="SvgjsG1821" class="apexcharts-datalabels"></g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1860" x1="0" y1="0" x2="501" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1861" x1="0" y1="0" x2="501" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1862" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1863" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1864" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <g id="SvgjsG1855" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)">
                                            <g id="SvgjsG1856" class="apexcharts-yaxis-texts-g"></g>
                                        </g>
                                    </svg>
                                    <div class="apexcharts-legend"></div>
                                    <div class="apexcharts-tooltip light">
                                        <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(74, 199, 236);"></span>
                                            <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 502px; height: 136px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-3">مشتریان جدید</h4>
                <div class="row">
                    <div class="col-8">
                        <div class="align-self-center" style="position: relative;">
                            <div id="re_customers" class="apex-charts mb-n4" style="min-height: 217px;">
                                <div id="apexchartsh48b324l" class="apexcharts-canvas apexchartsh48b324l light" style="width: 294px; height: 217px;">
                                    <svg id="SvgjsSvg1867" width="294" height="217" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG1869" class="apexcharts-inner apexcharts-graphical" transform="translate(68, 0)">
                                            <defs id="SvgjsDefs1868">
                                                <clipPath id="gridRectMaskh48b324l">
                                                    <rect id="SvgjsRect1870" width="162" height="184" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMaskh48b324l">
                                                    <rect id="SvgjsRect1871" width="200" height="222" x="-20" y="-20" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                                </clipPath>
                                            </defs>
                                            <g id="SvgjsG1873" class="apexcharts-pie" data:innerTranslateX="0" data:innerTranslateY="-25">
                                                <g id="SvgjsG1874" transform="translate(0, -5) scale(1)">
                                                    <circle id="SvgjsCircle1875" r="53.807317073170736" cx="80" cy="91" fill="transparent"></circle>
                                                    <g id="SvgjsG1876">
                                                        <g id="apexcharts-series-0" class="apexcharts-series apexcharts-pie-series NewxCustomers" rel="1">
                                                            <path id="apexcharts-donut-slice-0" d="M 80 8.21951219512195 A 82.78048780487805 82.78048780487805 0 1 1 13.029178563205576 139.65714990928424 L 36.468966066083624 122.62714744103477 A 53.807317073170736 53.807317073170736 0 1 0 80 37.192682926829264 L 80 8.21951219512195 z" fill="rgba(77,121,246,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area" index="0" j="0" data:angle="234" data:startAngle="0" data:strokeWidth="2" data:value="65" data:pathOrig="M 80 8.21951219512195 A 82.78048780487805 82.78048780487805 0 1 1 13.029178563205576 139.65714990928424 L 36.468966066083624 122.62714744103477 A 53.807317073170736 53.807317073170736 0 1 0 80 37.192682926829264 L 80 8.21951219512195 z"></path>
                                                        </g>
                                                        <g id="apexcharts-series-1" class="apexcharts-series apexcharts-pie-series Repeated" rel="2">
                                                            <path id="apexcharts-donut-slice-1" d="M 13.029178563205576 139.65714990928424 A 82.78048780487805 82.78048780487805 0 0 1 79.98555207938732 8.21951345594087 L 79.99060885160175 37.19268374636156 A 53.807317073170736 53.807317073170736 0 0 0 36.468966066083624 122.62714744103477 L 13.029178563205576 139.65714990928424 z" fill="rgba(209,230,250,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area" index="0" j="1" data:angle="126" data:startAngle="234" data:strokeWidth="2" data:value="35" data:pathOrig="M 13.029178563205576 139.65714990928424 A 82.78048780487805 82.78048780487805 0 0 1 79.98555207938732 8.21951345594087 L 79.99060885160175 37.19268374636156 A 53.807317073170736 53.807317073170736 0 0 0 36.468966066083624 122.62714744103477 L 13.029178563205576 139.65714990928424 z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1881" x1="0" y1="0" x2="160" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1882" x1="0" y1="0" x2="160" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                        </g>
                                    </svg>
                                    <div class="apexcharts-legend"></div>
                                    <div class="apexcharts-tooltip dark">
                                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(77, 121, 246);"></span>
                                            <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(209, 230, 250);"></span>
                                            <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 295px; height: 218px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-4 align-self-center">
                        <div class="re-customers-detail">
                            <h3 class="mb-0">21,546</h3>
                            <p class="text-muted"><i class="mdi mdi-circle text-info mr-1"></i>اقا</p>
                        </div>
                        <div class="re-customers-detail">
                            <h3 class="mb-0">1535</h3>
                            <p class="text-muted"><i class="mdi mdi-circle text-light mr-1"></i>خانم</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-lg-4">
        <div class="card carousel-bg-img">
            <div class="card-body dash-info-carousel">
                <h4 class="mt-0 header-title">محصولات محبوب</h4>
                <div id="carousel_2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="media"><img src="{{ $bestSelling[0]->image['400,400'] }}" height="200" width="175" class="mr-2" alt="...">
                                <div class="media-body align-self-center"><span class="badge badge-primary mb-2 byekan w-25 f-10">{{ $bestSelling[0]->buyCount }} فروش</span>
                                    <h4 class="mt-0">{{ $bestSelling[0]->title }}</h4>
                                    <p class="text-muted mb-0">{{ number_format($bestSelling[0]->price) }} تومان</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="media"><img src="{{ $bestSelling[1]->image['400,400'] }}"  height="200" width="175" class="mr-2" alt="...">
                                <div class="media-body align-self-center"><span class="badge badge-primary mb-2 byekan w-25 f-10">{{ $bestSelling[1]->buyCount }} فروش</span>
                                    <h4 class="mt-0">{{ $bestSelling[1]->title }}</h4>
                                    <p class="text-muted mb-0">{{ number_format($bestSelling[1]->price)  }} تومان</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="media"><img src="{{ $bestSelling[2]->image['400,400'] }}"  height="200" width="175" class="mr-2" alt="...">
                                <div class="media-body align-self-center"><span class="badge badge-primary mb-2 byekan w-25 f-10">{{ $bestSelling[2]->buyCount }} فروش</span>
                                    <h4 class="mt-0">{{ $bestSelling[2]->title }}</h4>
                                    <p class="text-muted mb-0">{{ number_format($bestSelling[2]->price) }} تومان</p>
                                </div>
                            </div>
                        </div>
                    </div><a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a><a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span></a></div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body order-list">
                <h4 class="header-title mt-0 mb-3">لیست سفارشات</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-light">
                            <tr class="byekan">
                                <th class="border-top-0">محصول</th>
                                <th class="border-top-0">نام</th>
                                <th class="border-top-0">زمان سفارش</th>
                                <th class="border-top-0">مبلغ (تومان)</th>
                                <th class="border-top-0">وضعیت</th>
                            </tr>
                            <!--end tr-->
                        </thead>
                        <tbody>
                            @foreach($purchases as $purchase)
                            <tr class="byekan">
                                <td><img class="product-img" src="{{ $purchase->product()->first()->image['80,80']}}" alt="user"></td>
                                <td>{{ $purchase->product()->first()->title}}</td>
                                <td>{{ jdate($purchase->created_at) }}</td>
                                <td>{{ number_format($purchase->product()->first()->price) }}تومان</td>
                                <td><span class="badge badge-boxed badge-soft-success">@if($purchase->status == 0 ) تایید شده @endif</span></td>
                            </tr>
                            @endforeach
                            <!--end tr-->
                        </tbody>
                    </table>
                    <!--end table-->
                </div>
                <!--end /div-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
@endsection


@section('pageScripts')
@stop
