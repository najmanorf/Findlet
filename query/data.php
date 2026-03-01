<?php
    require_once "database.php";

    function getWalletReports() {
        global $koneksi;
        $sql = "SELECT wr.*, u.name AS user_name
                FROM wallet_reports wr
                JOIN users u ON wr.id_user = u.id";
        
        $result = mysqli_query($koneksi, $sql);
        
        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }



    function getWalletClaims() {
        global $koneksi;
        $sql = "SELECT wr.*, u.name AS user_name
                FROM wallet_claims wr
                JOIN users u ON wr.id_user = u.id";

        $result = mysqli_query($koneksi, $sql);

        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    function getContact() {
        global $koneksi;
        $sql = "SELECT wr.*, u.phone AS phone
                FROM wallet_claims wr
                JOIN users u ON wr.id_user = u.id";

        $result = mysqli_query($koneksi, $sql);

        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }

?>
