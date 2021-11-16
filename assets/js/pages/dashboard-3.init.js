! function(s) {
    "use strict";
    var e = function() { this.$body = s("body"), this.charts = [] };
    e.prototype.respChart = function(a, r, t, o) {
        var n = a.get(0).getContext("2d"),
            i = s(a).parent();
        return function() {
            var e;
            switch (a.attr("width", s(i).width()), r) {
                case "Line":
                    e = new Chart(n, { type: "line", data: t, options: o });
                    break;
                case "Doughnut":
                    e = new Chart(n, { type: "doughnut", data: t, options: o });
                    break;
                case "Pie":
                    e = new Chart(n, { type: "pie", data: t, options: o });
                    break;
                case "Bar":
                    e = new Chart(n, { type: "bar", data: t, options: o });
                    break;
                case "Radar":
                    e = new Chart(n, { type: "radar", data: t, options: o });
                    break;
                case "PolarArea":
                    e = new Chart(n, { data: t, type: "polarArea", options: o })
            }
            return e
        }()
    }, e.prototype.initCharts = function() { var e = []; if (0 < s("#line-chart-example").length) { e.push(this.respChart(s("#line-chart-example"), "Line", { labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"], datasets: [{ label: "Current Week", backgroundColor: "rgba(79, 198, 225, 0.3)", borderColor: "#4fc6e1", data: [32, 42, 42, 62, 52, 75, 62] }, { label: "Previous Week", fill: !0, backgroundColor: "transparent", borderColor: "#009fb7", borderDash: [5, 5], data: [42, 58, 66, 93, 82, 105, 92] }] }, { maintainAspectRatio: !1, legend: { display: !1 }, tooltips: { intersect: !1 }, hover: { intersect: !0 }, plugins: { filler: { propagate: !1 } }, scales: { xAxes: [{ reverse: !0, gridLines: { color: "rgba(0,0,0,0.05)" } }], yAxes: [{ ticks: { stepSize: 20 }, display: !0, borderDash: [5, 5], gridLines: { color: "rgba(0,0,0,0)", fontColor: "#fff" } }] } })) } if (0 < s("#bar-chart-example").length) { e.push(this.respChart(s("#bar-chart-example"), "Bar", { labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], datasets: [{ label: "Sales Analytics", backgroundColor: "#009fb7", borderColor: "#009fb7", hoverBackgroundColor: "#009fb7", hoverBorderColor: "#009fb7", data: [65, 59, 80, 81, 56, 89, 40, 32, 65, 59, 80, 81] }, { label: "Dollar Rate", backgroundColor: "#e3eaef", borderColor: "#e3eaef", hoverBackgroundColor: "#e3eaef", hoverBorderColor: "#e3eaef", data: [89, 40, 32, 65, 59, 80, 81, 56, 89, 40, 65, 59] }] }, { maintainAspectRatio: !1, legend: { display: !1 }, scales: { yAxes: [{ gridLines: { display: !1 }, stacked: !1, ticks: { stepSize: 20 } }], xAxes: [{ barPercentage: .7, categoryPercentage: .5, stacked: !1, gridLines: { color: "rgba(0,0,0,0.01)" } }] } })) } if (0 < s("#pie-chart-example").length) { e.push(this.respChart(s("#pie-chart-example"), "Pie", { labels: ["Direct", "Affilliate", "Sponsored", "E-mail"], datasets: [{ data: [300, 135, 48, 154], backgroundColor: ["#6658dd", "#fa5c7c", "#4fc6e1", "#ebeff2"], borderColor: "transparent" }] }, { maintainAspectRatio: !1, legend: { display: !1 } })) } if (0 < s("#donut-chart-example").length) { e.push(this.respChart(s("#donut-chart-example"), "Doughnut", { labels: ["Direct", "Affilliate", "Sponsored"], datasets: [{ data: [128, 78, 48], backgroundColor: ["#6c757d", "#1abc9c", "#ebeff2"], borderColor: "transparent", borderWidth: "3" }] }, { maintainAspectRatio: !1, cutoutPercentage: 60, legend: { display: !1 } })) } if (0 < s("#polar-chart-example").length) { e.push(this.respChart(s("#polar-chart-example"), "PolarArea", { labels: ["Direct", "Affilliate", "Sponsored", "E-mail"], datasets: [{ data: [251, 135, 48, 154], backgroundColor: ["#4a81d4", "#fa5c7c", "#4fc6e1", "#ebeff2"], borderColor: "transparent" }] })) } if (0 < s("#radar-chart-example").length) { e.push(this.respChart(s("#radar-chart-example"), "Radar", { labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"], datasets: [{ label: "Desktops", backgroundColor: "rgba(57,175,209,0.2)", borderColor: "#39afd1", pointBackgroundColor: "#39afd1", pointBorderColor: "#fff", pointHoverBackgroundColor: "#fff", pointHoverBorderColor: "#39afd1", data: [65, 59, 90, 81, 56, 55, 40] }, { label: "Tablets", backgroundColor: "rgba(161, 127, 224,0.2)", borderColor: "#a17fe0", pointBackgroundColor: "#a17fe0", pointBorderColor: "#fff", pointHoverBackgroundColor: "#fff", pointHoverBorderColor: "#a17fe0", data: [28, 48, 40, 19, 96, 27, 100] }] }, { maintainAspectRatio: !1 })) } return e }, e.prototype.init = function() {
        var a = this;
        Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif', a.charts = this.initCharts(), s(window).on("resize", function(e) { s.each(a.charts, function(e, a) { try { a.destroy() } catch (e) {} }), a.charts = a.initCharts() })
    }, s.Dashboard3 = new e, s.Dashboard3.Constructor = e
}(window.jQuery),
function(e) {
    "use strict";
    window.jQuery.Dashboard3.init()
}();