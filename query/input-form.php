<?php
    include "database.php";

    function saveWalletClaim($data) {
        global $koneksi;

        $id_user            = $data['id_user'];
        $id_number          = $data['id_number'];
        $id_type            = $data['id_type'];
        $name_on_id         = $data['name_on_id'];
        $gender             = $data['gender'];
        $birth_place        = $data['birth_place'];
        $birth_date         = $data['birth_date'];
        $address            = $data['address'];
        $wallet_appearance  = $data['wallet_appearance'];
        $chronology         = $data['chronology'];

        $query = "INSERT INTO wallet_claims SET
            id_user = '$id_user',
            id_number = '$id_number',
            id_type = '$id_type',
            name_on_id = '$name_on_id',
            gender = '$gender',
            birth_place = '$birth_place',
            birth_date = '$birth_date',
            address = '$address',
            wallet_appearance = '$wallet_appearance',
            chronology = '$chronology'";

        return mysqli_query($koneksi, $query);}

    function saveWalletReport($postData, $fileData) {
        global $koneksi;

        $walletImageName = $fileData['wallet_image']['name'];
        $cardImageName   = $fileData['card_image']['name'];

        $walletTmp = $fileData['wallet_image']['tmp_name'];
        $cardTmp   = $fileData['card_image']['tmp_name'];

        $uploadPath = "../uploads/";

        // Simpan file ke folder uploads
        move_uploaded_file($walletTmp, $uploadPath . $walletImageName);
        move_uploaded_file($cardTmp, $uploadPath . $cardImageName);

        // Masukkan data ke database
        $query = "INSERT INTO wallet_reports SET
            id_user       = '{$postData['id_user']}',
            id_number     = '{$postData['id_number']}',
            id_type       = '{$postData['id_type']}',
            name_on_id    = '{$postData['name_on_id']}',
            gender        = '{$postData['gender']}',
            birth_place   = '{$postData['birth_place']}',
            birth_date    = '{$postData['birth_date']}',
            address       = '{$postData['address']}',
            wallet_image  = '$walletImageName',
            card_image    = '$cardImageName'";

        return mysqli_query($koneksi, $query);}
?>
