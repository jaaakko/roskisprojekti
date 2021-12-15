$(document).ready(function(){
  $.ajax({
    url : "http://localhost:8888/chart/sensorchartdata.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var value = [];
      var time = [];

      for(var i in data) {
        time.push(data[i].time);
        value.push(data[i].height - data[i].value);

      }

      var chartdata = {
        labels: time,
        datasets: [
          {
            label: "Roskan määrä",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(50, 220, 60, 0.75)",
            borderColor: "rgba(98, 255, 120, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: value
          }
        ]
      };
      

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata,
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 10,
              }
            }]
          }
        }
      });
    },
    error : function(data) {

    }
  });
});