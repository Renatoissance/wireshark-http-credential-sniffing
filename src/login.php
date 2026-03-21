<?php
// Empfängt die Daten und gibt eine einfache Bestätigung aus
$user = $_POST['username'] ?? 'Unbekannt';
echo "<h1>Daten empfangen!</h1>";
echo "Vielen Dank, " . htmlspecialchars($user) . ". In Wireshark siehst du nun das Passwort!";
?>