/* 
    Programmer 1: Mr. Tan Wei Kang, Developer
    Programmer 2: Ms. Lim Jia Yong, Project Manager
    Description: Renders all charts and graphs with data queried from database
    Edited on: 29 March 2022
*/

// https://apexcharts.com/javascript-chart-demos/dashboards/modern/
document.addEventListener('DOMContentLoaded', () => {
  const dailyRevenue = JSON.parse(document.querySelector('#generated-revenue').dataset.daily);
  const totalRevenue = parseFloat(document.querySelector('#generated-revenue').dataset.total);
  const dailyOrders = JSON.parse(document.querySelector('#order-revenue-chart').dataset.daily);
  // const totalOrders = parseInt(document.querySelector('#order-revenue-chart').dataset.total);
  // dailyOrders.map(order => console.log(order.date, order.orders));

  Apex.grid = {
    padding: { right: 0, left: 0 }
  }
  Apex.dataLabels = { enabled: false }
  
  // Chart 1 - Revenue Area Chart
  var revenue = {
    chart: {
      id: 'sparkline1',
      group: 'sparklines',
      type: 'area',
      height: 160,
      sparkline: { enabled: true },
    },
    stroke: { curve: 'straight' },
    fill: { opacity: 1 },
    series: [{
      name: 'Revenue',
      data: dailyRevenue.map(record => record.revenue.toFixed(2)),
    }],
    labels: dailyRevenue.map(record => record.date),
    yaxis: { min: 0 },
    xaxis: { type: 'datetime' },
    colors: ['#DCE6EC'],
    title: {
      text: `RM${totalRevenue}`,
      offsetX: 30,
      style: { fontSize: '24px', cssClass: 'apexcharts-yaxis-title' }
    },
    subtitle: {
      text: 'Revenue',
      offsetX: 30,
      style: { fontSize: '14px', cssClass: 'apexcharts-yaxis-title'  }
    }
  }
  
  // Chart 7 - Order-Revenue Mixed bar line chart
  var orderRevenue = {
    series: [{
    name: 'Orders',
    type: 'column',
    data: dailyOrders.map(record => record.orders),
  }, {
    name: 'Revenue',
    type: 'line',
    data: dailyRevenue.map(record => record.revenue.toFixed(2)),
  }],
    chart: {
    height: 350,
    type: 'line',
  },
  stroke: {
    width: [0, 4]
  },
  title: {
    text: 'Orders and Revenue',
    style: { fontSize: '18px', cssClass: 'apexcharts-yaxis-title' }
  },
  dataLabels: {
    enabled: false,
    enabledOnSeries: [1]
  },
  labels: dailyOrders.map(record => record.date),
  xaxis: {
    type: 'datetime'
  },
  yaxis: [{
    title: {
      text: 'Orders',
      style: { fontSize: '14px', cssClass: 'apexcharts-yaxis-title' }
    },
  
  }, {
    opposite: true,
    title: {
      text: 'Revenue',
      style: { fontSize: '14px', cssClass: 'apexcharts-yaxis-title' }
    }
  }]
  };

  // Render charts
  new ApexCharts(document.querySelector("#generated-revenue"), revenue).render();
  new ApexCharts(document.querySelector("#order-revenue-chart"), orderRevenue).render();
})
