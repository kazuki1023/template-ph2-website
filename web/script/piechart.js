"use strict";
// 棒グラフの作成
{
  var options = {
    series: [{
    name: 'Servings',
    data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35]
  }],
    annotations: {
    points: [{
      x: 'Bananas',
      seriesIndex: 0,
      label: {
        borderColor: '#775DD0',
        offsetY: 0,
        style: {
          color: '#fff',
          background: '#775DD0',
        },
        text: 'Bananas are good',
      }
    }]
  },
  chart: {
    height: 350,
    type: 'bar',
  },
  plotOptions: {
    bar: {
      borderRadius: 10,
      columnWidth: '50%',
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: 2
  },
  grid: {
    row: {
      colors: ['#fff', '#f2f2f2']
    }
  },
  xaxis: {
    labels: {
      rotate: -45
    },
    categories: ['Apples', 'Oranges', 'Strawberries', 'Pineapples', 'Mangoes', 'Bananas',
      'Blackberries', 'Pears', 'Watermelons', 'Cherries', 'Pomegranates', 'Tangerines', 'Papayas'
    ],
    tickPlacement: 'on'
  },
  yaxis: {
    title: {
      text: 'Servings',
    },
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: "horizontal",
      shadeIntensity: 0.25,
      gradientToColors: undefined,
      inverseColors: true,
      opacityFrom: 0.85,
      opacityTo: 0.85,
      stops: [50, 0, 100]
    },
  }
  };
  var chart = new ApexCharts(document.getElementById("hours_chart"), options);
  chart.render();
}

// 学習言語の円グラフの作成
{
  var options = {
    series: [42, 18, 10, 9, 9, 5, 4, 3],
    colors: [
      "#0544EC", "#0B71BD", "#22BCDE", "#3CCEFE", "#B19EF2", "#6E47EC", "#4B17EE", "#3005C0",
    ],
    legend: {
      show: false,
    },
    chart: {
    type: 'donut',
  },
  responsive: [{
    // breakpoint: 480,
    options: {
      plotOptions: {
        pie: {
          customScale: 0.8,
          donut: {
            size: '30%'
          },
        }
      },
      tooltips: {
        enabled: false
      },
      chart: {
        width: 100
      },
      responsive: false,
    }
  }],

  };

  var characterchart = new ApexCharts(document.getElementById('learning_character_chart'), options);
  characterchart.render();
}

// 学習コンテンツの円グラフの作成
{
  var options = {
    series: [42, 33, 25],
    colors: [
      "#0844EC", "#0F71BD", "#22BCDD"
    ],
    legend: {
      show: false
    },
    chart: {
    type: 'donut',
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 100
      },
      responsive: false,
      legend: {
        display: false,
      }
    }
  }]
  };

  var contentchart = new ApexCharts(document.getElementById('learning_content_chart'), options);
  contentchart.render();
}


