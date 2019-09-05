@extends('dashboard.layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">داشبورد گزارشات کلی</a></li>
                        <li class="breadcrumb-item active">داشبورد پین پی</li>
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
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کاربران شما</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۱۲۴ </h3><i
                            class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                                class="mdi mdi-trending-up"></i>۱۰.۵٪</span> افزایش نسبت به دیروز</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد فروش های فروشگاه</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲۲۳</h3><i
                            class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                                class="mdi mdi-trending-up"></i>۱.۵٪</span> افزایش نسبت به دیروز</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">امتیاز شما در باشگاه</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۴۰۰۰ امتیاز </h3><i
                            class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i
                                class="mdi mdi-trending-down"></i>۱۰.۵٪</span> کاهش نسبت به دیروز</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">موجودی حساب</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲۳۱ میلیون</h3><i
                            class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                                class="mdi mdi-trending-up"></i>۱۰.۵٪</span> افزایش نسبت به دیروز</p>
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
                        <div id="apexchartsgs1n38t6g" class="apexcharts-canvas apexchartsgs1n38t6g light zoomable"
                             style="width: 986px; height: 365px;">
                            <svg id="SvgjsSvg1470" width="986" height="365" xmlns="http://www.w3.org/2000/svg"
                                 version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg hovering-zoom"
                                 xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="0" width="986" height="365">
                                    <div class="apexcharts-legend center position-bottom"
                                         xmlns="http://www.w3.org/1999/xhtml"
                                         style="right: 0px; position: absolute; left: 20px; top: auto; bottom: 0px;">
                                        <div class="apexcharts-legend-series" rel="1" data:collapsed="false"
                                             style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="1"
                                                                            data:collapsed="false"
                                                                            style="background: rgb(77, 121, 246); color: rgb(77, 121, 246); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                class="apexcharts-legend-text" rel="1" data:collapsed="false"
                                                style="color: rgb(77, 121, 246); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">امتیازات</span>
                                        </div>
                                        <div class="apexcharts-legend-series" rel="2" data:collapsed="false"
                                             style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="2"
                                                                            data:collapsed="false"
                                                                            style="background: rgb(238, 241, 245); color: rgb(238, 241, 245); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                class="apexcharts-legend-text" rel="2" data:collapsed="false"
                                                style="color: rgb(238, 241, 245); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">تعداد فروش ها</span>
                                        </div>
                                        <div class="apexcharts-legend-series" rel="3" data:collapsed="false"
                                             style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="3"
                                                                            data:collapsed="false"
                                                                            style="background: rgb(74, 199, 236); color: rgb(74, 199, 236); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                class="apexcharts-legend-text" rel="3" data:collapsed="false"
                                                style="color: rgb(74, 199, 236); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">تعداد کاربران</span>
                                        </div>
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
                                <g id="SvgjsG1472" class="apexcharts-inner apexcharts-graphical"
                                   transform="translate(5.833333333333332, 40)">
                                    <defs id="SvgjsDefs1471">
                                        <clipPath id="gridRectMaskgs1n38t6g">
                                            <rect id="SvgjsRect1490" width="931.75" height="269.348" x="-2.5" y="-2.5"
                                                  rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0"
                                                  stroke="none" stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaskgs1n38t6g">
                                            <rect id="SvgjsRect1491" width="966.75" height="304.348" x="-20" y="-20"
                                                  rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0"
                                                  stroke="none" stroke-dasharray="0"></rect>
                                        </clipPath>
                                        <linearGradient id="SvgjsLinearGradient1497" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1498" stop-opacity="1" stop-color="rgba(242,245,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1499" stop-opacity="1" stop-color="rgba(238,241,245,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1500" stop-opacity="1" stop-color="rgba(238,241,245,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1501" stop-opacity="1" stop-color="rgba(242,245,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1507" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1508" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1509" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1510" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1511" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1513" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1514" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1515" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1516" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1517" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1519" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1520" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1521" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1522" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1523" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1525" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1526" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1527" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1528" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1529" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1531" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1532" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1533" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1534" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1535" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1537" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1538" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1539" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1540" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1541" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1543" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1544" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1545" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1546" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1547" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1549" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1550" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1551" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1552" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1553" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1555" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1556" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1557" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1558" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1559" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1561" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1562" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1563" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1564" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1565" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1567" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1568" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1569" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1570" stop-opacity="1" stop-color="rgba(77,121,246,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1571" stop-opacity="1" stop-color="rgba(122,155,248,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient1577" x1="0" y1="1" x2="1" y2="1">
                                            <stop id="SvgjsStop1578" stop-opacity="1" stop-color="rgba(119,213,241,1)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1579" stop-opacity="1" stop-color="rgba(74,199,236,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1580" stop-opacity="1" stop-color="rgba(74,199,236,1)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1581" stop-opacity="1" stop-color="rgba(119,213,241,1)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <line id="SvgjsLine1476" x1="38.04158790170241" y1="0" x2="38.04158790170241"
                                          y2="264.348" stroke="#b6b6b6" stroke-dasharray="3"
                                          class="apexcharts-xcrosshairs" x="38.04158790170241" y="0" width="1"
                                          height="264.348" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                          stroke-width="1"></line>
                                    <g id="SvgjsG1583" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1584" class="apexcharts-xaxis-texts-g"
                                           transform="translate(0, -4)">
                                            <text id="SvgjsText1585" font-family="Helvetica, Arial, sans-serif"
                                                  x="39.048714058302664" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1586"
                                                       style="font-family: Helvetica, Arial, sans-serif;">2003
                                                </tspan>
                                                <title>2003</title>
                                            </text>
                                            <text id="SvgjsText1587" font-family="Helvetica, Arial, sans-serif"
                                                  x="125.51372375882998" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1588"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Feb '03
                                                </tspan>
                                                <title>Feb '03</title>
                                            </text>
                                            <text id="SvgjsText1589" font-family="Helvetica, Arial, sans-serif"
                                                  x="203.61115187543533" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1590"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Mar '03
                                                </tspan>
                                                <title>Mar '03</title>
                                            </text>
                                            <text id="SvgjsText1591" font-family="Helvetica, Arial, sans-serif"
                                                  x="290.07616157596266" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1592"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Apr '03
                                                </tspan>
                                                <title>Apr '03</title>
                                            </text>
                                            <text id="SvgjsText1593" font-family="Helvetica, Arial, sans-serif"
                                                  x="373.75197741518264" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1594"
                                                       style="font-family: Helvetica, Arial, sans-serif;">May '03
                                                </tspan>
                                                <title>May '03</title>
                                            </text>
                                            <text id="SvgjsText1595" font-family="Helvetica, Arial, sans-serif"
                                                  x="460.21698711570997" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1596"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Jun '03
                                                </tspan>
                                                <title>Jun '03</title>
                                            </text>
                                            <text id="SvgjsText1597" font-family="Helvetica, Arial, sans-serif"
                                                  x="543.89280295493" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1598"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Jul '03
                                                </tspan>
                                                <title>Jul '03</title>
                                            </text>
                                            <text id="SvgjsText1599" font-family="Helvetica, Arial, sans-serif"
                                                  x="630.3578126554572" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1600"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Aug '03
                                                </tspan>
                                                <title>Aug '03</title>
                                            </text>
                                            <text id="SvgjsText1601" font-family="Helvetica, Arial, sans-serif"
                                                  x="716.8228223559845" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1602"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Sep '03
                                                </tspan>
                                                <title>Sep '03</title>
                                            </text>
                                            <text id="SvgjsText1603" font-family="Helvetica, Arial, sans-serif"
                                                  x="800.4986381952045" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1604"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Oct '03
                                                </tspan>
                                                <title>Oct '03</title>
                                            </text>
                                            <text id="SvgjsText1605" font-family="Helvetica, Arial, sans-serif"
                                                  x="886.9636478957318" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1606"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Nov '03
                                                </tspan>
                                                <title>Nov '03</title>
                                            </text>
                                            <text id="SvgjsText1607" font-family="Helvetica, Arial, sans-serif"
                                                  x="970.6394637349518" y="293.348" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                  class="apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1608"
                                                       style="font-family: Helvetica, Arial, sans-serif;">Dec '03
                                                </tspan>
                                                <title>Dec '03</title>
                                            </text>
                                        </g>
                                        <line id="SvgjsLine1609" x1="0" y1="265.348" x2="926.75" y2="265.348"
                                              stroke="#bec7e0" stroke-dasharray="0" stroke-width="1"></line>
                                    </g>
                                    <g id="SvgjsG1623" class="apexcharts-grid">
                                        <g id="SvgjsG1624" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1637" x1="0" y1="0" x2="926.75" y2="0" stroke="#e0e0e0"
                                                  stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1638" x1="0" y1="26.434800000000003" x2="926.75"
                                                  y2="26.434800000000003" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1639" x1="0" y1="52.869600000000005" x2="926.75"
                                                  y2="52.869600000000005" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1640" x1="0" y1="79.30440000000002" x2="926.75"
                                                  y2="79.30440000000002" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1641" x1="0" y1="105.73920000000001" x2="926.75"
                                                  y2="105.73920000000001" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1642" x1="0" y1="132.174" x2="926.75" y2="132.174"
                                                  stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1643" x1="0" y1="158.6088" x2="926.75" y2="158.6088"
                                                  stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1644" x1="0" y1="185.0436" x2="926.75" y2="185.0436"
                                                  stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1645" x1="0" y1="211.4784" x2="926.75" y2="211.4784"
                                                  stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1646" x1="0" y1="237.9132" x2="926.75" y2="237.9132"
                                                  stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1647" x1="0" y1="264.348" x2="926.75" y2="264.348"
                                                  stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1625" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1626" x1="39.048714058302664" y1="265.348"
                                              x2="39.048714058302664" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1627" x1="125.51372375882998" y1="265.348"
                                              x2="125.51372375882998" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1628" x1="203.61115187543533" y1="265.348"
                                              x2="203.61115187543533" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1629" x1="290.07616157596266" y1="265.348"
                                              x2="290.07616157596266" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1630" x1="373.75197741518264" y1="265.348"
                                              x2="373.75197741518264" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1631" x1="460.21698711570997" y1="265.348"
                                              x2="460.21698711570997" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1632" x1="543.89280295493" y1="265.348" x2="543.89280295493"
                                              y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1633" x1="630.3578126554572" y1="265.348"
                                              x2="630.3578126554572" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1634" x1="716.8228223559845" y1="265.348"
                                              x2="716.8228223559845" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1635" x1="800.4986381952045" y1="265.348"
                                              x2="800.4986381952045" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1636" x1="886.9636478957318" y1="265.348"
                                              x2="886.9636478957318" y2="271.348" stroke="#bec7e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1649" x1="0" y1="264.348" x2="926.75" y2="264.348"
                                              stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine1648" x1="0" y1="1" x2="0" y2="264.348" stroke="transparent"
                                              stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG1493" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1494" class="apexcharts-series Vendors" data:longestSeries="true"
                                           rel="1" data:realIndex="1">
                                            <path id="apexcharts-area-0"
                                                  d="M 38.54158790170241 264.348L 38.54158790170241 97.71029226361028C 68.80434129688697 97.71029226361028 94.74384420704517 56.050865329512845 125.00659760222973 56.050865329512845C 152.3406974430416 56.050865329512845 175.7699258780232 109.07195415472776 203.10402571883506 109.07195415472776C 233.3261033702089 109.07195415472776 259.2307413571008 10.604217765042904 289.4528190084746 10.604217765042904C 318.7393545522016 10.604217765042904 343.8420993039676 181.02914613180513 373.12863484769457 181.02914613180513C 403.39138824287915 181.02914613180513 429.3308911530373 101.49751289398276 459.5936445482219 101.49751289398276C 488.8801800919489 101.49751289398276 513.9829248437148 184.81636676217764 543.2694603874419 184.81636676217764C 573.5322137826264 184.81636676217764 599.4717166927846 109.07195415472776 629.7344700879692 109.07195415472776C 659.9972234831538 109.07195415472776 685.9367263933119 52.26364469914034 716.1994797884965 52.26364469914034C 745.5266910760342 52.26364469914034 770.6643007510667 162.09304297994268 799.9915120386044 162.09304297994268C 830.2542654337889 162.09304297994268 856.1937683439471 101.49751289398276 886.4565217391316 101.49751289398276C 886.4565217391316 101.49751289398276 886.4565217391316 101.49751289398276 886.4565217391316 264.348M 886.4565217391316 101.49751289398276z"
                                                  fill="url(#SvgjsLinearGradient1497)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-area" index="1"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 38.54158790170241 264.348L 38.54158790170241 97.71029226361028C 68.80434129688697 97.71029226361028 94.74384420704517 56.050865329512845 125.00659760222973 56.050865329512845C 152.3406974430416 56.050865329512845 175.7699258780232 109.07195415472776 203.10402571883506 109.07195415472776C 233.3261033702089 109.07195415472776 259.2307413571008 10.604217765042904 289.4528190084746 10.604217765042904C 318.7393545522016 10.604217765042904 343.8420993039676 181.02914613180513 373.12863484769457 181.02914613180513C 403.39138824287915 181.02914613180513 429.3308911530373 101.49751289398276 459.5936445482219 101.49751289398276C 488.8801800919489 101.49751289398276 513.9829248437148 184.81636676217764 543.2694603874419 184.81636676217764C 573.5322137826264 184.81636676217764 599.4717166927846 109.07195415472776 629.7344700879692 109.07195415472776C 659.9972234831538 109.07195415472776 685.9367263933119 52.26364469914034 716.1994797884965 52.26364469914034C 745.5266910760342 52.26364469914034 770.6643007510667 162.09304297994268 799.9915120386044 162.09304297994268C 830.2542654337889 162.09304297994268 856.1937683439471 101.49751289398276 886.4565217391316 101.49751289398276C 886.4565217391316 101.49751289398276 886.4565217391316 101.49751289398276 886.4565217391316 264.348M 886.4565217391316 101.49751289398276z"
                                                  pathFrom="M -1 264.348L -1 264.348L 125.00659760222973 264.348L 203.10402571883506 264.348L 289.4528190084746 264.348L 373.12863484769457 264.348L 459.5936445482219 264.348L 543.2694603874419 264.348L 629.7344700879692 264.348L 716.1994797884965 264.348L 799.9915120386044 264.348L 886.4565217391316 264.348"></path>
                                            <path id="apexcharts-area-0"
                                                  d="M 38.54158790170241 97.71029226361028C 68.80434129688697 97.71029226361028 94.74384420704517 56.050865329512845 125.00659760222973 56.050865329512845C 152.3406974430416 56.050865329512845 175.7699258780232 109.07195415472776 203.10402571883506 109.07195415472776C 233.3261033702089 109.07195415472776 259.2307413571008 10.604217765042904 289.4528190084746 10.604217765042904C 318.7393545522016 10.604217765042904 343.8420993039676 181.02914613180513 373.12863484769457 181.02914613180513C 403.39138824287915 181.02914613180513 429.3308911530373 101.49751289398276 459.5936445482219 101.49751289398276C 488.8801800919489 101.49751289398276 513.9829248437148 184.81636676217764 543.2694603874419 184.81636676217764C 573.5322137826264 184.81636676217764 599.4717166927846 109.07195415472776 629.7344700879692 109.07195415472776C 659.9972234831538 109.07195415472776 685.9367263933119 52.26364469914034 716.1994797884965 52.26364469914034C 745.5266910760342 52.26364469914034 770.6643007510667 162.09304297994268 799.9915120386044 162.09304297994268C 830.2542654337889 162.09304297994268 856.1937683439471 101.49751289398276 886.4565217391316 101.49751289398276"
                                                  fill="none" fill-opacity="1" stroke="#eef1f5" stroke-opacity="1"
                                                  stroke-linecap="butt" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-area" index="1"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 38.54158790170241 97.71029226361028C 68.80434129688697 97.71029226361028 94.74384420704517 56.050865329512845 125.00659760222973 56.050865329512845C 152.3406974430416 56.050865329512845 175.7699258780232 109.07195415472776 203.10402571883506 109.07195415472776C 233.3261033702089 109.07195415472776 259.2307413571008 10.604217765042904 289.4528190084746 10.604217765042904C 318.7393545522016 10.604217765042904 343.8420993039676 181.02914613180513 373.12863484769457 181.02914613180513C 403.39138824287915 181.02914613180513 429.3308911530373 101.49751289398276 459.5936445482219 101.49751289398276C 488.8801800919489 101.49751289398276 513.9829248437148 184.81636676217764 543.2694603874419 184.81636676217764C 573.5322137826264 184.81636676217764 599.4717166927846 109.07195415472776 629.7344700879692 109.07195415472776C 659.9972234831538 109.07195415472776 685.9367263933119 52.26364469914034 716.1994797884965 52.26364469914034C 745.5266910760342 52.26364469914034 770.6643007510667 162.09304297994268 799.9915120386044 162.09304297994268C 830.2542654337889 162.09304297994268 856.1937683439471 101.49751289398276 886.4565217391316 101.49751289398276"
                                                  pathFrom="M -1 264.348L -1 264.348L 125.00659760222973 264.348L 203.10402571883506 264.348L 289.4528190084746 264.348L 373.12863484769457 264.348L 459.5936445482219 264.348L 543.2694603874419 264.348L 629.7344700879692 264.348L 716.1994797884965 264.348L 799.9915120386044 264.348L 886.4565217391316 264.348"></path>
                                            <g id="SvgjsG1495" class="apexcharts-series-markers-wrap">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1655" r="0" cx="0" cy="0"
                                                            class="apexcharts-marker wjrvxtxeh" stroke="#ffffff"
                                                            fill="#eef1f5" fill-opacity="1" stroke-width="2"
                                                            stroke-opacity="0.9" default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1496" class="apexcharts-datalabels"></g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1504" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG1505" class="apexcharts-series Leads" rel="1" data:realIndex="0">
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 30.731845090041872 264.348L 30.731845090041872 181.14679690726294Q 38.54158790170241 173.3370540956024 46.35133071336294 181.14679690726294L 46.35133071336294 264.348L 30.731845090041872 264.348"
                                                  fill="url(#SvgjsLinearGradient1507)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 30.731845090041872 264.348L 30.731845090041872 181.14679690726294Q 38.54158790170241 173.3370540956024 46.35133071336294 181.14679690726294L 46.35133071336294 264.348L 30.731845090041872 264.348"
                                                  pathFrom="M 30.731845090041872 264.348L 30.731845090041872 264.348L 46.35133071336294 264.348L 46.35133071336294 264.348L 30.731845090041872 264.348"
                                                  cy="177.24192550143266" cx="46.35133071336294" j="0" val="23"
                                                  barHeight="87.10607449856737" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 117.1968547905692 264.348L 117.1968547905692 226.59344447173285Q 125.00659760222973 218.78370166007232 132.81634041389026 226.59344447173285L 132.81634041389026 264.348L 117.1968547905692 264.348"
                                                  fill="url(#SvgjsLinearGradient1513)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 117.1968547905692 264.348L 117.1968547905692 226.59344447173285Q 125.00659760222973 218.78370166007232 132.81634041389026 226.59344447173285L 132.81634041389026 264.348L 117.1968547905692 264.348"
                                                  pathFrom="M 117.1968547905692 264.348L 117.1968547905692 264.348L 132.81634041389026 264.348L 132.81634041389026 264.348L 117.1968547905692 264.348"
                                                  cy="222.68857306590257" cx="132.81634041389026" j="1" val="11"
                                                  barHeight="41.65942693409743" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 195.29428290717453 264.348L 195.29428290717453 184.9340175376354Q 203.10402571883506 177.12427472597489 210.9137685304956 184.9340175376354L 210.9137685304956 264.348L 195.29428290717453 264.348"
                                                  fill="url(#SvgjsLinearGradient1519)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 195.29428290717453 264.348L 195.29428290717453 184.9340175376354Q 203.10402571883506 177.12427472597489 210.9137685304956 184.9340175376354L 210.9137685304956 264.348L 195.29428290717453 264.348"
                                                  pathFrom="M 195.29428290717453 264.348L 195.29428290717453 264.348L 210.9137685304956 264.348L 210.9137685304956 264.348L 195.29428290717453 264.348"
                                                  cy="181.02914613180513" cx="210.9137685304956" j="2" val="22"
                                                  barHeight="83.31885386819486" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 281.64307619681404 264.348L 281.64307619681404 165.99791438577296Q 289.4528190084746 158.18817157411243 297.2625618201351 165.99791438577296L 297.2625618201351 264.348L 281.64307619681404 264.348"
                                                  fill="url(#SvgjsLinearGradient1525)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 281.64307619681404 264.348L 281.64307619681404 165.99791438577296Q 289.4528190084746 158.18817157411243 297.2625618201351 165.99791438577296L 297.2625618201351 264.348L 281.64307619681404 264.348"
                                                  pathFrom="M 281.64307619681404 264.348L 281.64307619681404 264.348L 297.2625618201351 264.348L 297.2625618201351 264.348L 281.64307619681404 264.348"
                                                  cy="162.09304297994268" cx="297.2625618201351" j="3" val="27"
                                                  barHeight="102.25495702005733" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 365.318892036034 264.348L 365.318892036034 219.01900321098788Q 373.12863484769457 211.20926039932735 380.93837765935507 219.01900321098788L 380.93837765935507 264.348L 365.318892036034 264.348"
                                                  fill="url(#SvgjsLinearGradient1531)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 365.318892036034 264.348L 365.318892036034 219.01900321098788Q 373.12863484769457 211.20926039932735 380.93837765935507 219.01900321098788L 380.93837765935507 264.348L 365.318892036034 264.348"
                                                  pathFrom="M 365.318892036034 264.348L 365.318892036034 264.348L 380.93837765935507 264.348L 380.93837765935507 264.348L 365.318892036034 264.348"
                                                  cy="215.1141318051576" cx="380.93837765935507" j="4" val="13"
                                                  barHeight="49.23386819484242" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 451.78390173656135 264.348L 451.78390173656135 184.9340175376354Q 459.5936445482219 177.12427472597489 467.4033873598824 184.9340175376354L 467.4033873598824 264.348L 451.78390173656135 264.348"
                                                  fill="url(#SvgjsLinearGradient1537)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 451.78390173656135 264.348L 451.78390173656135 184.9340175376354Q 459.5936445482219 177.12427472597489 467.4033873598824 184.9340175376354L 467.4033873598824 264.348L 451.78390173656135 264.348"
                                                  pathFrom="M 451.78390173656135 264.348L 451.78390173656135 264.348L 467.4033873598824 264.348L 467.4033873598824 264.348L 451.78390173656135 264.348"
                                                  cy="181.02914613180513" cx="467.4033873598824" j="5" val="22"
                                                  barHeight="83.31885386819486" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 535.4597175757814 264.348L 535.4597175757814 128.12570808204802Q 543.2694603874419 120.3159652703875 551.0792031991025 128.12570808204802L 551.0792031991025 264.348L 535.4597175757814 264.348"
                                                  fill="url(#SvgjsLinearGradient1543)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 535.4597175757814 264.348L 535.4597175757814 128.12570808204802Q 543.2694603874419 120.3159652703875 551.0792031991025 128.12570808204802L 551.0792031991025 264.348L 535.4597175757814 264.348"
                                                  pathFrom="M 535.4597175757814 264.348L 535.4597175757814 264.348L 551.0792031991025 264.348L 551.0792031991025 264.348L 535.4597175757814 264.348"
                                                  cy="124.22083667621774" cx="551.0792031991025" j="6" val="37"
                                                  barHeight="140.12716332378227" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 621.9247272763087 264.348L 621.9247272763087 188.72123816800791Q 629.7344700879692 180.9114953563474 637.5442128996298 188.72123816800791L 637.5442128996298 264.348L 621.9247272763087 264.348"
                                                  fill="url(#SvgjsLinearGradient1549)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 621.9247272763087 264.348L 621.9247272763087 188.72123816800791Q 629.7344700879692 180.9114953563474 637.5442128996298 188.72123816800791L 637.5442128996298 264.348L 621.9247272763087 264.348"
                                                  pathFrom="M 621.9247272763087 264.348L 621.9247272763087 264.348L 637.5442128996298 264.348L 637.5442128996298 264.348L 621.9247272763087 264.348"
                                                  cy="184.81636676217764" cx="637.5442128996298" j="7" val="21"
                                                  barHeight="79.53163323782238" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 708.389736976836 264.348L 708.389736976836 101.61516366944055Q 716.1994797884965 93.80542085778002 724.0092226001572 101.61516366944055L 724.0092226001572 264.348L 708.389736976836 264.348"
                                                  fill="url(#SvgjsLinearGradient1555)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 708.389736976836 264.348L 708.389736976836 101.61516366944055Q 716.1994797884965 93.80542085778002 724.0092226001572 101.61516366944055L 724.0092226001572 264.348L 708.389736976836 264.348"
                                                  pathFrom="M 708.389736976836 264.348L 708.389736976836 264.348L 724.0092226001572 264.348L 724.0092226001572 264.348L 708.389736976836 264.348"
                                                  cy="97.71029226361028" cx="724.0092226001572" j="8" val="44"
                                                  barHeight="166.63770773638973" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 792.1817692269439 264.348L 792.1817692269439 184.9340175376354Q 799.9915120386044 177.12427472597489 807.801254850265 184.9340175376354L 807.801254850265 264.348L 792.1817692269439 264.348"
                                                  fill="url(#SvgjsLinearGradient1561)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 792.1817692269439 264.348L 792.1817692269439 184.9340175376354Q 799.9915120386044 177.12427472597489 807.801254850265 184.9340175376354L 807.801254850265 264.348L 792.1817692269439 264.348"
                                                  pathFrom="M 792.1817692269439 264.348L 792.1817692269439 264.348L 807.801254850265 264.348L 807.801254850265 264.348L 792.1817692269439 264.348"
                                                  cy="181.02914613180513" cx="807.801254850265" j="9" val="22"
                                                  barHeight="83.31885386819486" barWidth="15.619485623321065"></path>
                                            <path id="apexcharts-bar-area-0"
                                                  d="M 878.6467789274711 264.348L 878.6467789274711 154.63625249465545Q 886.4565217391316 146.82650968299492 894.2662645507922 154.63625249465545L 894.2662645507922 264.348L 878.6467789274711 264.348"
                                                  fill="url(#SvgjsLinearGradient1567)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 878.6467789274711 264.348L 878.6467789274711 154.63625249465545Q 886.4565217391316 146.82650968299492 894.2662645507922 154.63625249465545L 894.2662645507922 264.348L 878.6467789274711 264.348"
                                                  pathFrom="M 878.6467789274711 264.348L 878.6467789274711 264.348L 894.2662645507922 264.348L 894.2662645507922 264.348L 878.6467789274711 264.348"
                                                  cy="150.73138108882517" cx="894.2662645507922" j="10" val="30"
                                                  barHeight="113.61661891117483" barWidth="15.619485623321065"></path>
                                            <g id="SvgjsG1506" class="apexcharts-datalabels"></g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1573" class="apexcharts-line-series apexcharts-plot-series">
                                        <g id="SvgjsG1574" class="apexcharts-series InvoicexGenerate"
                                           data:longestSeries="true" rel="1" data:realIndex="2">
                                            <path id="apexcharts-line-0"
                                                  d="M 38.54158790170241 150.73138108882517C 68.80434129688697 150.73138108882517 94.74384420704517 169.66748424068766 125.00659760222973 169.66748424068766C 152.3406974430416 169.66748424068766 175.7699258780232 128.00805730659022 203.10402571883506 128.00805730659022C 233.3261033702089 128.00805730659022 259.2307413571008 150.73138108882517 289.4528190084746 150.73138108882517C 318.7393545522016 150.73138108882517 343.8420993039676 93.92307163323778 373.12863484769457 93.92307163323778C 403.39138824287915 93.92307163323778 429.3308911530373 131.79527793696272 459.5936445482219 131.79527793696272C 488.8801800919489 131.79527793696272 513.9829248437148 21.965879656160382 543.2694603874419 21.965879656160382C 573.5322137826264 21.965879656160382 599.4717166927846 67.41252722063032 629.7344700879692 67.41252722063032C 659.9972234831538 67.41252722063032 685.9367263933119 40.901982808022865 716.1994797884965 40.901982808022865C 745.5266910760342 40.901982808022865 770.6643007510667 128.00805730659022 799.9915120386044 128.00805730659022C 830.2542654337889 128.00805730659022 856.1937683439471 116.64639541547274 886.4565217391316 116.64639541547274"
                                                  fill="none" fill-opacity="1" stroke="url(#SvgjsLinearGradient1577)"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                  stroke-dasharray="0" class="apexcharts-line" index="2"
                                                  clip-path="url(#gridRectMaskgs1n38t6g)"
                                                  pathTo="M 38.54158790170241 150.73138108882517C 68.80434129688697 150.73138108882517 94.74384420704517 169.66748424068766 125.00659760222973 169.66748424068766C 152.3406974430416 169.66748424068766 175.7699258780232 128.00805730659022 203.10402571883506 128.00805730659022C 233.3261033702089 128.00805730659022 259.2307413571008 150.73138108882517 289.4528190084746 150.73138108882517C 318.7393545522016 150.73138108882517 343.8420993039676 93.92307163323778 373.12863484769457 93.92307163323778C 403.39138824287915 93.92307163323778 429.3308911530373 131.79527793696272 459.5936445482219 131.79527793696272C 488.8801800919489 131.79527793696272 513.9829248437148 21.965879656160382 543.2694603874419 21.965879656160382C 573.5322137826264 21.965879656160382 599.4717166927846 67.41252722063032 629.7344700879692 67.41252722063032C 659.9972234831538 67.41252722063032 685.9367263933119 40.901982808022865 716.1994797884965 40.901982808022865C 745.5266910760342 40.901982808022865 770.6643007510667 128.00805730659022 799.9915120386044 128.00805730659022C 830.2542654337889 128.00805730659022 856.1937683439471 116.64639541547274 886.4565217391316 116.64639541547274"
                                                  pathFrom="M -1 264.348L -1 264.348L 125.00659760222973 264.348L 203.10402571883506 264.348L 289.4528190084746 264.348L 373.12863484769457 264.348L 459.5936445482219 264.348L 543.2694603874419 264.348L 629.7344700879692 264.348L 716.1994797884965 264.348L 799.9915120386044 264.348L 886.4565217391316 264.348"></path>
                                            <g id="SvgjsG1575" class="apexcharts-series-markers-wrap">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1656" r="0" cx="38.54158790170241" cy="0"
                                                            class="apexcharts-marker wg3mu61u3" stroke="#ffffff"
                                                            fill="#4ac7ec" fill-opacity="1" stroke-width="2"
                                                            stroke-opacity="0.9" default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1576" class="apexcharts-datalabels"></g>
                                        </g>
                                    </g>
                                    <line id="SvgjsLine1650" x1="0" y1="0" x2="926.75" y2="0" stroke="#b6b6b6"
                                          stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1651" x1="0" y1="0" x2="926.75" y2="0" stroke-dasharray="0"
                                          stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1652" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1653" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1654" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1657" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                          fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                          class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1658" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                          fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                          class="apexcharts-selection-rect"></rect>
                                </g>
                                <rect id="SvgjsRect1475" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe"
                                      opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                <g id="SvgjsG1610" class="apexcharts-yaxis" rel="0"
                                   transform="translate(963.5833333333334, 0)">
                                    <g id="SvgjsG1611" class="apexcharts-yaxis-texts-g"
                                       transform="translate(7.1875, 0)">
                                        <text id="SvgjsText1612" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="42" text-anchor="middle" dominant-baseline="auto" font-size="11px"
                                              fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">70
                                        </text>
                                        <text id="SvgjsText1613" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="68.5348" text-anchor="middle" dominant-baseline="auto" font-size="11px"
                                              fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">63
                                        </text>
                                        <text id="SvgjsText1614" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="95.06960000000001" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">56
                                        </text>
                                        <text id="SvgjsText1615" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="121.60440000000001" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">49
                                        </text>
                                        <text id="SvgjsText1616" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="148.13920000000002" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">42
                                        </text>
                                        <text id="SvgjsText1617" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="174.67400000000004" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">35
                                        </text>
                                        <text id="SvgjsText1618" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="201.20880000000005" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">28
                                        </text>
                                        <text id="SvgjsText1619" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="227.74360000000007" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">21
                                        </text>
                                        <text id="SvgjsText1620" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="254.2784000000001" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">14
                                        </text>
                                        <text id="SvgjsText1621" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="280.8132000000001" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">7
                                        </text>
                                        <text id="SvgjsText1622" font-family="Helvetica, Arial, sans-serif" x="-20"
                                              y="307.3480000000001" text-anchor="middle" dominant-baseline="auto"
                                              font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">0
                                        </text>
                                    </g>
                                </g>
                            </svg>
                            <div class="apexcharts-tooltip light" style="left: 49.8333px; top: 168.348px;">
                                <div class="apexcharts-tooltip-title"
                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">01 Jan
                                </div>
                                <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(77, 121, 246);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-label">Leads: </span><span
                                                class="apexcharts-tooltip-text-value">23%</span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(238, 241, 245);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-label">Vendors: </span><span
                                                class="apexcharts-tooltip-text-value">44%</span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group active" style="display: flex;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(74, 199, 236);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-label">Invoice Generate: </span><span
                                                class="apexcharts-tooltip-text-value">30%</span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom light"
                                 style="left: 13.3515px; top: 306.348px;">
                                <div class="apexcharts-xaxistooltip-text"
                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 39.0469px;">
                                    01 Jan
                                </div>
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
        <!-- end col-->
        <div class="col-lg-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card crm-data-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <div class="data-icon"><i class="far fa-smile rounded-circle bg-soft-warning"></i>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-sm-8">
                                    <h3 class="byekan">1200</h3>
                                    <p class="text-muted font-14 mb-0">مشتری راضی</p>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end col-->
                <div class="col-md-6">
                    <div class="card crm-data-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <div class="data-icon"><i class="far fa-user rounded-circle bg-soft-success"></i>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-sm-8">
                                    <h3 class="byekan">101</h3>
                                    <p class="text-muted font-14 mb-0">مشتری جدید</p>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="card crm-data-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <div class="data-icon"><i
                                            class="far fa-handshake rounded-circle bg-soft-secondary"></i></div>
                                </div>
                                <!-- end col-->
                                <div class="col-sm-8">
                                    <h3 class="byekan">720</h3>
                                    <p class="text-muted font-14 mb-0">فروش جدید</p>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end col-->
                <div class="col-md-6">
                    <div class="card crm-data-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <div class="data-icon"><i class="far fa-registered rounded-circle bg-soft-pink"></i>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-sm-8">
                                    <h3>964</h3>
                                    <p class="text-muted font-14 mb-0">کاربر جدید</p>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end col-->
            </div>
            <!--end row-->
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <p class="mb-0 text-muted font-13"><i class="mdi mdi-album mr-2 text-secondary"></i>اهداف جدید</p>
                        </div>
                        <!-- end col-->
                        <div class="col-sm-6">
                            <p class="mb-0 text-muted font-13"><i class="mdi mdi-album mr-2 text-warning"></i>هدفگزاری فروش</p>
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->
                    <div class="progress bg-warning mb-3" style="height:5px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 65%" aria-valuenow="65"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0 text-muted text-truncate align-self-center"><span class="text-success"><i
                                    class="mdi mdi-trending-up"></i>1.5%</span> افزایش نسبت به هفته گذشته</p>
                        <button type="button" class="btn btn-outline-info btn-sm">گزارش فروش</button>
                    </div>
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
                            <div class="">
                                <h4 class="mt-0 header-title">This Month Revenue</h4>
                                <h2 class="mt-0 font-weight-bold">$57k</h2>
                                <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span>
                                    Up From Last Month</p>
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
        <div class="col-lg-4">
            <div class="card carousel-bg-img">
                <div class="card-body dash-info-carousel">
                    <h4 class="mt-0 header-title">Populer Product</h4>
                    <div id="carousel_2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="media"><img src="/dashboard/assets/images/products/img-2.png" height="200"
                                                        class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">354 sold</span>
                                        <h4 class="mt-0">Important Watch</h4>
                                        <p class="text-muted mb-0">$99.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="media"><img src="/dashboard/assets/images/products/img-3.png" height="200"
                                                        class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">654 sold</span>
                                        <h4 class="mt-0">Wireless Headphone</h4>
                                        <p class="text-muted mb-0">$39.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="media"><img src="/dashboard/assets/images/products/img-1.png" height="200"
                                                        class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">551 sold</span>
                                        <h4 class="mt-0">Leather Bag</h4>
                                        <p class="text-muted mb-0">$49.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev"><span
                                class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span>
                        </a><a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next"><span
                                class="carousel-control-next-icon" aria-hidden="true"></span> <span
                                class="sr-only">Next</span></a></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
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
                                <td><img src="/dashboard/assets/images/flags/us_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>3/03/2019 4:29 PM</td>
                                <td>200</td>
                                <td>$750</td>
                                <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-2.png" alt="user"></td>
                                <td>Watch</td>
                                <td><img src="/dashboard/assets/images/flags/french_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>13/03/2019 1:09 PM</td>
                                <td>180</td>
                                <td>$970</td>
                                <td><span class="badge badge-boxed badge-soft-danger">Delivered</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-3.png" alt="user"></td>
                                <td>Headphone</td>
                                <td><img src="/dashboard/assets/images/flags/spain_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>22/03/2019 12:09 PM</td>
                                <td>30</td>
                                <td>$2800</td>
                                <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-4.png" alt="user"></td>
                                <td>Purse</td>
                                <td><img src="/dashboard/assets/images/flags/russia_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>14/03/2019 8:27 PM</td>
                                <td>100</td>
                                <td>$520</td>
                                <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-5.png" alt="user"></td>
                                <td>Shoe</td>
                                <td><img src="/dashboard/assets/images/flags/italy_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>18/03/2019 5:09 PM</td>
                                <td>100</td>
                                <td>$1150</td>
                                <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-6.png" alt="user"></td>
                                <td>Boll</td>
                                <td><img src="/dashboard/assets/images/flags/us_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
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
@endsection


@section('pageScripts')
@stop
