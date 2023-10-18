const ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
  type: 'scatter',
  data: {    
    datasets: [{
        label: 'Tensile Test',
        data: load.map((v, i) => ({ x: labels[i], y: v })),
        backgroundColor: '#9BD0F5',
        borderColor:'#36A2EB',
        showLine: true,
        borderWidth: 5,
      },
    ]
  },
  options: {
    plugins: {
        legend: {
            labels: {
                // This more specific font property overrides the global property
                font: {
                    size: 32
                },   
            },
        },
        title: {
            display: true,
            text: 'Load-Time(LS-D13-2)',
            font: {
                family: 'Arial',
                size: 38,
                style: 'normal',
                lineHeight: 1.2
              },
            padding: {
                top: 40,
                bottom: 30,
            }
        }
    },
    scales: {
        y: {
            ticks: {
                font: {
                    size: 30,
                }},
            title: {
                display: true,
                text: 'Load(kN)',
                font: {
                    family: 'Arial',
                    size: 30,
                    style: 'normal',
                  },
              }
              
        },
        x: {
            ticks: {
                font: {
                    size: 30,
                }},
            title: {
                display: true,
                text: 'Time(s)',
                font: {
                    family: 'Arial',
                    size: 30,
                    style: 'normal',
                  },
              }
        },
    //   xAxes: [{
    //     display: true,
    //     position: 'bottom',
    //     ticks: {
    //       stepSize: 1,
    //       autoSkip: false,
    //       callback: value => value % 20 == 0 ? value : null,
    //       min: labels[0],
    //       max: labels[labels.length - 1],
    //       maxRotation: 0,
          
    //     },
    //     // afterBuildTicks: (axis, ticks) => [0, 20, 40, 60, 80, 100, 120],
    //     scaleLabel: {
    //       display: true,
    //       fontSize: 30
    //     },
    //     title: {
    //         display: true,
    //         text: 'Time(s)',
    //         font: {
    //             family: 'Arial',
    //             size: 12,
    //             style: 'normal',
    //             lineHeight: 1.2
    //           },
    //       }
    //   }],
    //   yAxes: [{
    //       display: true,
    //       position: 'left',
    //       ticks: {
    //         beginAtZero: true,
    //         stepSize: 10000,
    //         min: 0,
    //         max: 70000,
            
    //       },
    //       scaleLabel: {
    //         display: true,
    //         fontSize: 36
    //       }
    //     },
    //     {
    //       display: true,
    //       position: 'right',
    //       ticks: {
    //         beginAtZero: true,
    //         stepSize: 10000,
    //         min: 0,
    //         max: 70000
    //       },
    //       scaleLabel: {
    //         display: true,
    //         fontSize: 16
    //       }
          
    //     },
    //   ]
    }
  }
});
window.onload = function() {
    //  parent.iframeLoaded();
    window.print();
    // window.close();
}
