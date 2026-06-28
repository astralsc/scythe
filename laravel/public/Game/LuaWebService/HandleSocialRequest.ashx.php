<?php
if (isset($_GET['method']) and isset($_GET['playerid']) and isset($_GET['groupid'])) {
    if ($_GET['method'] == "IsInGroup") {
        if (($_GET['playerid'] == 2 or $_GET['playerid'] == 8639) and ($_GET['groupid'] == 2868472 or $_GET['groupid'] == 1200769)) {
            die('<Value Type="boolean">true</Value>');
        } else {
            die('<Value Type="boolean">false</Value>');
        }
    } else if ($_GET['method'] == "GetGroupRank") {
        if (($_GET['playerid'] == 2 or $_GET['playerid'] == 8639) and $_GET['groupid'] == 2868472) {
            die('<Value Type="integer">255</Value>');
        } else {
            die('<Value Type="integer">0</Value>');
        }
    }
}
?>