<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <!-- Fonts & Tailwind -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind Custom Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter Tight', 'sans-serif'] },
          colors: {
            muted: '#6b7280', // neutral gray
            primary: '#007CF0',
            accent: '#00DFD8'
          },
          borderRadius: {
            custom: '1.25rem',
          }
        }
      }
    }
  </script>

  <style>
    body {
      background: #f9fafb;
      color: #111827;
      min-height: 100vh;
    }

    .gradient-bg {
      background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(245, 246, 248, 0.9));
      backdrop-filter: blur(16px);
    }

    .card-gradient {
      background: linear-gradient(145deg, #ffffff, #f3f4f6);
    }

    .cta-gradient {
      background: linear-gradient(90deg, #007CF0 0%, #00DFD8 100%);
    }

    .card-shadow {
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    a:hover {
      text-decoration: none;
    }
  </style>
</head>

<body class="font-sans antialiased leading-relaxed p-6 flex flex-col gap-6">

  <!-- HEADER -->
  <header class="flex items-center justify-between sticky top-4 z-40 p-3 rounded-xl gradient-bg border border-gray-200 shadow-sm">
    <div class="flex items-center gap-3">
      <span class="w-10 h-10 flex-none rounded-lg grid place-items-center bg-black/5">
        <svg class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6 17V7l4 6 4-6v10" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>
      <div>
        <h1 class="text-base font-semibold text-gray-800">Marshal Muse — Admin</h1>
        <p class="text-xs text-gray-500">Control panel & system management</p>
      </div>
    </div>

    <div class="flex items-center gap-3">
      <span class="text-sm text-gray-600">Welcome, <?= htmlspecialchars($user['username']) ?></span>
      <a href="<?= BASE_URL ?>index.php?url=logout"
         class="text-sm font-semibold px-3 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
        Logout
      </a>
    </div>
  </header>

  <!-- MAIN -->
  <main class="w-full max-w-6xl mx-auto flex-1">
    <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

      <!-- Manage Roles -->
      <a href="<?= BASE_URL ?>index.php?url=admin/roles"
         class="card-gradient p-6 rounded-custom border border-gray-200 hover:border-blue-300 transition flex flex-col justify-center items-center text-center card-shadow hover:scale-[1.02] duration-200">
        <svg class="w-10 h-10 mb-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4v16m8-8H4"/>
        </svg>
        <h2 class="text-base font-semibold text-gray-800 mb-1">Manage Roles</h2>
        <p class="text-xs text-gray-500">View and edit user roles and permissions.</p>
      </a>

      <!-- Manage Users -->
      <a href="<?= BASE_URL ?>index.php?url=admin/users"
         class="card-gradient p-6 rounded-custom border border-gray-200 hover:border-blue-300 transition flex flex-col justify-center items-center text-center card-shadow hover:scale-[1.02] duration-200">
        <svg class="w-10 h-10 mb-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                d="M17 20h5V10h-5m-4 10H3V4h10v16z"/>
        </svg>
        <h2 class="text-base font-semibold text-gray-800 mb-1">Manage Users</h2>
        <p class="text-xs text-gray-500">View all registered users and accounts.</p>
      </a>

      <!-- System Logs -->
      <div class="card-gradient p-6 rounded-custom border border-gray-200 opacity-60 cursor-not-allowed flex flex-col justify-center items-center text-center card-shadow">
        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                d="M9 17v-2h6v2m-7-4h8m-8-4h8M5 6h14M5 6v14a2 2 0 002 2h10a2 2 0 002-2V6"/>
        </svg>
        <h2 class="text-base font-semibold text-gray-400 mb-1">System Logs</h2>
        <p class="text-xs text-gray-400">Coming soon</p>
      </div>

    </section>
  </main>

  <!-- FOOTER -->
  <footer class="flex justify-between items-center py-3 px-4 rounded-xl gradient-bg border border-gray-200 mt-10 shadow-sm">
    <small class="text-gray-500 text-xs">© Marshal Muse Admin • 2025</small>
    <div class="flex gap-3 text-xs">
      <a href="#" class="text-gray-500 hover:text-blue-600">Docs</a>
      <a href="#" class="text-gray-500 hover:text-blue-600">Support</a>
      <a href="#" class="text-gray-500 hover:text-blue-600">GitHub</a>
    </div>
  </footer>

</body>
</html>
