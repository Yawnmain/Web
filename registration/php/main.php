
<?php
$host = 'localhost';
$dbname = 'registration';
$username = 'yawnmain';
$password = '567tyu';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // retrieve the subject and payment IDs from their respective tables
    $subjectStmt = $pdo->prepare("SELECT id FROM subjects WHERE name = ?");
    $subjectStmt->bindValue(1, $_POST['topic']);
    $subjectStmt->execute();
    $subjectId = $subjectStmt->fetchColumn();

    $paymentStmt = $pdo->prepare("SELECT id FROM payments WHERE name = ?");
    $paymentStmt->bindValue(1, $_POST['payment_method']);
    $paymentStmt->execute();
    $paymentId = $paymentStmt->fetchColumn();

    $subscribe = isset($_POST['newsletter']);

    // prepare insert statement to add user data to the database
    $stmt = $pdo->prepare("INSERT INTO participants (name, lastname, email, tel, subject_id, payment_id, mailing, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
    $stmt->bindValue(1, $firstName);
    $stmt->bindValue(2, $lastName);
    $stmt->bindValue(3, $email);
    $stmt->bindValue(4, $phone);
    $stmt->bindValue(5, $subjectId);
    $stmt->bindValue(6, $paymentId);
    $stmt->bindValue(7, $subscribe ? 1 : 0);

    try {
        // execute the insert statement
        $stmt->execute();
        echo 'Ваша заявка успешно отправлена';
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}

?>
