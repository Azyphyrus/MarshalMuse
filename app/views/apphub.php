<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App Hub — Marshal Muse</title>

  <!-- Tailwind & Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter Tight', 'sans-serif'] },
          borderRadius: { custom: '1.25rem' },
          colors: { muted: 'rgba(0,0,0,0.55)' }
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
    .cta-gradient {
      background: linear-gradient(90deg, #FF416C 0%, #FF4B2B 100%);
      color: white;
    }
    .card-shadow {
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }
  </style>
</head>

<body class="font-sans antialiased p-6 flex flex-col gap-8">

  <!-- HEADER -->
  <header class="flex items-center justify-between sticky top-4 z-40 p-4 rounded-xl gradient-bg border border-black/5 card-shadow">
    <div class="flex items-center gap-3">
      <span class="w-10 h-10 flex-none rounded-lg grid place-items-center bg-black/5">
        <svg class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="none">
          <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
      </span>
      <div>
        <h1 class="text-base font-semibold">App Hub</h1>
        <p class="text-xs text-muted">AI tools, dev utilities, and creative modules</p>
      </div>
    </div>

    <a href="<?= BASE_URL ?>index.php?url=logout"
       class="text-sm font-semibold px-3 py-2 rounded-lg cta-gradient hover:opacity-90 transition">
      Logout
    </a>
  </header>

  <!-- MAIN -->
  <main class="max-w-6xl mx-auto w-full card-shadow gradient-bg rounded-custom p-8 border border-black/10">
    <h2 class="text-xl font-semibold mb-6">Your Tools</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Flowchart Creator -->
      <a href="<?= BASE_URL ?>index.php?url=flowchart" class="group block rounded-2xl p-5 gradient-bg border border-black/10 card-shadow hover:shadow-lg hover:-translate-y-1 transition">
        <div class="flex items-center justify-between mb-4">
          <span class="w-10 h-10 rounded-lg grid place-items-center bg-blue-100 text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M6 8h12M6 16h12M8 8v8M16 8v8" />
            </svg>
          </span>
          <span class="text-xs font-medium px-2 py-1 rounded-full bg-blue-50 text-blue-600">Flowchart</span>
        </div>
        <h3 class="text-lg font-semibold mb-1">Flowchart Creator</h3>
        <p class="text-sm text-muted">Design interactive flowcharts and process diagrams visually.</p>
      </a>

      <!-- AI Prompt Generator -->
      <a href="<?= BASE_URL ?>index.php?url=prompt-generator" class="group block rounded-2xl p-5 gradient-bg border border-black/10 card-shadow hover:shadow-lg hover:-translate-y-1 transition">
        <div class="flex items-center justify-between mb-4">
          <span class="w-10 h-10 rounded-lg grid place-items-center bg-pink-100 text-pink-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M12 20h9M3 4h18M4 8h16M5 12h14M7 16h10" />
            </svg>
          </span>
          <span class="text-xs font-medium px-2 py-1 rounded-full bg-pink-50 text-pink-600">AI Prompt</span>
        </div>
        <h3 class="text-lg font-semibold mb-1">AI Prompt Generator</h3>
        <p class="text-sm text-muted">Craft, refine, and save AI prompts for creative projects.</p>
      </a>

      <!-- Base64 Encoder/Decoder -->
      <a href="<?= BASE_URL ?>index.php?url=base64" class="group block rounded-2xl p-5 gradient-bg border border-black/10 card-shadow hover:shadow-lg hover:-translate-y-1 transition">
        <div class="flex items-center justify-between mb-4">
          <span class="w-10 h-10 rounded-lg grid place-items-center bg-orange-100 text-orange-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </span>
          <span class="text-xs font-medium px-2 py-1 rounded-full bg-orange-50 text-orange-600">Base64</span>
        </div>
        <h3 class="text-lg font-semibold mb-1">Base64 Encoder / Decoder</h3>
        <p class="text-sm text-muted">Convert text or files to and from Base64 instantly.</p>
      </a>

      <!-- Hash Generator -->
      <a href="<?= BASE_URL ?>index.php?url=hash-generator" class="group block rounded-2xl p-5 gradient-bg border border-black/10 card-shadow hover:shadow-lg hover:-translate-y-1 transition">
        <div class="flex items-center justify-between mb-4">
          <span class="w-10 h-10 rounded-lg grid place-items-center bg-green-100 text-green-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M12 6v6l4 2m-4 4a9 9 0 110-18 9 9 0 010 18z" />
            </svg>
          </span>
          <span class="text-xs font-medium px-2 py-1 rounded-full bg-green-50 text-green-600">Hash</span>
        </div>
        <h3 class="text-lg font-semibold mb-1">Hash Generator</h3>
        <p class="text-sm text-muted">Generate MD5, SHA, and custom hash digests securely.</p>
      </a>

      <!-- Code Snippet -->
      <a href="<?= BASE_URL ?>index.php?url=code-snippet" class="group block rounded-2xl p-5 gradient-bg border border-black/10 card-shadow hover:shadow-lg hover:-translate-y-1 transition">
        <div class="flex items-center justify-between mb-4">
          <span class="w-10 h-10 rounded-lg grid place-items-center bg-purple-100 text-purple-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M16 18l6-6-6-6M8 6l-6 6 6 6" />
            </svg>
          </span>
          <span class="text-xs font-medium px-2 py-1 rounded-full bg-purple-50 text-purple-600">Snippet</span>
        </div>
        <h3 class="text-lg font-semibold mb-1">Code Snippet</h3>
        <p class="text-sm text-muted">Save, organize, and reuse your favorite code blocks.</p>
      </a>

      <!-- JSON Visualizer -->
      <a href="<?= BASE_URL ?>index.php?url=json-visualizer" class="group block rounded-2xl p-5 gradient-bg border border-black/10 card-shadow hover:shadow-lg hover:-translate-y-1 transition">
        <div class="flex items-center justify-between mb-4">
          <span class="w-10 h-10 rounded-lg grid place-items-center bg-cyan-100 text-cyan-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 8h16M4 16h16M8 4v16" />
            </svg>
          </span>
          <span class="text-xs font-medium px-2 py-1 rounded-full bg-cyan-50 text-cyan-600">JSON</span>
        </div>
        <h3 class="text-lg font-semibold mb-1">JSON Visualizer</h3>
        <p class="text-sm text-muted">Pretty-print and navigate JSON structures effortlessly.</p>
      </a>

      <!-- Kanban Board -->
      <a href="<?= BASE_URL ?>index.php?url=kanban" class="group block rounded-2xl p-5 gradient-bg border border-black/10 card-shadow hover:shadow-lg hover:-translate-y-1 transition">
        <div class="flex items-center justify-between mb-4">
          <span class="w-10 h-10 rounded-lg grid place-items-center bg-yellow-100 text-yellow-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </span>
          <span class="text-xs font-medium px-2 py-1 rounded-full bg-yellow-50 text-yellow-600">Kanban</span>
        </div>
        <h3 class="text-lg font-semibold mb-1">Kanban Board</h3>
        <p class="text-sm text-muted">Organize projects visually with a drag-and-drop task board.</p>
      </a>

    </div>
  </main>

  <!-- FOOTER -->
  <footer class="flex justify-between items-center py-3 px-4 rounded-xl gradient-bg border border-black/10 mt-10 card-shadow">
    <small class="text-muted text-xs">© Marshal Muse Tools - Alpha V1.2.3 • 2025</small>
    <div class="flex gap-3 text-xs">
      <a href="#" class="text-muted hover:text-black">Docs</a>
      <a href="#" class="text-muted hover:text-black">Support</a>
      <a href="#" class="text-muted hover:text-black">GitHub</a>
    </div>
  </footer>

</body>
</html>
