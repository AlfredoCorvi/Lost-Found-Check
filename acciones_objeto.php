<?php
require 'conexion.php';
require 'vendor/autoload.php'; // Requiere Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $accion = $_POST['accion'];

    if ($accion === 'encontrado') {
        // 1. Marcar como encontrado
        $stmt = $conexion->prepare("UPDATE reportes_objetos SET estado = 'encontrado' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // 2. Obtener datos del objeto
        $stmt = $conexion->prepare("SELECT nombre_reportante, correo, hotel FROM reportes_objetos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($fila = $resultado->fetch_assoc()) {
            $nombre = $fila['nombre_reportante'];
            $correo = $fila['correo'];
            $hotel = $fila['hotel'];

            // 3. Enviar correo real con PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Configuración SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'al.cor.vi05@gmail.com';
                $mail->Password = 'qmdn qqmy wwxj ajxx';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Remitente y destinatario
                $mail->setFrom('omegap2tes@gmail.com', 'Recepcion del Hotel');
                $mail->addAddress($correo, $nombre);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Tu objeto ha sido encontrado';
                $mail->Body = "
                    <p>Hola <strong>$nombre</strong>,</p>
                    <p>Tu objeto ha sido encontrado. Puedes pasar a recogerlo en la recepción del hotel <strong>$hotel</strong>.</p>
                    <p>Gracias por tu paciencia.</p>
                    <p><em>Departamento de Objetos Perdidos.</em></p>
                ";

                $mail->send();

            } catch (Exception $e) {
                error_log("Error al enviar correo: {$mail->ErrorInfo}");
            }
        }

    } elseif ($accion === 'eliminar') {
        $stmt = $conexion->prepare("DELETE FROM reportes_objetos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    header("Location: tabla_objetos.php");
    exit;
}
