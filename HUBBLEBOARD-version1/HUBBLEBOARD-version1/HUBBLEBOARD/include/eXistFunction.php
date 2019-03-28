<?php 
  function requestXQuery($query) {

    try
    {
      $db = new eXist();
      $db->setDebug(true);

      # Connect
      $db->connect() or die ($db->getError());

      # XQuery execution
      $db->setDebug(false);
      $db->setHighlight(TRUE);
      $result = $db->xquery($query);

      # Get results
      $hits = $result["HITS"];
      //$collections = $result["Dashboard"];
      
      # Show results
        if ( !empty($result["XML"]) ){  
          return $result["XML"];
        }
        //$db->disconnect() or die ($db->getError());
      }
      catch( Exception $e )
      {
        die($e);
      }  
  }