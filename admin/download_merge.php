<?php
@include '../config.php';
require_once '../vendor/autoload.php';

use setasign\Fpdi\Fpdi;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['studentMobileNos'])) {
        die("No student mobile numbers selected.");
    }

    $studentMobileNos = $_POST['studentMobileNos'];

    // Create a new ZIP archive
    $zip = new ZipArchive();
    $zipFilename = sys_get_temp_dir() . '/merged_documents.zip'; // Store ZIP in temp directory

    if ($zip->open($zipFilename, ZipArchive::CREATE) !== TRUE) {
        die("Unable to create ZIP file.");
    }

    foreach ($studentMobileNos as $mobileNo) {
        // Create a new FPDI instance for PDF merging
        $pdf = new Fpdi();
        
        // Fetch student details
        $sql = "SELECT * FROM umis WHERE StudentMobileNo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mobileNo);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            $documents = [
                'CommunityDocument' => $row['CommunityDocument'],
                'AadhaarDocument' => $row['AadhaarDocument'],
                'FirstGraduateDocument' => $row['FirstGraduateDocument'],
                'MigrationDocument' => $row['MigrationDocument'],
                'IncomeDocument' => $row['IncomeDocument'],
                'CounsellingDocument' => $row['CounsellingDocument'],
                'DiplomaDocument' => $row['DiplomaDocument'],
                'UGDocument' => $row['UGDocument'],
                'TotalMark10Document' => $row['TotalMark10Document'],
                'TotalMark12Document' => $row['TotalMark12Document'],
                'TransferCertificate' => $row['TransferCertificate']
            ];

            foreach ($documents as $docName => $docBlob) {
                if (!empty($docBlob)) {
                    // Load the PDF from the BLOB data
                    $pageCount = $pdf->setSourceFile(StreamReader::create($docBlob)); // Get the number of pages
                    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                        $pdf->addPage();
                        $tplId = $pdf->importPage($pageNo); // Import each page
                        $pdf->useTemplate($tplId);
                    }
                }
            }

            // Save the merged PDF to a temporary file
            $mergedPdfFilename = sys_get_temp_dir() . '/' . $mobileNo . '_merged.pdf';
            $pdf->Output($mergedPdfFilename, 'F');

            // Add the merged PDF to the ZIP
            $zip->addFile($mergedPdfFilename, $mobileNo . '_merged.pdf');
        } else {
            echo "No records found for Mobile Number $mobileNo.";
        }
    }

    // Close the ZIP file
    if ($zip->close() === FALSE) {
        die("Failed to close the ZIP file.");
    }

    // Serve the ZIP file
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="merged_documents.zip"');
    header('Content-Length: ' . filesize($zipFilename));
    readfile($zipFilename);

    // Clean up
    foreach ($studentMobileNos as $mobileNo) {
        $mergedPdfFilename = sys_get_temp_dir() . '/' . $mobileNo . '_merged.pdf';
        if (file_exists($mergedPdfFilename)) {
            unlink($mergedPdfFilename); // Remove temporary merged PDFs
        }
    }
    unlink($zipFilename); // Remove the temporary ZIP file
    $conn->close();
} else {
    die("Invalid request.");
}

// Define the StreamReader class
class StreamReader
{
    public static function create($data)
    {
        return fopen('data://text/plain;base64,' . base64_encode($data), 'r');
    }
}
?>