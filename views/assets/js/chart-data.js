"use strict";
$(document).ready(function () {
  let absentData = [];
  let presentData = [];
  let incompleteData = [];
  let monthData = [];
  let monthData2 = [];

  $.get({
    url: "../controllers/attendance_log/attendance_logCrud.php",
    data: { getData2: "getData2" },
    success: function (data) {
      let newData = JSON.parse(data);
      newData.forEach((entry, i) => {
        presentData.push(entry.present_count);
        absentData.push(entry.absent_count);
        incompleteData.push(entry.incomplete_count);
        monthData.push(entry.month);

        const dateParts = entry.month.split("-");
        const formattedMonth = new Date(
          dateParts[0],
          parseInt(dateParts[1]) - 1,
          1
        ).toLocaleDateString("en-US", { year: "numeric", month: "long" });

        monthData2.push(formattedMonth);
      });

      const formattedData = [
        { name: "Present", data: presentData },
        { name: "Absent", data: absentData },
        { name: "Incomplete", data: incompleteData },
      ];

      var options = {
        series: formattedData,

        chart: { height: 350, type: "area" },
        dataLabels: { enabled: false },
        stroke: { curve: "smooth" },
        colors: ["#00B871", "#FF0000", "#FFA500"],
        xaxis: {
          // type: "datetime",
          categories: monthData2,
        },
        legend: { position: "top" },
        // tooltip: { x: { format: "yyyy/MM" } },
      };

      var chart = new ApexCharts(document.querySelector("#chart1"), options);
      chart.render();

      var options = {
        series: formattedData,

        chart: { type: "bar", height: 350 },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: "55%",
            endingShape: "rounded",
          },
        },
        dataLabels: { enabled: false },
        stroke: { show: true, width: 2, colors: ["transparent"] },
        xaxis: {
          categories: monthData2,
        },
        yaxis: { title: { text: " GRAPH CHART " } },
        colors: ["#00B871", "#FF0000", "#FFA500"],
        fill: { opacity: 1 },
        tooltip: {
          y: {
            formatter: function (val) {
              return val;
            },
          },
        },
      };

      var chart = new ApexCharts(document.querySelector("#chart2"), options);
      chart.render();
      var options = {
        series: formattedData,
        chart: { height: 450, type: "line", zoom: { enabled: false } },
        dataLabels: { enabled: false },
        stroke: { curve: "straight" },
        markers: {
          size: 6,
          colors: ["#00B871"],
          strokeColors: "#fff",
          strokeWidth: 2,
          hover: { size: 7 },
        },
        colors: ["#00B871", "#FF0000", "#FFA500"],
        grid: { row: { colors: ["transparent", "transparent"], opacity: 0.5 } },
        xaxis: {
          categories: monthData2,
        },
      };
      var chart = new ApexCharts(document.querySelector("#chart4"), options);
      chart.render();
      Morris.Donut({
        element: "chart3",
        data: [
          { label: "Present", value: 3, labelColor: "#00B871" },
          { label: "Absent", value: 95, labelColor: "#FF0000" },
          { label: "Incomplete", value: 2, labelColor: "#FFA500" },
          { label: "Total", value: 100, labelColor: "#86B1F2" },
        ],
        colors: ["#00B871", "#FF0000", "#FFA500", "#86B1F2"],
        resize: true,
        redraw: true,
      });
    },
  });
});
