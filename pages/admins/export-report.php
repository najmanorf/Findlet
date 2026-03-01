<?php
    require_once "../query/database.php";

    // Set header supaya browser download file sebagai CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="wallet_reports.csv"');

    // Ambil data dari DB
    $stmt = $conn->prepare("SELECT id, id_user, id_number, id_type, name_on_id, gender, birth_place, birth_date, address, created_at, status FROM wallet_reports");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Tulis ke output (langsung ke browser)
    $output = fopen('php://output', 'w');

    // Tulis header kolom
    fputcsv($output, ['ID', 'User ID', 'ID Number', 'ID Type', 'Name on ID', 'Gender', 'Birth Place', 'Birth Date', 'Address', 'Created At', 'Status']);

    // Tulis data per baris
    foreach ($data as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
?>
