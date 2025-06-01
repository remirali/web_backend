<?php
// Database connection
$host = 'localhost';
$dbname = 'u68754';
$username = 'u68754'; // Replace with your MySQL username
$password = '5610469'; // Replace with your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Fetch all contacts
$stmt = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админ-панель - Лавандовый Путь</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fadeIn 1s ease-out forwards;
    }
    table tr:hover {
      background-color: rgba(200, 162, 200, 0.1);
    }
  </style>
</head>
<body class="bg-gradient-to-b from-purple-100 to-white font-sans">
  <!-- Header -->
  <header class="bg-gradient-to-r from-purple-200 to-purple-400 text-white py-6 sticky top-0 z-10">
    <div class="container mx-auto text-center animate-fade-in">
      <h1 class="text-4xl font-bold">Админ-панель - Лавандовый Путь</h1>
      <p class="mt-2 text-lg">Управление заявками клиентов</p>
    </div>
  </header>

  <!-- Contacts Table -->
  <section class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center text-purple-600 animate-fade-in">Заявки клиентов</h2>
    <div class="mt-8 overflow-x-auto">
      <table class="min-w-full bg-white rounded-lg shadow-lg">
        <thead>
          <tr class="bg-purple-200 text-white">
            <th class="py-3 px-6 text-left">ID</th>
            <th class="py-3 px-6 text-left">Имя</th>
            <th class="py-3 px-6 text-left">Электронная почта</th>
            <th class="py-3 px-6 text-left">Телефон</th>
            <th class="py-3 px-6 text-left">Сообщение</th>
            <th class="py-3 px-6 text-left">Дата</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($contacts as $contact): ?>
            <tr class="border-b animate-fade-in">
              <td class="py-3 px-6"><?php echo htmlspecialchars($contact['id']); ?></td>
              <td class="py-3 px-6"><?php echo htmlspecialchars($contact['name']); ?></td>
              <td class="py-3 px-6"><?php echo htmlspecialchars($contact['email']); ?></td>
              <td class="py-3 px-6"><?php echo htmlspecialchars($contact['phone']); ?></td>
              <td class="py-3 px-6"><?php echo htmlspecialchars($contact['message'] ?? ''); ?></td>
              <td class="py-3 px-6"><?php echo htmlspecialchars($contact['created_at']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-purple-200 to-purple-400 text-white py-6">
    <div class="container mx-auto text-center">
      <p>© 2025 Тур Агенство Лавандовый Путь. Все права защищены.</p>
    </div>
  </footer>
</body>
</html>
