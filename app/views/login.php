<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login — Marshal Muse</title>
  <meta name="description" content="Login to Marshal Muse — your all-in-one developer toolbox." />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="/assets/css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/assets/js/tailwind-config.js"></script>
</head>

<body class="h-screen m-0 font-sans text-black antialiased leading-relaxed flex items-center justify-center p-6 gradient-bg">
  <main class="w-full max-w-md bg-card p-8 rounded-xl border border-white/10 shadow-lg backdrop-blur-sm">
    <header class="flex items-center gap-3 mb-6">
      <span class="w-11 h-11 flex-none rounded-lg logo grid place-items-center gradient-bg">
        <!-- Marshal Muse Icon -->
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
          <rect width="24" height="24" rx="6" fill="Black" opacity="0.8" />
          <path d="M6 17V7l4 6 4-6v10" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </span>
      <div>
        <h1 class="text-base m-0">Marshal Muse</h1>
        <p class="m-0 text-xs text-muted">Developer Toolbox</p>
      </div>
    </header>

    <h2 class="text-xl font-semibold mb-2">Sign in to your account</h2>
    <p class="text-sm text-muted mb-6">Access your tools, snippets, and workspaces.</p>

    <form class="flex flex-col gap-4" action="<?= BASE_URL ?>index.php?url=login/authenticate" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium mb-1 text-muted">Email</label>
        <input type="email" id="identifier" name="identifier" required
          class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-sm text-muted placeholder-muted focus:outline-none focus:ring-2 focus:ring-glass-2" placeholder="you@devmail.com" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium mb-1 text-muted">Password</label>
        <input type="password" id="password" name="password" required
          class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-sm text-muted placeholder-muted focus:outline-none focus:ring-2 focus:ring-glass-2" placeholder="••••••••" />
      </div>

      <div class="flex justify-between items-center text-sm mt-2">
        <label class="inline-flex items-center gap-2 text-muted">
          <input type="checkbox" class="form-checkbox rounded bg-white/10 border-white/20" />
          Remember me
        </label>
        <a href="/forgot-password" class="text-muted hover:text-white">Forgot password?</a>
      </div>
      
        <?php if (!empty($data['error'])): ?>
            <div class="bg-red-500/20 text-red-300 p-3 mb-4 rounded">
            <?= htmlspecialchars($data['error']); ?>
            </div>
        <?php endif; ?>

      <button type="submit"
        class="mt-4 inline-block py-2.5 px-4 rounded-lg cta-gradient text-white font-semibold text-sm text-center">
        Sign in
      </button>
    </form>

    <p class="mt-6 text-center text-sm text-muted">
      Don’t have an account?
      <a href="/register" class="text-muted font-medium hover:underline">Create one</a>
    </p>
  </main>
</body>

</html>
