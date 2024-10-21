<?php
@include 'config.php';

// Function to export the database
function exportDatabase($host, $user, $pass, $dbname, $tables = false, $backup_name = false) {
    // Create a new MySQLi connection
    $mysqli = new mysqli($host, $user, $pass, $dbname);

    // Check for connection errors
    if ($mysqli->connect_error) {
        die('Connection failed: ' . $mysqli->connect_error);
    }

    // Set the character set to UTF-8
    $mysqli->query("SET NAMES 'utf8'");

    // Get all the tables in the database
    $queryTables = $mysqli->query('SHOW TABLES');
    while ($row = $queryTables->fetch_row()) {
        $target_tables[] = $row[0];
    }

    // If specific tables are passed, filter them
    if ($tables !== false) {
        $target_tables = array_intersect($target_tables, $tables);
    }

    // Start building the export content
    $content = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';\r\nSET time_zone = '+00:00';\r\n\r\n";
    
    // Loop through each table and export its data
    foreach ($target_tables as $table) {
        $result = $mysqli->query('SELECT * FROM ' . $table);
        $fields_amount = $result->field_count;
        $rows_num = $mysqli->affected_rows;
        $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
        $TableMLine = $res->fetch_row();
        $content .= "\n\n" . $TableMLine[1] . ";\n\n";

        // Export rows in chunks
        for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
            while ($row = $result->fetch_row()) {
                if ($st_counter % 100 == 0 || $st_counter == 0) {
                    $content .= "\nINSERT INTO " . $table . " VALUES";
                }
                $content .= "\n(";
                for ($j = 0; $j < $fields_amount; $j++) {
                    $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                    $content .= (isset($row[$j]) ? '"' . $row[$j] . '"' : '""') . ($j < ($fields_amount - 1) ? ',' : '');
                }
                $content .= ")";
                if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                    $content .= ";";
                } else {
                    $content .= ",";
                }
                $st_counter++;
            }
        }
        $content .= "\n\n\n";
    }

    // Generate the backup name if not provided
    $backup_name = $backup_name ? $backup_name : $dbname . "_backup.sql";
    
    // Set headers for download
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: Binary');
    header('Content-Disposition: attachment;filename="' . $backup_name . '"');
    echo $content;
    exit;
}

// Call the export function with database credentials
exportDatabase('sql202.infinityfree.com', 'if0_37401223', 'Dhonii007', 'if0_37401223_sietadmission');
?>
