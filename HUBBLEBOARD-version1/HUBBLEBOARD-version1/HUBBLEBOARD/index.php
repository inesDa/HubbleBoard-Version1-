<!DOCTYPE HTML>
<?php
  error_reporting(E_ALL);
  header('Content-Type: text/html; charset=utf-8');
  if (session_status() == PHP_SESSION_NONE) {
    include 'QueryStep/include/connexion.php'; 
  }
  $file = '/var/www/html/HUBBLEBOARD/DescriptionFile/PreGeneratedFile.xml';
  if (file_exists($file)) {$doc = simplexml_load_file($file); }
  else {exit('Failed to open '.$file); }
?>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="CSS/opt1.css">
    <?php //Test Titre ?>
    <title><?php echo $doc->Header['title']; ?></title>
    <?php foreach ($doc->Library as $Library) { ?>      
      <script type="text/javascript" src= "<?php echo $Library; ?> "></script> <?php } ?>
    <?php include 'chartCategories/chart.php';?>
    <style>
      table {
        border: medium solid #6495ed;
        border-collapse: collapse;
        width: 50%;
      }
      th {
        font-family: monospace;
        border: thin solid #6495ed;
        width: 50%;
        padding: 5px;
        background-color: #D0E3FA;
        background-image: url(sky.jpg);
      }
      td {
        font-family: sans-serif;
        border: thin solid #6495ed;
        width: 50%;
        padding: 5px;
        text-align: center;
        background-color: #ffffff;
      }
      caption {
        font-family: sans-serif;
        }
      /* Style the tab */
      div.tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
      }
      /* Style the buttons inside the tab */
      div.tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
      }
      /* Change background color of buttons on hover */
      div.tab button:hover {
        background-color: #ddd;
      }
      /* Create an active/current tablink class */
      div.tab button.active {
        background-color: #ccc;
      }
      /* Style the tab content */
      .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
      }
    </style>
  </head>
  <body>
    <!--Header Definition -->
    <?php if ($doc['showNavigationBar'] == 'true') { ?>
       <ul style="<?php echo ($doc->Header->Menu['style']); ?>">
       <?php foreach ($doc->Header->Menu->Tab as $Tab) { ?>
         <li style="<?php echo $doc->Header->Menu['styleTab']; ?>">
           <a style="<?php echo $doc->Header->Menu['styleLink']; ?>" href="<?php $Tab['link']; ?>"> 
           
             <?php echo $Tab['title']; ?> 
           </a>
         </li> </br>
       <?php } ?>
       </ul>
    <?php } ?>
    <!--Charts Visualization -->
    <!-- View repartition -->
    <?php
      foreach ($doc->View as $View) { ?>
        <div style=" <?php echo $View['style']; ?>">
          <?php foreach ($View->Section as $section) { ?>
            <div style=" <?php echo $section['style']; ?>">
              <?php     
              foreach ($section->Component as $component) { 
                if ($component['type'] == 'chart') {  
                  foreach ($component->Chart as $ChartDescription) { ?>
                    <div id="<?php echo 'container'.$ChartDescription['id']; ?>" style="<?php echo $ChartDescription['style']; ?>"></div> 
                  <?php }
                } //end if
                if ($component['type'] == 'Tableau') {
                  foreach ($component->Table as $Table) { ?>
                    <!--</h1> -->
                    <Table style="<?php echo $Table['style']; ?>">
                      <tr> 
                        <?php foreach ($Table->titre as $titre) {
                           foreach ($titre->th as $th) { ?>         
                             <th><?php echo $th; ?> </th>
                           <?php }
                        }?>
                      </tr>
                      <?php foreach ($Table->tr as $ligne) { ?>         
                        <tr> 
                          <?php foreach ($ligne->td as $td) { ?>         
                            <td><?php echo $td; ?></td>
                          <?php } ?>
                        </tr>
                      <?php } ?>
                    </Table>   
                  <?php }
                }
                if ($component['type'] == 'Image') {
                  foreach ($component->img as $img) { ?> 
                    <h3 style="<?php echo $img['styleTitle']; ?>"><?php echo $img['title']; ?></h3>
                    <image src="<?php echo $img['src']; ?>" alt="<?php echo $img['title']; ?>" style="<?php echo $img['style']; ?>"/>
                  <?php }
                } 
              }?> 
            </div>   
          <?php }?>
        </div> <?php
         }
      ?>       <!-- Debut section 2-->
      <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
      </script>
    </body>
</html>
