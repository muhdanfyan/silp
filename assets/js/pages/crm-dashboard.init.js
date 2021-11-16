! function(e) {
    "use strict";
    var a = function() {};
    a.prototype.createBarChart = function(e, a, o, r, t, i) { Morris.Bar({ element: e, data: a, xkey: o, ykeys: r, labels: t, hideHover: "auto", resize: !0, gridLineColor: "#eeeeee", barSizeRatio: .4, barColors: i }) }, a.prototype.createLineChart = function(e, a, o, r, t, i, n, l, b) { Morris.Line({ element: e, data: a, xkey: o, ykeys: r, labels: t, fillOpacity: i, pointFillColors: n, pointStrokeColors: l, behaveLikeLine: !0, gridLineColor: "#eef0f2", hideHover: "auto", lineWidth: "3px", pointSize: 0, resize: !0, lineColors: b }) }, a.prototype.createDonutChart = function(e, a, o) { Morris.Donut({ element: e, data: a, barSize: .2, resize: !0, colors: o }) }, a.prototype.init = function() {
        this.createBarChart("morris-bar-example", [{ y: "2012", a: 100, b: 90 }, { y: "2013", a: 75, b: 65 }, { y: "2014", a: 50, b: 40 }, { y: "2015", a: 75, b: 65 }, { y: "2016", a: 50, b: 40 }, { y: "2017", a: 75, b: 65 }, { y: "2018", a: 100, b: 90 }], "y", ["a", "b"], ["Won Deal", "Lost Deal"], ["#4fc6e1", "#009fb7"]);
        this.createLineChart("deals-analytics", [{ y: "2010", a: 50, b: 0 }, { y: "2011", a: 75, b: 50 }, { y: "2012", a: 30, b: 80 }, { y: "2013", a: 50, b: 50 }, { y: "2014", a: 75, b: 10 }, { y: "2015", a: 50, b: 40 }, { y: "2016", a: 75, b: 50 }, { y: "2017", a: 100, b: 70 }], "y", ["a", "b"], ["Won Deal", "Lost Deal"], ["0.1"], ["#ffffff"], ["#999999"], ["#ebeff2", "#f1556c"]);
        this.createDonutChart("morris-donut-example", [{ label: "Group 1", value: 12 }, { label: "Group 2", value: 30 }, { label: "Group 3", value: 20 }], ["#4fc6e1", "#009fb7", "#ebeff2"])
    }, e.CRMDashboard = new a, e.CRMDashboard.Constructor = a
}(window.jQuery),
function(e) {
    "use strict";
    window.jQuery.CRMDashboard.init()
}();