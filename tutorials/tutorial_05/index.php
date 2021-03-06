<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 5</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h2>Testing sample.txt</h2>
    <?php
    $myfile = fopen("sample.txt", "r") or die("Unable to open file!");
    while (!feof($myfile)) {
        echo fgetc($myfile);
    }
    fclose($myfile);
    ?>
    <hr>
    <h2>Testing excel file</h2>
    <table><?php
            require "vendor/autoload.php";
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load('sample.xlsx');
            $worksheet = $spreadsheet->getActiveSheet();
            foreach ($worksheet->getRowIterator() as $row) {
                // (B1) READ CELLS
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);
                // (B2) OUTPUT HTML
                echo "<tr>";
                foreach ($cellIterator as $cell) {
                    echo "<td>" . $cell->getValue() . "</td>";
                }
                echo "</tr>";
            }

            ?></table>
    <hr>
    <h2>Testing CSV file</h2>
    <?php
    echo '<table>';
    $start_row = 1;
    if (($csv_file = fopen("sample.csv", "r")) !== FALSE) {
        while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
            $column_count = count($read_data);
            echo '<tr>';
            $start_row++;
            for ($c = 0; $c < $column_count; $c++) {
                echo "<td>" . $read_data[$c] . "</td>";
            }
            echo '</tr>';
        }
        fclose($csv_file);
    }
    echo '</table>';
    ?>
    <hr>
    <h2>Testing Doc file</h2>
    <div>
        <?php
        require 'vendor/autoload.php';
        error_reporting(E_ALL ^ E_DEPRECATED);
        $dir = str_replace('\\', '/', __DIR__) . '/';
        $source = $dir . 'sample.doc';
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                    foreach ($element->getElements() as $e) {
                        if ($e instanceof \PhpOffice\PhpWord\Element\Text) {
                            $style = $e->getFontStyle();
                            $size = $style->getSize();
                            $color = $style->getColor();
                            echo '<p style="font-size:' . $size . 'px; color: #' . $color . '">'
                                . $e->getText() . '</p>';
                        }
                    }
                }
            }
        }
        ?>
    </div>

</body>

</html>