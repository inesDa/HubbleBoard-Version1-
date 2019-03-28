
<script type="text/javascript">
   
  
$(function () {
    $(<?php echo '\'#'.$divName.'\''; ?>).highcharts({
        chart: {
            type: <?php echo '\''.$chartType.'\''; ?>
        },
        title: {
            text: <?php echo '\''.$composante.'\''; ?>
        },
        subtitle: {
            text: 'Nombre de connexions distinctes par semaine'
        },
        xAxis: {
            type: 'datetime',
            labels: {
                overflow: 'justify'
            }
        },
        yAxis: {
            title: {
                text: 'Nombre de connexions distinctes'
            },
            min: 0,
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            spline: {
                lineWidth: 2,
                states: {
                    hover: {
                        lineWidth: 3
                    }
                },
                marker: {
                    enabled: false
                },
                pointInterval: 604800000, // one week
                pointStart: Date.UTC(2014, 7, 4, 0, 0, 0)
            }
        },series: [{
            name: 'Enseignants',
            data: [<?php echo substr(implode($enseignants),0,-1); ?>]

        }, {
            name: 'Etudiants',
            data: [<?php echo substr(implode($etudiants), 0, -1); ?>]
        }, {
            name: 'Autres',
            data: [<?php echo substr(implode($autres), 0, -1); ?>]
        }],
        
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
            }
        }
    });
});
  
</script>