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

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter Tight', 'sans-serif'] },
          colors: {
            muted: 'rgba(0,0,0,0.55)',
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
      background: radial-gradient(circle at top left, #f8fafc, #eef2f7 70%);
      color: #111;
      min-height: 100vh;
    }

    .gradient-bg {
      background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(255,255,255,0.85));
      backdrop-filter: blur(16px);
      border: 1px solid rgba(0,0,0,0.05);
    }

    .card-gradient {
      background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(255,255,255,0.85));
      border: 1px solid rgba(0,0,0,0.05);
    }

    .cta-gradient {
      background: linear-gradient(90deg, #007CF0 0%, #00DFD8 100%);
      color: white;
    }

    .card-shadow {
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }
  </style>
</head>

<body class="font-sans antialiased leading-relaxed p-6 flex flex-col gap-6">

  <!-- HEADER -->
  <header class="flex items-center justify-between sticky top-4 z-40 p-3 rounded-xl gradient-bg border border-black/5 card-shadow">
    <div class="flex items-center gap-3">
      <span class="w-10 h-10 flex-none rounded-lg grid place-items-center bg-black/5">
        <svg class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6 17V7l4 6 4-6v10" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>
      <div>
        <h1 class="text-base font-semibold">Roles Management</h1>
        <p class="text-xs text-muted">Create, edit, and delete system roles</p>
      </div>
    </div>

    <a href="<?= BASE_URL ?>index.php?url=admin"
       class="text-sm font-semibold px-3 py-2 rounded-lg cta-gradient hover:opacity-90 transition">
      ← Back to Dashboard
    </a>
  </header>

  <!-- MAIN -->
  <main class="w-full max-w-5xl mx-auto flex-1 card-gradient p-6 rounded-custom border border-black/10 card-shadow">
    <!-- Create New Role -->
    <section>
      <h2 class="text-lg font-semibold mb-3">Create New Role</h2>
      <form action="<?= BASE_URL ?>index.php?url=role/create" method="POST"
            class="flex flex-col sm:flex-row gap-3 mb-8">
        <input type="text" name="name" placeholder="Role name"
               class="border border-black/10 rounded-lg px-3 py-2 flex-1 focus:outline-none focus:ring-2 focus:ring-[#00DFD8]" required>
        <input type="text" name="description" placeholder="Description"
               class="border border-black/10 rounded-lg px-3 py-2 flex-1 focus:outline-none focus:ring-2 focus:ring-[#00DFD8]">
        <button type="submit"
                class="px-4 py-2 rounded-lg cta-gradient text-white font-semibold text-sm hover:opacity-90 transition">
          Add Role
        </button>
      </form>
    </section>

    <!-- Existing Roles -->
    <section>
      <h2 class="text-lg font-semibold mb-3">Existing Roles</h2>

      <div class="overflow-x-auto rounded-xl border border-black/10">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-gray-50 border-b text-sm text-gray-600">
              <th class="py-2 px-3">Name</th>
              <th class="py-2 px-3">Description</th>
              <th class="py-2 px-3 text-right">Actions</th>
            </tr>
          </thead>
          <tbody class="text-sm text-gray-700">
            <?php foreach ($roles as $role): ?>
              <tr class="border-b hover:bg-gray-100/70 transition">
                <form action="<?= BASE_URL ?>index.php?url=role/update" method="POST">
                  <input type="hidden" name="id" value="<?= htmlspecialchars($role['id']) ?>">
                  <td class="py-2 px-3">
                    <input type="text" name="name"
                           value="<?= htmlspecialchars($role['name']) ?>"
                           class="border border-gray-300 rounded-lg px-2 py-1 w-full focus:outline-none focus:ring-1 focus:ring-[#00DFD8]">
                  </td>
                  <td class="py-2 px-3">
                    <input type="text" name="description"
                           value="<?= htmlspecialchars($role['description'] ?? '') ?>"
                           class="border border-gray-300 rounded-lg px-2 py-1 w-full focus:outline-none focus:ring-1 focus:ring-[#00DFD8]">
                  </td>
                  <td class="py-2 px-3 text-right">
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg text-xs font-medium transition">
                      Save
                    </button>
                    <a href="<?= BASE_URL ?>index.php?url=role/delete/<?= htmlspecialchars($role['id']) ?>"
                       onclick="return confirm('Delete this role?');"
                       class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-medium ml-2 transition">
                      Delete
                    </a>
                  </td>
                </form>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="flex justify-between items-center py-3 px-4 rounded-xl gradient-bg border border-black/10 mt-10 card-shadow">
    <small class="text-muted text-xs">© Marshal Muse Admin • 2025</small>
    <div class="flex gap-3 text-xs">
      <a href="#" class="text-muted hover:text-black">Docs</a>
      <a href="#" class="text-muted hover:text-black">Support</a>
      <a href="#" class="text-muted hover:text-black">GitHub</a>
    </div>
  </footer>

</body>
</html>
