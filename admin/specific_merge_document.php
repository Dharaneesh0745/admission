<?php
@include '../config.php';
require_once '../vendor/autoload.php';

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\PdfParserException;

// Define the StreamReader class
class StreamReader
{
    public static function create($data)
    {
        return fopen('data://application/pdf;base64,' . base64_encode($data), 'r');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the student mobile numbers and document types from the POST request
    $studentMobileNos = isset($_POST['studentMobileNos']) ? $_POST['studentMobileNos'] : [];
    $documentTypes = isset($_POST['documentType']) ? $_POST['documentType'] : [];

    if (!empty($studentMobileNos) && !empty($documentTypes)) {
        // Increase memory limit (if required for large PDFs)
        ini_set('memory_limit', '512M');

        // Create a new FPDI instance
        $pdf = new Fpdi();
        $errorLog = '';

        foreach ($studentMobileNos as $studentMobileNo) {
            foreach ($documentTypes as $documentType) {
                // Prepare SQL to fetch the document based on mobile number
                $sql = "SELECT $documentType FROM umis WHERE StudentMobileNo = ?";
                $stmt = $conn->prepare($sql);
                
                if ($stmt) {
                    $stmt->bind_param('s', $studentMobileNo);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $stmt->close();

                    if (!empty($row[$documentType])) {
                        try {
                            // Load the PDF from the BLOB data
                            $pdfData = $row[$documentType];

                            // Stream the PDF data from the BLOB
                            $source = StreamReader::create($pdfData);

                            // Set the source file using the StreamReader
                            $totalPages = $pdf->setSourceFile($source);

                            // Loop through all pages of the document and import them
                            for ($pageNo = 1; $pageNo <= $totalPages; $pageNo++) {
                                $pdf->addPage();
                                $tplId = $pdf->importPage($pageNo);
                                $pdf->useTemplate($tplId);
                            }
                        } catch (PdfParserException $e) {
                            $errorLog .= "Error processing $documentType for Mobile Number $studentMobileNo: " . $e->getMessage() . "\n";
                        }
                    } else {
                        $errorLog .= "Document type $documentType not found for Mobile Number $studentMobileNo.\n";
                    }
                } else {
                    $errorLog .= "Failed to prepare SQL statement for $documentType.\n";
                }
            }
        }

        if (!empty($errorLog)) {
            // Log errors for further analysis
            file_put_contents('error_log.txt', $errorLog);
            echo "Errors occurred during PDF processing. Check 'error_log.txt' for details.";
        } else {
            // Output the merged PDF
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="merged_documents.pdf"');
            echo $pdf->Output('S'); // Output as a string
            exit;
        }
    } else {
        echo "No student mobile numbers or document types provided.";
    }
} else {
    echo "Invalid request method.";
}
