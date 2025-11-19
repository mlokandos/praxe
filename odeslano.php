<?php include "includes/menu.php"; ?>

<section class="contact-intro">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
try {
    
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sejkspir123@gmail.com';  // tvůj Gmail
    $mail->Password   = 'zkke tvpw scfi iclx';  // App Password z Google
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // === ROZLIŠENÍ FORMULÁŘŮ ===
    if (isset($_POST['cartData'])) {
        // 🛒 OBJEDNÁVKA Z KOŠÍKU
        $name     = $_POST['name'] ?? '';
        $email    = $_POST['email'] ?? '';
        $address  = $_POST['address'] ?? '';
        $city     = $_POST['city'] ?? '';
        $zip      = $_POST['zip'] ?? '';
        $payment  = $_POST['payment'] ?? '';
        $cartJson = $_POST['cartData'] ?? '[]';
        $cart     = json_decode($cartJson, true);

        // === Generování HTML tabulky objednávky ===
        $cartHtml = "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse;width:100%;'>
        <tr><th>Název</th><th>Cena</th><th>Množství</th></tr>";
        $total = 0;
if ($cart) {
    foreach ($cart as $item) {
     
        $pname = htmlspecialchars($item['nazev'] ?? '');
        $price = floatval($item['cena'] ?? 0);
        $qty   = intval($item['mnozstvi'] ?? 0);
        $sum   = $price * $qty;
        $total += $sum;
        $cartHtml .= "<tr><td>$pname</td><td>$price Kč</td><td>$qty ks</td></tr>";
    }
}
        $cartHtml .= "<tr><td colspan='2' align='right'><strong>Celkem:</strong></td><td><strong>" . number_format($total, 2) . " Kč</strong></td></tr></table>";

        $mail->setFrom('tvujemail@gmail.com', 'Objednávky ŠejkSpír');
        $mail->addAddress('sejkspir123@gmail.com');
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = "Nová objednávka od $name";
        $mail->Body    = "
            <h2>Nová objednávka</h2>
            <p><strong>Jméno:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Adresa:</strong> $address, $city, $zip</p>
            <p><strong>Způsob platby:</strong> $payment</p>
            <h3>Položky košíku:</h3>
            $cartHtml
        ";

        $mail->send();
        echo "<h1>✅ Objednávka byla úspěšně odeslána!</h1>";

    } elseif (!empty($_POST['message'])) {
        // ✉️ KONTAKTNÍ FORMULÁŘ
        $name    = htmlspecialchars($_POST['name'] ?? '');
        $email   = htmlspecialchars($_POST['email'] ?? '');
        $message = htmlspecialchars($_POST['message'] ?? '');

        $mail->setFrom($email, $name);
        $mail->addAddress('sejkspir123@gmail.com', 'ŠejkSpír');
        $mail->addReplyTo($email, $name);

        $mail->isHTML(false);
        $mail->Subject = "Nová zpráva z webu od $name";
        $mail->Body    = "Jméno: $name\nE-mail: $email\n\nZpráva:\n$message";

        $mail->send();
        echo "<h1>✅ Děkujeme, $name!</h1><p>Vaše zpráva byla odeslána.</p>";

    } else {
        echo "<h1>⚠️ Formulář nebyl odeslán správně.</h1>";
    }

} catch (Exception $e) {
    echo "<h1>❌ Chyba při odesílání!</h1>";
    echo "<p>Podrobnosti: {$mail->ErrorInfo}</p>";
}
?>
  <p><a href="index.php" class="submit-btn">Zpět na hlavní stránku</a></p>
</section>

<?php include "includes/footer.php"; ?>
