import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
am4core.useTheme(am4themes_animated);
import axios from 'axios';


class Stats extends Component {

    constructor(props) {
        super(props);
        this.state = {
            month: [],
        };
    }

    componentDidMount() {

        axios.get(`/api/stats`)
            .then(res => {
                const month = res.data;
                this.setState({ month });
            })

        let month = am4core.create("month", am4charts.XYChart);
        month.exporting.menu = new am4core.ExportMenu();

        var data = [
            this.state.month.map((month) => {
                {
                    "year": month.day,
                    "income": month.total,
                    "expenses": 30.5
                },
            })
          ];

        /* Create axes */
        var categoryAxis = month.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "year";
        categoryAxis.renderer.minGridDistance = 30;

        /* Create value axis */
        var valueAxis = month.yAxes.push(new am4charts.ValueAxis());

        /* Create series */
        var columnSeries = month.series.push(new am4charts.ColumnSeries());
        columnSeries.name = "Income";
        columnSeries.dataFields.valueY = "income";
        columnSeries.dataFields.categoryX = "year";

        columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
        columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
        columnSeries.columns.template.propertyFields.stroke = "stroke";
        columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
        columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
        columnSeries.tooltip.label.textAlign = "middle";

        var lineSeries = month.series.push(new am4charts.LineSeries());
        lineSeries.name = "Expenses";
        lineSeries.dataFields.valueY = "expenses";
        lineSeries.dataFields.categoryX = "year";

        lineSeries.stroke = am4core.color("#fdd400");
        lineSeries.strokeWidth = 3;
        lineSeries.propertyFields.strokeDasharray = "lineDash";
        lineSeries.tooltip.label.textAlign = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.renderer.minHeight = 110;

        var bullet = lineSeries.bullets.push(new am4charts.Bullet());
        bullet.fill = am4core.color("#fdd400"); // tooltips grab fill from parent by default
        bullet.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
        var circle = bullet.createChild(am4core.Circle);
        circle.radius = 4;
        circle.fill = am4core.color("#fff");
        circle.strokeWidth = 3;

        month.data = data;
        this.month = month;








        let platforms = am4core.create("platforms", am4charts.PieChart);
        var pieSeries = platforms.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";

// Let's cut a hole in our Pie chart the size of 30% the radius
        platforms.innerRadius = am4core.percent(30);
        platforms.rtl = true;

// Put a thick white border around each Slice
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.slices.template
            // change the cursor on hover to make it apparent the object can be interacted with
            .cursorOverStyle = [
            {
                "property": "cursor",
                "value": "pointer"
            }
        ];

        pieSeries.alignLabels = false;
        pieSeries.labels.template.bent = true;
        pieSeries.labels.template.radius = 3;
        pieSeries.labels.template.padding(0,0,0,0);
        pieSeries.rtl = true;
        pieSeries.ticks.template.disabled = true;

// Create a base filter effect (as if it's not there) for the hover to return to
        var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
        shadow.opacity = 0;

// Create hover state
        var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists
// Slightly shift the shadow and make it more prominent on hover
        var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
        hoverShadow.opacity = 0.7;
        hoverShadow.blur = 5;

// Add a legend
        platforms.legend = new am4charts.Legend();
        platforms.data = [{
            "country": "Lithuania",
            "litres": 501.9
        },{
            "country": "Germany",
            "litres": 165.8
        }, {
            "country": "Australia",
            "litres": 139.9
        }, {
            "country": "Austria",
            "litres": 128.3
        }, {
            "country": "UK",
            "litres": 99
        }, {
            "country": "Belgium",
            "litres": 60
        }];


        this.platforms = platforms;









        let browsers = am4core.create("browsers", am4charts.PieChart);
        browsers.hiddenState.properties.opacity = 0; // this creates initial fade-in
        browsers.rtl = true;
        browsers.data = [
            {
                country: "Lithuania",
                value: 260
            },
            {
                country: "Czechia",
                value: 230
            },
            {
                country: "Ireland",
                value: 200
            },
            {
                country: "Germany",
                value: 165
            },
            {
                country: "Australia",
                value: 139
            },
            {
                country: "Austria",
                value: 128
            }
        ];
        var series = browsers.series.push(new am4charts.PieSeries());
        series.dataFields.value = "value";
        series.dataFields.radiusValue = "value";
        series.dataFields.category = "country";
        series.slices.template.cornerRadius = 6;
        series.colors.step = 3;
        series.hiddenState.properties.endAngle = -90;
        browsers.legend = new am4charts.Legend();
        this.browsers = browsers;



    }



    render() {
        return (
            <div>
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <div className="card-body">
                                <h4 className="mt-0 header-title">نمودار <span style={{color: '#67b7dc'}}>بازدید</span> / <span style={{color: '#fdd400'}}>بازدیدکنندگان</span> ۳۰ روز اخیر</h4>
                                <p className="text-muted mb-4 font-13">اعداد براساس بازدید ها و بازدیدکننده های وارد شده
                                    در فروشگاه شما میباشد.</p>
                                <div className="row">
                                    <div className="col-md-12">
                                        <div id="month" style={{ width: "100%", height: "500px" }}></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div className="row">

                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-body">
                                <h4 className="mt-0 header-title">دستگاه بازدید کنندگان</h4>
                                <p className="text-muted mb-4 font-13">پراکندگی بازدید کنندگان براساس دستگاه</p>
                                <div className="row">
                                    <div className="col-md-12">
                                        <div id="platforms" style={{ width: "100%", height: "500px" }}></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div  className="card">
                            <div style={{height: 615}} className="card-body">
                                <h4 className="mt-0 header-title">مرورگر بازدید کنندگان</h4>
                                <p className="text-muted mb-4 font-13">پراکندگی بازدید کنندگان براساس دستگاه</p>
                                <div className="row">
                                    <div className="col-md-12">
                                        <div id="browsers" style={{ width: "100%", height: "350px" }}></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div className="row">

                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-body">
                                <h4 className="mt-0 header-title">موتور های جستجوگر</h4>
                                <p className="text-muted mb-4 font-13">مقدار ورودی بازدید براساس موتور های جستجوگر</p>
                                <div className="row">
                                    <div className="col-md-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-body">
                                <h4 className="mt-0 header-title">بربازدید ترین صفحات</h4>
                                <p className="text-muted mb-4 font-13">پراکندگی بازدید براساس مقدار بازدید از هر
                                    صفحه/محصول</p>
                                <div className="row">
                                    <div className="col-md-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        );
    }
}

export default Stats;

if (document.getElementById('stat')) {
    ReactDOM.render(<Stats />, document.getElementById('stat'));
}
