<?php
    $serverName = "sqllab001.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "pedidos_curso", // update me
        "Uid" => "usr_pedidos", // update me
        "PWD" => "Pa$$w0rd" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === true) {  
                echo "Connection was established";  
    }            
    $tsql= "SELECT * FROM dbo.pedidos";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['ID'] . " " . $row['nombre'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);
?>
