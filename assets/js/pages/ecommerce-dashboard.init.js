! function(e) {
    "use strict";
    var t = function() {};
    t.prototype.createAreaChartDotted = function(e, t, r, i, o, a, c, n, s, y) { Morris.Area({ element: e, pointSize: 3, lineWidth: 2, data: i, xkey: o, ykeys: a, labels: c, hideHover: "auto", pointFillColors: n, pointStrokeColors: s, resize: !0, behaveLikeLine: !0, fillOpacity: .4, gridLineColor: "#eef0f2", lineColors: y }) }, t.prototype.init = function() { this.createAreaChartDotted("morris-area-with-dotted", 0, 0, [{ y: "2008", a: 100, b: 90, c: 40 }, { y: "2009", a: 75, b: 65, c: 20 }, { y: "2010", a: 50, b: 40, c: 50 }, { y: "2011", a: 75, b: 65, c: 95 }, { y: "2012", a: 50, b: 40, c: 22 }, { y: "2013", a: 75, b: 65, c: 56 }, { y: "2014", a: 100, b: 90, c: 60 }, { y: "2015", a: 100, b: 90, c: 40 }, { y: "2016", a: 75, b: 65, c: 20 }, { y: "2017", a: 50, b: 40, c: 50 }, { y: "2018", a: 75, b: 65, c: 95 }, { y: "2019", a: 50, b: 40, c: 22 }], "y", ["a", "b", "c"], ["Desktops", "Tablets", "Mobiles"], ["#ffffff"], ["#999999"], ["#ebeff2", "#f1556c", "#009fb7"]) }, e.MorrisCharts = new t, e.MorrisCharts.Constructor = t
}(window.jQuery),
function(e) {
    "use strict";
    window.jQuery.MorrisCharts.init()
}();