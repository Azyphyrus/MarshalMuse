<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Marshal Muse — Developer Tools</title>
  <meta name="description" content="Marshal Muse — a curated toolbox of developer utilities: formatters, playgrounds, API explorers, snippet manager, and more." />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="/assets/css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="h-full m-0 font-sans text-black antialiased leading-relaxed p-8 flex justify-center">
  <div class="w-full max-w-content flex flex-col gap-8" role="main">
    <!-- Header -->
    <header class="flex items-center justify-between gap-5 sticky top-5 z-40 backdrop-blur-sm p-2.5 rounded-xl gradient-bg" aria-label="Main header">
      <a class="flex gap-3 items-center no-underline text-inherit" href="#" aria-label="Marshal Muse home">
        <span class="w-11 h-11 flex-none rounded-lg logo grid place-items-center" aria-hidden="true">
          <!-- Minimal marshaling M icon -->
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect x="0" y="0" width="24" height="24" rx="6" fill="white" opacity="0.06" />
            <path d="M6 17V7l4 6 4-6v10" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </span>
        <div>
          <h1 class="text-base m-0">Marshal Muse</h1>
          <p class="m-0 text-xs text-muted">Tools & playgrounds for developers</p>
        </div>
      </a>

      <!-- Desktop nav -->
      <nav class="hidden md:flex gap-4 items-center ml-auto" aria-label="Primary">
        <a class="text-muted no-underline text-sm py-2 px-3 rounded-lg hover:text-white hover:bg-glass-2 focus:text-white focus:outline-none focus:bg-glass-2" href="#tools">Tools</a>
        <a class="text-muted no-underline text-sm py-2 px-3 rounded-lg hover:text-white hover:bg-glass-2 focus:text-white focus:outline-none focus:bg-glass-2" href="#features">Features</a>
        <a class="text-muted no-underline text-sm py-2 px-3 rounded-lg hover:text-white hover:bg-glass-2 focus:text-white focus:outline-none focus:bg-glass-2" href="#showcase">Showcase</a>
        <a class="text-muted no-underline text-sm py-2 px-3 rounded-lg hover:text-white hover:bg-glass-2 focus:text-white focus:outline-none focus:bg-glass-2" href="#pricing">Pricing</a>
        <a class="inline-block py-2.5 px-3.5 rounded-lg cta-gradient text-white no-underline font-semibold text-sm" href="<?= BASE_URL ?>index.php?url=signup">Get started</a>
      </nav>

      <!-- Mobile hamburger + checkbox -->
      <input type="checkbox" id="menu" class="hidden absolute opacity-0 pointer-events-none" aria-hidden="true">
      <label for="menu" class="md:hidden w-11 h-11 rounded-lg flex items-center justify-center glass-bg border-none text-muted cursor-pointer" aria-hidden="false" aria-label="Toggle menu" tabindex="0">
        <!-- simple hamburger -->
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
          <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
        </svg>
      </label>
    </header>

    <!-- Mobile menu panel -->
    <nav class="mobile-menu overflow-hidden max-h-0 opacity-0 pointer-events-none gradient-bg rounded-xl px-0 py-0 border border-white/5" role="navigation" aria-label="Mobile menu">
      <a class="block py-3 px-2 text-muted no-underline rounded-lg hover:bg-glass-2 hover:text-white" href="#tools">Tools</a>
      <a class="block py-3 px-2 text-muted no-underline rounded-lg hover:bg-glass-2 hover:text-white" href="#features">Features</a>
      <a class="block py-3 px-2 text-muted no-underline rounded-lg hover:bg-glass-2 hover:text-white" href="#showcase">Showcase</a>
      <a class="block py-3 px-2 text-muted no-underline rounded-lg hover:bg-glass-2 hover:text-white" href="#pricing">Pricing</a>
      <a class="inline-block my-3 mx-2 py-2.5 px-3.5 rounded-lg cta-gradient text-white no-underline font-semibold text-sm" href="<?= BASE_URL ?>index.php?url=signup">Get started</a>
    </nav>

    <!-- HERO -->
    <section class="grid md:grid-cols-[1fr_420px] lg:grid-cols-[1fr_420px] gap-7 items-center card-gradient p-8 rounded-custom" aria-label="Marshal Muse hero">
      <div>
        <div class="inline-flex gap-2.5 items-center text-xs text-muted mb-3">
          <span class="bg-white/3 py-1.5 px-2.5 rounded-full font-semibold text-[#cfefff] text-xs">All-in-one</span>
          <span class="text-muted">Free & open tools • No install</span>
        </div>

        <h2 class="m-0 mb-3 text-4xl leading-none tracking-tight">Marshal Muse — your developer toolbox</h2>
        <p class="m-0 mb-5 text-muted text-base max-w-[62ch]">Instantly access formatters, mock servers, API explorers, snippet manager, playgrounds, and more — optimized for speed and privacy. Build faster with fewer context switches.</p>

        <div class="flex gap-3 flex-wrap">
          <a class="inline-block py-2.5 px-3.5 rounded-lg cta-gradient text-white no-underline font-semibold text-sm" href="#tools" id="start">Explore tools</a>
          <a class="inline-block py-2 px-3 rounded-lg bg-transparent border border-white/6 text-muted no-underline font-semibold text-sm" href="#features">See features</a>
        </div>

        <div class="mt-4 text-muted text-xs flex gap-3 flex-wrap">
          <span class="text-xs py-1.5 px-2 rounded-full bg-white/2 text-muted">Formatters</span>
          <span class="text-xs py-1.5 px-2 rounded-full bg-white/2 text-muted">Playgrounds</span>
          <span class="text-xs py-1.5 px-2 rounded-full bg-white/2 text-muted">API inspector</span>
          <span class="text-xs py-1.5 px-2 rounded-full bg-white/2 text-muted">Snippet manager</span>
          <span class="text-xs py-1.5 px-2 rounded-full bg-white/2 text-muted">Team workspaces</span>
        </div>
      </div>

      <!-- Tools preview column -->
      <aside class="p-4 rounded-xl gradient-bg border border-white/2" aria-label="Quick tools preview">
        <div class="flex justify-between items-center mb-3">
          <strong class="text-sm">Quick tools</strong>
          <small class="text-muted text-xs">Hit a tool and try it</small>
        </div>

        <div class="grid gap-3" role="list">
          <div class="flex gap-3 items-center p-3 rounded-lg feature-gradient border border-white/2" role="listitem">
            <svg class="w-9 h-9 flex-none rounded-lg p-1.5 bg-white/2" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect x="2" y="4" width="20" height="16" rx="2" stroke="white" stroke-opacity="0.06" stroke-width="0.8" />
              <path d="M7 8h10M7 12h6" stroke="white" stroke-width="1.4" stroke-linecap="round" />
            </svg>
            <div>
              <h4 class="m-0 text-sm">Code Formatter</h4>
              <p class="m-0 text-muted text-xs">Auto-format JS, TS, JSON, CSS and more.</p>
            </div>
          </div>

          <div class="flex gap-3 items-center p-3 rounded-lg feature-gradient border border-white/2" role="listitem">
            <svg class="w-9 h-9 flex-none rounded-lg p-1.5 bg-white/2" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect x="2" y="3" width="20" height="18" rx="2" stroke="white" stroke-opacity="0.06" stroke-width="0.8" />
              <path d="M7 9h10M7 13h10" stroke="white" stroke-width="1.4" stroke-linecap="round" />
              <circle cx="17" cy="7" r="1" fill="white" opacity="0.9" />
            </svg>
            <div>
              <h4 class="m-0 text-sm">API Inspector</h4>
              <p class="m-0 text-muted text-xs">Send requests, view responses, and mock endpoints.</p>
            </div>
          </div>

          <div class="flex gap-3 items-center p-3 rounded-lg feature-gradient border border-white/2" role="listitem">
            <svg class="w-9 h-9 flex-none rounded-lg p-1.5 bg-white/2" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect x="3" y="4" width="18" height="16" rx="2" stroke="white" stroke-opacity="0.06" stroke-width="0.8" />
              <path d="M8 9h8M8 13h8M8 17h8" stroke="white" stroke-width="1.4" stroke-linecap="round" />
            </svg>
            <div>
              <h4 class="m-0 text-sm">Snippet Vault</h4>
              <p class="m-0 text-muted text-xs">Save and search reusable code snippets.</p>
            </div>
          </div>

          <div class="flex gap-3 items-center p-3 rounded-lg feature-gradient border border-white/2" role="listitem">
            <svg class="w-9 h-9 flex-none rounded-lg p-1.5 bg-white/2" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect x="2.5" y="3.5" width="19" height="17" rx="2" stroke="white" stroke-opacity="0.06" stroke-width="0.8" />
              <path d="M7 11h10M7 15h6" stroke="white" stroke-width="1.4" stroke-linecap="round" />
              <path d="M12 7v2" stroke="white" stroke-width="1.4" stroke-linecap="round" />
            </svg>
            <div>
              <h4 class="m-0 text-sm">Playground</h4>
              <p class="m-0 text-muted text-xs">Run snippets and preview live outputs.</p>
            </div>
          </div>
        </div>
      </aside>
    </section>

    <!-- Features -->
    <section id="features" class="grid md:grid-cols-2 lg:grid-cols-3 gap-4" aria-label="Features">
      <div class="bg-card p-4 rounded-xl border border-white/2 card-shadow">
        <h3 class="m-0 mb-2 text-base">Lightning-fast</h3>
        <p class="m-0 text-muted text-xs">Tools optimized for instant feedback — minimal latency, no heavy loading states. Jump from idea to output in seconds.</p>
        <small class="text-muted block mt-2 text-xs">Local-first UX, server-assisted where needed.</small>
      </div>

      <div class="bg-card p-4 rounded-xl border border-white/2 card-shadow">
        <h3 class="m-0 mb-2 text-base">Privacy-first</h3>
        <p class="m-0 text-muted text-xs">Content stays private — when needed you can run tools locally or in ephemeral sandboxes. Clear data policies and export controls.</p>
        <small class="text-muted block mt-2 text-xs">Export or self-host any snippets & projects.</small>
      </div>

      <div class="bg-card p-4 rounded-xl border border-white/2 card-shadow">
        <h3 class="m-0 mb-2 text-base">Composable</h3>
        <p class="m-0 text-muted text-xs">Connect tools into workflows: format → lint → test → deploy. Share flows with teammates or save as templates.</p>
        <small class="text-muted block mt-2 text-xs">Integrations: Git, CI snippets, Webhooks.</small>
      </div>
    </section>

    <!-- Showcase / code preview -->
    <section id="showcase" class="showcase-gradient p-4 rounded-xl border border-white/2 grid gap-3" aria-label="Showcase">
      <div class="flex justify-between items-center">
        <strong>Try this — JSON formatter</strong>
        <div class="text-muted text-xs">Paste / format / copy</div>
      </div>

      <pre class="m-0 p-3 rounded-lg overflow-auto font-mono pre-gradient text-xs text-[#e6eef8]" aria-live="polite" role="region" tabindex="0">
// Example: JSON formatter output
{
  "name": "marshal-muse",
  "tools": [
    "formatter",
    "api-inspector",
    "snippet-vault",
    "playground",
    "mock-server"
  ],
  "version": "0.1.0",
  "features": {
    "fast": true,
    "privacy_first": true,
    "open": true
  }
}
      </pre>

      <div class="flex gap-3 justify-end">
        <a class="inline-block py-2.5 px-3.5 rounded-lg cta-gradient text-white no-underline font-semibold text-sm" href="#tools">Open Formatter</a>
        <a class="inline-block py-2 px-3 rounded-lg bg-transparent border border-white/6 text-muted no-underline font-semibold text-sm" href="#pricing">Pricing</a>
      </div>
    </section>

    <!-- Tools gallery -->
    <section id="tools" class="grid gap-4" aria-label="Tools">
      <div class="flex justify-between items-end gap-3">
        <div>
          <h2 class="m-0 mb-1.5 text-2xl">Tools</h2>
          <p class="text-muted m-0 text-sm">A curated set of utilities to speed up development.</p>
        </div>
        <div class="text-muted text-xs">Explore — Try — Integrate</div>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3">
        <article class="bg-card p-4 rounded-xl border border-white/2 card-shadow" aria-labelledby="t1">
          <h3 id="t1" class="m-0 mb-2 text-base">Formatter</h3>
          <p class="text-muted m-0 text-xs">Multi-language code formatting with config profiles.</p>
        </article>

        <article class="bg-card p-4 rounded-xl border border-white/2 card-shadow" aria-labelledby="t2">
          <h3 id="t2" class="m-0 mb-2 text-base">API Inspector</h3>
          <p class="text-muted m-0 text-xs">HTTP client with history, collections, and mock endpoints.</p>
        </article>

        <article class="bg-card p-4 rounded-xl border border-white/2 card-shadow" aria-labelledby="t3">
          <h3 id="t3" class="m-0 mb-2 text-base">Snippet Vault</h3>
          <p class="text-muted m-0 text-xs">Organize, tag, and quickly reuse snippets.</p>
        </article>

        <article class="bg-card p-4 rounded-xl border border-white/2 card-shadow" aria-labelledby="t4">
          <h3 id="t4" class="m-0 mb-2 text-base">Playground</h3>
          <p class="text-muted m-0 text-xs">Sandboxed runtimes to preview code & UI components.</p>
        </article>

        <article class="bg-card p-4 rounded-xl border border-white/2 card-shadow" aria-labelledby="t5">
          <h3 id="t5" class="m-0 mb-2 text-base">Mock Server</h3>
          <p class="text-muted m-0 text-xs">Create deterministic mock APIs for local dev and tests.</p>
        </article>

        <article class="bg-card p-4 rounded-xl border border-white/2 card-shadow" aria-labelledby="t6">
          <h3 id="t6" class="m-0 mb-2 text-base">Team Workspaces</h3>
          <p class="text-muted m-0 text-xs">Share collections, snippets, and flows with your team.</p>
        </article>
      </div>
    </section>

    <!-- Pricing teaser -->
    <section id="pricing" class="flex gap-3 items-stretch flex-wrap">
      <div class="flex-1 min-w-[280px] bg-card p-4 rounded-xl border border-white/2 card-shadow">
        <h3 class="m-0 mb-2 text-base">Start for free</h3>
        <p class="text-muted m-0 text-xs">Free tier includes most tools, unlimited local snippets, and community support.</p>
        <small class="text-muted block mt-2 text-xs">Upgrade for team features and priority support.</small>
      </div>

      <div class="flex-1 min-w-[280px] bg-card p-4 rounded-xl border border-white/2 card-shadow">
        <h3 class="m-0 mb-2 text-base">Pro & Teams</h3>
        <p class="text-muted m-0 text-xs">Per-user pricing for advanced integrations, SSO, and private hosting options.</p>
        <small class="text-muted block mt-2 text-xs">Contact sales for custom plans.</small>
      </div>
    </section>

    <!-- Footer -->
    <footer class="flex justify-between items-center py-3 px-4 rounded-xl gradient-bg border border-white/2" aria-label="Site footer">
      <small class="text-muted">© <strong>Marshal Muse</strong> — made for developers • 2025</small>
      <div class="flex gap-3 items-center">
        <a class="text-muted no-underline" href="#">Privacy</a>
        <a class="text-muted no-underline" href="#">Docs</a>
        <a class="text-muted no-underline" href="#">GitHub</a>
      </div>
    </footer>
  </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="/assets/js/tailwind-config.js"></script>
</html>