// https://apexcharts.com/javascript-chart-demos/dashboards/modern/


document.addEventListener('DOMContentLoaded', () => {
  const dailyRevenue = JSON.parse(document.querySelector('#generated-revenue').dataset.daily);
  const generatedRevenue = parseFloat(document.querySelector('#generated-revenue').dataset.total);

  Apex.grid = {
    padding: { right: 0, left: 0 }
  }
  Apex.dataLabels = { enabled: false }
  
  // Chart variables
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
      text: `RM${generatedRevenue}`,
      offsetX: 30,
      style: { fontSize: '24px', cssClass: 'apexcharts-yaxis-title' }
    },
    subtitle: {
      text: 'Revenue',
      offsetX: 30,
      style: { fontSize: '14px', cssClass: 'apexcharts-yaxis-title'  }
    }
  }
  
  // Render charts
  new ApexCharts(document.querySelector("#generated-revenue"), revenue).render();
})
