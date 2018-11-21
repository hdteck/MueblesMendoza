<?php
$servername = "mendozabdsrv1.database.windows.net";


$connectionOptions = array(
    "Database" => "AdventureWorksLT",
    "Uid" => "proadmin",
    "PWD" => "M3nd0za!Db"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
$tsql= "SELECT TOP 20 pc.Name as CategoryName, p.name as ProductName
        FROM [SalesLT].[ProductCategory] pc
        JOIN [SalesLT].[Product] p
     ON pc.productcategoryid = p.productcategoryid";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
echo "CategoryName                 Product";
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
   
 echo (. $row['CategoryName'] . "  " . $row['ProductName'] ."<br>" . PHP_EOL);
}


sqlsrv_free_stmt($getResults);
?>
 
