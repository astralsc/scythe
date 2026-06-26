<?php
$catalogContext = isset($_GET['CatalogContext']) ? $_GET['CatalogContext'] : 1;
$sortType = isset($_GET['SortType']) ? $_GET['SortType'] : 0;
$sortAggregation = isset($_GET['SortAggregation']) ? $_GET['SortAggregation'] : 3;
$sortCurrency = isset($_GET['SortCurrency']) ? $_GET['SortCurrency'] : 0;
$legendExpanded = isset($_GET['LegendExpanded']) ? $_GET['LegendExpanded'] : 'false';
$category = isset($_GET['Category']) ? $_GET['Category'] : 0;

$url = "/catalog?CatalogContext={$catalogContext}"
     . "&SortType={$sortType}"
     . "&SortAggregation={$sortAggregation}"
     . "&SortCurrency={$sortCurrency}"
     . "&LegendExpanded={$legendExpanded}"
     . "&Category={$category}";

header("Location: " . $url);
exit();
?>