<?php
session_start();
require_once("../../../models/freelanceModel.php");

if (isset($_SESSION['email'])) {
    
if ($_SESSION["level"] == "pekerja_jasa") {
    
        $sql_email = mysqli_query($conn,"SELECT u.email FROM 
        `pekerja_jasa` pj
    JOIN
        `pekerjaan_request` pr
    ON
        pr.id_pekerja_jasa = pj.id_user
    JOIN
        `umkm` u 
    ON
        u.id_user = pr.id_umkm
    JOIN
        `menawarkan_jasa` mj
    ON
        mj.id_pekerjaan = pr.id_pekerjaan
    WHERE
        pj.email='{$_SESSION['email']}' AND mj.status = 'terima' ")->fetch_assoc();
}else {
    $sql_email = mysqli_query($conn,"SELECT pj.email FROM 
        `pekerja_jasa` pj
    JOIN
        `pekerjaan_request` pr
    ON
        pr.id_pekerja_jasa = pj.id_user
    JOIN
        `umkm` u 
    ON
        u.id_user = pr.id_umkm
    JOIN
        `menawarkan_jasa` mj
    ON
        mj.id_pekerjaan = pr.id_pekerjaan
    WHERE
        u.email='{$_SESSION['email']}' AND mj.status = 'terima'")->fetch_assoc();
}
    $outgoing_id = $_SESSION["user_id"];
    $incoming_id = $_SESSION["email"];

    $output = "";

    if ($_SESSION["level"] == "pekerja_jasa") {
    $sql = "SELECT * FROM chat_detail 
            LEFT JOIN 
            `umkm` ON umkm.email = chat_detail.incoming_msg_id 
            WHERE (outgoing_msg_id = '{$outgoing_id}' AND incoming_msg_id = '{$incoming_id}')  
            OR (outgoing_msg_id = '{$incoming_id}' AND incoming_msg_id = '{$outgoing_id}') ORDER BY id_chat_detail ASC";
    }elseif ($_SESSION["level"] == "umkm") {
    $sql = "SELECT * FROM chat_detail 
            LEFT JOIN 
            `pekerja_jasa` pj ON pj.email = chat_detail.incoming_msg_id 
            WHERE (outgoing_msg_id = '{$outgoing_id}' AND incoming_msg_id = '{$incoming_id}')  
            OR (outgoing_msg_id = '{$incoming_id}' AND incoming_msg_id = '{$outgoing_id}') ORDER BY id_chat_detail ASC";
    }

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            // Get the timestamp from the database
            $timestamp = strtotime($row['msg_time']);
            // Format the timestamp into H:i format
            $messageTime = date('H:i', $timestamp);

            if ($row['outgoing_msg_id'] === $incoming_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                    <span class="message-time">' . $messageTime . '</span>
                                </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                    <span class="message-time">' . $messageTime . '</span>
                                </div>
                            </div>';
            }
        }
        echo $output;
    }
} else {
    header("Location: ../login.php");
}
?>
