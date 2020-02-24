<?php
    // PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:sqllab001.database.windows.net,1433; Database = pedidos_curso", "usr_pedidos", "1Ma5p11Ma5p1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "usr_pedidos", "pwd" => "1Ma5p11Ma5p1", "Database" => "pedidos_curso", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sqllab001.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
 
    $tsql= "SELECT * FROM dbo.pedidos";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("<h1>"."Items en stock" . PHP_EOL ."<h1>");
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['ID'] . " Nombre:" . $row['nombre'] . PHP_EOL ."<br />");
        
    }
    sqlsrv_free_stmt($getResults);
?>
