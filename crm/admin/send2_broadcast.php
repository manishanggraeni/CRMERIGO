<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();


$sql_last_id = 'SELECT id_broadcast FROM broadcast ORDER BY id_broadcast DESC';
$last_id_query = mysqli_query($con, $sql_last_id);
$last_id_object = mysqli_fetch_assoc($last_id_query);
$last_id = $last_id_object['id_broadcast'] + 1;


$idAdmin = $_SESSION['id'];
$subject = $_POST['subjek'];
$pesan = addslashes($_POST['pesan']);
$pdate=date('Y-m-d');
// $tgl_start = date('Y-m-d', strtotime($_POST['tanggal_start']));
// $tanggal_start = $tgl_start;

$sql = "INSERT into broadcast values('$last_id', '$idAdmin', '$subject','$pesan','$pdate');";

if (mysqli_query($con, $sql)) {
    foreach($_POST['name'] as $id_user){
        mysqli_query($con, "INSERT INTO det_broadcast VALUES( $id_user, $last_id)");
    }
    header ('Location: make_broadcast.php');
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // $sql=mysqli_query($con,"insert into broadcast(ticket_id,email_id,subject,task_type,ticket,status,posting_date)  values('$tid','$email','$subject','$tt','$ticket','$st','$pdate')");
    // if($a)
    // {
    // echo "<script>alert('Broadcast Has Been Sent');</script>";
    // }
    // }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Include librari phpmailer
include('PHPMailer/src/Exception.php');
include('PHPMailer/src/PHPMailer.php');
include('PHPMailer/src/SMTP.php');
$email_pengirim = 'sweet18081998@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'Erigo Store'; // Isikan dengan nama pengirim
// $email_penerima = $_POST['email_penerima']; // Ambil email penerima dari inputan form
$subjek = $_POST['subjek']; // Ambil subjek dari inputan form
$pesan = $_POST['pesan']; // Ambil pesan dari inputan form
$attachment = $_FILES['attachment']['name']; // Ambil nama file yang di upload
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = '@manis18081998'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
$mail->setFrom($email_pengirim, $nama_pengirim);
// $mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
// Load file content.php
ob_start();
include "content.php";
$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();
$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('assets/img/logo.jpg', 'logo_mynotescode', 'logo.jpg'); // Aktifkan jika ingin menampilkan gambar dalam email
// if(empty($attachment)){ // Jika tanpa attachment
//     $send = $mail->send();
//     if($send){ // Jika Email berhasil dikirim
//         echo "<h1>Email berhasil dikirim</h1><br /><a href='make_broadcast.php'>Kembali ke Form</a>";
//     }else{ // Jika Email gagal dikirim
//         echo "<h1>Email gagal dikirim</h1><br /><a href='make_broadcast.php'>Kembali ke Form</a>";
//         // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
//     }
// }else{ // Jika dengan attachment
//     $tmp = $_FILES['attachment']['tmp_name'];
//     $size = $_FILES['attachment']['size'];
//     if($size <= 25000000){ // Jika ukuran file <= 25 MB (25.000.000 bytes)
//         $mail->addAttachment($tmp, $attachment); // Add file yang akan di kirim
//         $send = $mail->send();
//         if($send){ // Jika Email berhasil dikirim
//             echo "<h1>Email berhasil dikirim</h1><br /><a href='make_broadcast.php'>Kembali ke Form</a>";
//         }else{ // Jika Email gagal dikirim
//             echo "<h1>Email gagal dikirim</h1><br /><a href='make_broadcast.php'>Kembali ke Form</a>";
//             // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
//         }
//     }else{ // Jika Ukuran file lebih dari 25 MB
//         echo "<h1>Ukuran file attachment maksimal 25 MB</h1><br /><a href='make_broadcast.php'>Kembali ke Form</a>";
//     }
// }

/*melakukan koneksi ke MySQL*/
$link = mysqli_connect("localhost", "root", "", "crm");
$result=mysqli_query($link,"SELECT * FROM user");

/*loop untuk mengirimakn email*/
while($row=mysqli_fetch_array($result)){
	$mail->addAddress($row["email"]);
	if (!$mail->send()) {
    echo "Ada Yang Error Gan: " . $mail->ErrorInfo;
	} else {
		echo "Berhasil di Send!";
	}
}

mysqli_close($result);

header("Location: make_broadcast.php?alert=true")

?>
