<script type="text/javascript">
    	
  <?php    
          

  $i=0;
 foreach ($chart as $value) { 
 ?>
$(function () {
    $(<?php echo '\'#container'.$i.'\''; ?>).highcharts({
  chart: {
             type: <?php echo '\''.$chart[$i].'\''; ?>,
        },
        title: {
            text: 'Learner distribution per week / chapter'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Learner evolution',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
         series: [{
            name: 'Introduction',
            data: [<?php echo $intro; ?>]

        }
        ,{
            name: 'Week 2 ',
            data: [<?php echo $chap2; ?>]

        }, {
            name: 'Week 1',
            data: [<?php echo $chap1; ?>]
        },{
            name: 'Week 3 ',
            data: [<?php echo  $chap3; ?>]

        }
        ,{
            name: 'Week 4 ',
            data: [<?php echo $chap4; ?>]

        }
        ,{
            name: 'Week 5',
            data: [<?php echo $chap5; ?>]

        }]
    });
});
                    <?php $i++;} ?>	
</script>