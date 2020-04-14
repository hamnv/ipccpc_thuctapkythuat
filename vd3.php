<?php
// create an instance
$holidayDoc = simplexml_load_file('test.xml');

$resultTable = "";

switch (@$_POST['action']){
    case "Search":

        $txtSearch = $_POST['txtSearch'];
    $resultTable .= "Showing Results for <strong>$txtSearch</strong><br />";

        // set the query using the description
        if (!is_null($txtSearch)) {
            $qry = "Doc/Fld[@name='IC']/Prg/Sen[contains(text(),\"$txtSearch\")]/Cmt";
        }
        else {
        // blank search entered so all holidays are shown.
            $qry = "/Doc/";
        }

        // execute the xpath query
        $holidays = $holidayDoc->xpath($qry);

        // now loop through all holidays and entered results into table
        $resultTable .= "<hr>";

        foreach ($holidays as $holiday) 
        {

            $resultTable .= "<input type=\"checkbox\" name=\"saveCB\" value=\"3\"/>";
            $resultTable .= "echo $holiday->textContent;";
            $resultTable .= "</tr>\n";
        }


        break;

    default: // this means the home page, as is, without the query into XML file
        $resultTable .= "<table border=\"1\">";// draw a table and column headers

        // iterate through the item nodes displaying the contents
        foreach ($holidayDoc->channel->item as $holiday) {
            $resultTable .=  "<tr><td><a href=\"{$holiday->nodeValue}\">{$holiday->nodeValue}</a>" . "<br />" . 
            "{$holiday->nodeValue}" . "<br />" . 
            "{$holiday->node}</td>" . "<br />" . 
            "</tr>";
        }
        $resultTable .= "</table>";
    break;
    }

?>

<form name="search" method="POST" action=#">
    <input name="txtSearch" type="text" id="txtSearch" size="30"/>
    <input type="submit" value="Search" name="action" />
</form>

<?=$resultTable ?> <!-- finally show the result table -->