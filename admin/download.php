<?php
@include '../config.php';
require_once '../vendor/autoload.php';

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\PdfParserException;

class StreamReader
{
    public static function create($data)
    {
        return fopen('data://application/pdf;base64,' . base64_encode($data), 'r');
    }
}

// Handle both file download and PDF merging based on the request
if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {
    $studentMobileNo = isset($_POST['StudentMobileNo']) ? $_POST['StudentMobileNo'] : $_GET['StudentMobileNo'];
    $documentTypes = isset($_POST['documentType']) ? $_POST['documentType'] : []; // Selected documents to merge
    $document = isset($_GET['document']) ? $_GET['document'] : ''; // Specific document to download

    // Download Profile Photo logic
    if (!empty($studentMobileNo) && $document === 'ProfilePhoto') {
        $sql = "SELECT ProfilePhoto FROM umis WHERE StudentMobileNo = '" . $conn->real_escape_string($studentMobileNo) . "'";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $photo = $row['ProfilePhoto'];  // Assuming ProfilePhoto column contains the BLOB data

            if (!empty($photo)) {
                // Detect the MIME type of the image
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $photoMimeType = finfo_buffer($finfo, $photo);
                finfo_close($finfo);

                // Send the appropriate headers to initiate the file download
                header('Content-Type: ' . $photoMimeType);
                header('Content-Disposition: attachment; filename="ProfilePhoto.jpg"');  // Set appropriate extension (e.g., .png or .jpg)
                header('Content-Length: ' . strlen($photo));

                // Output the BLOB data as a file
                echo $photo;

                exit;
            } else {
                echo "Photo not found.";
                exit;
            }
        } else {
            echo "No record found.";
            exit;
        }
    }

    // Merging multiple PDF documents logic
    if (!empty($studentMobileNo) && !empty($documentTypes)) {
        $sql = "SELECT " . implode(", ", $documentTypes) . " FROM umis WHERE StudentMobileNo = '" . $conn->real_escape_string($studentMobileNo) . "'";
        $result = $conn->query($sql);
        $studentDetails = $result->fetch_assoc();

        if ($studentDetails) {
            $pdf = new Fpdi();

            foreach ($documentTypes as $type) {
                if (!empty($studentDetails[$type])) {
                    try {
                        $docContent = $studentDetails[$type];  // Assuming the document is stored as a BLOB
                        $pageCount = $pdf->setSourceFile(StreamReader::create($docContent));

                        for ($i = 1; $i <= $pageCount; $i++) {
                            $tplIdx = $pdf->importPage($i);
                            $pdf->AddPage();
                            $pdf->useTemplate($tplIdx, ['adjustPageSize' => true]);
                        }
                    } catch (PdfParserException $e) {
                        echo "Error parsing PDF document: " . $e->getMessage();
                        exit;
                    }
                }
            }

            // Output the merged PDF
            $pdf->Output('I', 'merged_document.pdf');
            exit; // Prevent further output
        } else {
            echo "No records found for this student.";
            exit;
        }
    }
}
?>
