<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Marshal Muse — Developer Tools</title>
  <meta name="description" content="Marshal Muse — a curated toolbox of developer utilities: formatters, playgrounds, API explorers, snippet manager, and more." />

  <style>
    /* ===========================
       Marshal Muse — Landing Page
       Pure HTML + CSS (no JS)
       =========================== */

    :root{
      --bg: #0f1724;
      --card: #0b1220;
      --muted: #98a0b3;
      --glass: rgba(255,255,255,0.04);
      --accent: linear-gradient(90deg,#6EE7B7 0%, #60A5FA 50%, #A78BFA 100%);
      --accent-solid: #60A5FA;
      --glass-2: rgba(255,255,255,0.03);
      --radius: 14px;
      --maxwidth: 1200px;
      --focus: 3px solid rgba(96,165,250,0.18);
      --shadow: 0 8px 30px rgba(2,6,23,0.6);
      color-scheme: dark;
    }

    /* Light-mode overrides */
    @media (prefers-color-scheme: light){
      :root{
        --bg: #f6f7fb;
        --card: #ffffff;
        --muted: #4b5563;
        --glass: rgba(2,6,23,0.03);
        --glass-2: rgba(2,6,23,0.02);
        --shadow: 0 10px 30px rgba(16,24,40,0.06);
      }
    }

    /* Basic reset */
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background: radial-gradient(1200px 600px at 10% 10%, rgba(96,165,250,0.04), transparent 6%),
                  radial-gradient(900px 500px at 90% 90%, rgba(167,139,250,0.03), transparent 6%),
                  var(--bg);
      color: #e6eef8;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      line-height:1.4;
      padding: 32px;
      display:flex;
      justify-content:center;
    }

    .wrap{
      width:100%;
      max-width:var(--maxwidth);
      display:flex;
      flex-direction:column;
      gap:32px;
    }

    /* Header / nav */
    header.top {
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:20px;
      position:sticky;
      top:20px;
      z-index:40;
      backdrop-filter: blur(6px);
      padding:10px;
      border-radius:12px;
      background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      box-shadow: var(--shadow);
    }
    .brand{
      display:flex;
      gap:12px;
      align-items:center;
      text-decoration:none;
      color:inherit;
    }
    .logo {
      width:44px;
      height:44px;
      flex:0 0 44px;
      border-radius:10px;
      background:var(--accent);
      display:grid;
      place-items:center;
      box-shadow: 0 6px 18px rgba(96,165,250,0.12), inset 0 -6px 18px rgba(255,255,255,0.06);
    }
    .logo svg{width:26px;height:26px;filter:drop-shadow(0 4px 10px rgba(0,0,0,0.25))}
    .brand h1{font-size:16px;margin:0}
    .brand p{margin:0;font-size:12px;color:var(--muted)}

    /* Nav links - desktop */
    nav.desktop {
      display:flex;
      gap:18px;
      align-items:center;
      margin-left:auto;
    }
    nav.desktop a{
      color:var(--muted);
      text-decoration:none;
      font-size:14px;
      padding:8px 12px;
      border-radius:10px;
    }
    nav.desktop a:hover, nav.desktop a:focus{
      color:#fff;
      outline: none;
      background:var(--glass-2);
    }

    /* CTA */
    .cta {
      display:inline-block;
      padding:10px 14px;
      border-radius:10px;
      background:linear-gradient(90deg,#4f46e5,#06b6d4);
      color:white;
      text-decoration:none;
      font-weight:600;
      font-size:14px;
      box-shadow: 0 8px 30px rgba(79,70,229,0.12);
    }
    .cta.secondary{
      background:transparent;
      border:1px solid rgba(255,255,255,0.06);
      color:var(--muted);
      padding:8px 12px;
    }

    /* Mobile nav toggle (CSS checkbox) */
    .menu-toggle{
      display:none;
    }
    .hamburger{
      display:none;
      width:46px;height:46px;border-radius:10px;align-items:center;justify-content:center;
      background:var(--glass);border:none;color:var(--muted);cursor:pointer;
    }

    /* Hero */
    .hero{
      display:grid;
      grid-template-columns: 1fr 420px;
      gap:28px;
      align-items:center;
      background: linear-gradient(180deg, rgba(255,255,255,0.01), transparent);
      padding:34px;
      border-radius:var(--radius);
      box-shadow: var(--shadow);
    }

    .eyebrow{
      display:inline-flex;
      gap:10px;
      align-items:center;
      font-size:13px;
      color:var(--muted);
      margin-bottom:12px;
    }
    .eyebrow .pill{
      background:rgba(255,255,255,0.03);
      padding:6px 10px;border-radius:999px;font-weight:600;
      color:#cfefff;font-size:12px;
    }

    .hero h2{
      margin:0 0 12px 0;font-size:36px;line-height:1.03;
      letter-spacing:-0.02em;
    }
    .hero p.lead{margin:0 0 20px 0;color:var(--muted);font-size:16px;max-width:62ch}

    .hero .actions{display:flex;gap:12px;flex-wrap:wrap}
    .card-tools{
      padding:18px;border-radius:12px;background:linear-gradient(180deg, rgba(255,255,255,0.01), transparent);
      border:1px solid rgba(255,255,255,0.02);
    }

    /* Tools preview column */
    .tools-grid{
      display:grid;
      gap:12px;
      grid-template-columns: 1fr;
    }
    .tool{
      display:flex;gap:12px;align-items:center;padding:12px;border-radius:10px;
      background:linear-gradient(180deg, rgba(255,255,255,0.01), rgba(255,255,255,0.00));
      border:1px solid rgba(255,255,255,0.02);
    }
    .tool svg{width:36px;height:36px;flex:0 0 36px;border-radius:8px;padding:6px;background:rgba(255,255,255,0.02)}
    .tool h4{margin:0;font-size:15px}
    .tool p{margin:0;color:var(--muted);font-size:13px}

    /* Feature section */
    section.features{
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      gap:18px;
    }
    .feature{
      background:var(--card);
      padding:18px;border-radius:12px;border:1px solid rgba(255,255,255,0.02);
      box-shadow: 0 6px 18px rgba(2,6,23,0.45);
    }
    .feature h3{margin:0 0 8px 0;font-size:16px}
    .feature p{margin:0;color:var(--muted);font-size:13px}
    .feature small{color:var(--muted);display:block;margin-top:8px;font-size:12px}

    /* Tool showcase */
    .showcase{
      background: linear-gradient(180deg, rgba(96,165,250,0.03), transparent);
      padding:18px;border-radius:12px;border:1px solid rgba(255,255,255,0.02);
      display:grid;gap:12px;
    }
    .showcase pre{
      margin:0;
      padding:12px;border-radius:8px;overflow:auto;font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, "Roboto Mono", monospace;
      background: linear-gradient(180deg, rgba(2,6,23,0.40), rgba(2,6,23,0.25));
      font-size:13px;color:#e6eef8;
    }

    /* Footer */
    footer{
      display:flex;justify-content:space-between;align-items:center;padding:14px 18px;border-radius:12px;
      background:linear-gradient(180deg, rgba(255,255,255,0.01), transparent);
      border:1px solid rgba(255,255,255,0.02);
    }
    footer small{color:var(--muted)}

    /* Responsive */
    @media (max-width: 1000px){
      .hero{ grid-template-columns: 1fr 340px }
      section.features{ grid-template-columns: repeat(2,1fr) }
    }
    @media (max-width: 780px){
      body{padding:18px}
      header.top{padding:8px;gap:10px}
      .hamburger{display:flex}
      nav.desktop{display:none}
      .menu-toggle{display:block;position:absolute;opacity:0;pointer-events:none}
      .hero{grid-template-columns:1fr; padding:20px}
      .tools-grid{grid-template-columns: 1fr 1fr}
      section.features{grid-template-columns:1fr}
      .wrap{gap:18px}
    }

    /* mobile menu panel (checkbox hack) */
    #menu:checked ~ .mobile-menu{
      max-height:420px;opacity:1;padding:12px;pointer-events:auto;
    }
    .mobile-menu{
      overflow:hidden;
      transition: all .28s ease;
      max-height:0;opacity:0;pointer-events:none;
      background: linear-gradient(180deg, rgba(255,255,255,0.01), transparent);
      border-radius:12px;padding:0 12px;
      border:1px solid rgba(255,255,255,0.02);
    }
    .mobile-menu a{display:block;padding:12px 8px;color:var(--muted);text-decoration:none;border-radius:8px}
    .mobile-menu a:hover{background:var(--glass-2);color:white}

    /* small helpers */
    .muted{color:var(--muted)}
    .row{display:flex;gap:12px;align-items:center}
    .badge{font-size:12px;padding:6px 8px;border-radius:999px;background:rgba(255,255,255,0.02);color:var(--muted)}
    a:focus{outline:var(--focus);outline-offset:4px}
  </style>
</head>
<body>
  <div class="wrap" role="main">
    <!-- Header -->
    <header class="top" aria-label="Main header">
      <a class="brand" href="#" aria-label="Marshal Muse home">
        <span class="logo" aria-hidden="true">
          <!-- Minimal marshaling M icon -->
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect x="0" y="0" width="24" height="24" rx="6" fill="white" opacity="0.06"/>
            <path d="M6 17V7l4 6 4-6v10" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
        <div>
          <h1>Marshal Muse</h1>
          <p>Tools & playgrounds for developers</p>
        </div>
      </a>

      <!-- Desktop nav -->
      <nav class="desktop" aria-label="Primary">
        <a href="#tools">Tools</a>
        <a href="#features">Features</a>
        <a href="#showcase">Showcase</a>
        <a href="#pricing">Pricing</a>
        <a class="cta" href="#start">Get started</a>
      </nav>

      <!-- Mobile hamburger + checkbox -->
      <input type="checkbox" id="menu" class="menu-toggle" aria-hidden="true">
      <label for="menu" class="hamburger" aria-hidden="false" aria-label="Toggle menu" tabindex="0">
        <!-- simple hamburger -->
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
          <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
      </label>
    </header>

    <!-- Mobile menu panel -->
    <nav class="mobile-menu" role="navigation" aria-label="Mobile menu">
      <a href="#tools">Tools</a>
      <a href="#features">Features</a>
      <a href="#showcase">Showcase</a>
      <a href="#pricing">Pricing</a>
      <a href="#start" class="cta" style="display:inline-block;margin:12px 8px;">Get started</a>
    </nav>

    <!-- HERO -->
    <section class="hero" aria-label="Marshal Muse hero">
      <div>
        <div class="eyebrow">
          <span class="pill">All-in-one</span>
          <span class="muted">Free & open tools • No install</span>
        </div>

        <h2>Marshal Muse — your developer toolbox</h2>
        <p class="lead">Instantly access formatters, mock servers, API explorers, snippet manager, playgrounds, and more — optimized for speed and privacy. Build faster with fewer context switches.</p>

        <div class="actions">
          <a class="cta" href="#tools" id="start">Explore tools</a>
          <a class="cta secondary" href="#features">See features</a>
        </div>

        <div style="margin-top:18px;color:var(--muted);font-size:13px;display:flex;gap:12px;flex-wrap:wrap">
          <span class="badge">Formatters</span>
          <span class="badge">Playgrounds</span>
          <span class="badge">API inspector</span>
          <span class="badge">Snippet manager</span>
          <span class="badge">Team workspaces</span>
        </div>
      </div>

      <!-- Tools preview column -->
      <aside class="card-tools" aria-label="Quick tools preview">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
          <strong style="font-size:15px">Quick tools</strong>
          <small class="muted">Hit a tool and try it</small>
        </div>

        <div class="tools-grid" role="list">
          <div class="tool" role="listitem">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect x="2" y="4" width="20" height="16" rx="2" stroke="white" stroke-opacity="0.06" stroke-width="0.8"/>
              <path d="M7 8h10M7 12h6" stroke="white" stroke-width="1.4" stroke-linecap="round"/>
            </svg>
            <div>
              <h4>Code Formatter</h4>
              <p>Auto-format JS, TS, JSON, CSS and more.</p>
            </div>
          </div>

          <div class="tool" role="listitem">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect x="2" y="3" width="20" height="18" rx="2" stroke="white" stroke-opacity="0.06" stroke-width="0.8"/>
              <path d="M7 9h10M7 13h10" stroke="white" stroke-width="1.4" stroke-linecap="round"/>
              <circle cx="17" cy="7" r="1" fill="white" opacity="0.9"/>
            </svg>
            <div>
              <h4>API Inspector</h4>
              <p>Send requests, view responses, and mock endpoints.</p>
            </div>
          </div>

          <div class="tool" role="listitem">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect x="3" y="4" width="18" height="16" rx="2" stroke="white" stroke-opacity="0.06" stroke-width="0.8"/>
              <path d="M8 9h8M8 13h8M8 17h8" stroke="white" stroke-width="1.4" stroke-linecap="round"/>
            </svg>
            <div>
              <h4>Snippet Vault</h4>
              <p>Save and search reusable code snippets.</p>
            </div>
          </div>

          <div class="tool" role="listitem">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect x="2.5" y="3.5" width="19" height="17" rx="2" stroke="white" stroke-opacity="0.06" stroke-width="0.8"/>
              <path d="M7 11h10M7 15h6" stroke="white" stroke-width="1.4" stroke-linecap="round"/>
              <path d="M12 7v2" stroke="white" stroke-width="1.4" stroke-linecap="round"/>
            </svg>
            <div>
              <h4>Playground</h4>
              <p>Run snippets and preview live outputs.</p>
            </div>
          </div>
        </div>
      </aside>
    </section>

    <!-- Features -->
    <section id="features" class="features" aria-label="Features">
      <div class="feature">
        <h3>Lightning-fast</h3>
        <p>Tools optimized for instant feedback — minimal latency, no heavy loading states. Jump from idea to output in seconds.</p>
        <small>Local-first UX, server-assisted where needed.</small>
      </div>

      <div class="feature">
        <h3>Privacy-first</h3>
        <p>Content stays private — when needed you can run tools locally or in ephemeral sandboxes. Clear data policies and export controls.</p>
        <small>Export or self-host any snippets & projects.</small>
      </div>

      <div class="feature">
        <h3>Composable</h3>
        <p>Connect tools into workflows: format → lint → test → deploy. Share flows with teammates or save as templates.</p>
        <small>Integrations: Git, CI snippets, Webhooks.</small>
      </div>
    </section>

    <!-- Showcase / code preview -->
    <section id="showcase" class="showcase" aria-label="Showcase">
      <div style="display:flex;justify-content:space-between;align-items:center">
        <strong>Try this — JSON formatter</strong>
        <div class="muted" style="font-size:13px">Paste / format / copy</div>
      </div>

      <pre aria-live="polite" role="region" tabindex="0">
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

      <div style="display:flex;gap:12px;justify-content:flex-end">
        <a class="cta" href="#tools">Open Formatter</a>
        <a class="cta secondary" href="#pricing">Pricing</a>
      </div>
    </section>

    <!-- Tools gallery -->
    <section id="tools" aria-label="Tools" style="display:grid;gap:16px">
      <div style="display:flex;justify-content:space-between;align-items:end;gap:12px">
        <div>
          <h2 style="margin:0 0 6px 0">Tools</h2>
          <p class="muted" style="margin:0">A curated set of utilities to speed up development.</p>
        </div>
        <div class="muted" style="font-size:13px">Explore — Try — Integrate</div>
      </div>

      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:14px">
        <article class="feature" aria-labelledby="t1">
          <h3 id="t1">Formatter</h3>
          <p class="muted">Multi-language code formatting with config profiles.</p>
        </article>

        <article class="feature" aria-labelledby="t2">
          <h3 id="t2">API Inspector</h3>
          <p class="muted">HTTP client with history, collections, and mock endpoints.</p>
        </article>

        <article class="feature" aria-labelledby="t3">
          <h3 id="t3">Snippet Vault</h3>
          <p class="muted">Organize, tag, and quickly reuse snippets.</p>
        </article>

        <article class="feature" aria-labelledby="t4">
          <h3 id="t4">Playground</h3>
          <p class="muted">Sandboxed runtimes to preview code & UI components.</p>
        </article>

        <article class="feature" aria-labelledby="t5">
          <h3 id="t5">Mock Server</h3>
          <p class="muted">Create deterministic mock APIs for local dev and tests.</p>
        </article>

        <article class="feature" aria-labelledby="t6">
          <h3 id="t6">Team Workspaces</h3>
          <p class="muted">Share collections, snippets, and flows with your team.</p>
        </article>
      </div>
    </section>

    <!-- Pricing teaser -->
    <section id="pricing" style="display:flex;gap:12px;align-items:stretch;flex-wrap:wrap">
      <div style="flex:1;min-width:280px" class="feature">
        <h3>Start for free</h3>
        <p class="muted">Free tier includes most tools, unlimited local snippets, and community support.</p>
        <small class="muted">Upgrade for team features and priority support.</small>
      </div>

      <div style="flex:1;min-width:280px" class="feature">
        <h3>Pro & Teams</h3>
        <p class="muted">Per-user pricing for advanced integrations, SSO, and private hosting options.</p>
        <small class="muted">Contact sales for custom plans.</small>
      </div>
    </section>

    <!-- Footer -->
    <footer aria-label="Site footer">
      <small>© <strong>Marshal Muse</strong> — made for developers • 2025</small>
      <div style="display:flex;gap:12px;align-items:center">
        <a class="muted" href="#" style="text-decoration:none">Privacy</a>
        <a class="muted" href="#" style="text-decoration:none">Docs</a>
        <a class="muted" href="#" style="text-decoration:none">GitHub</a>
      </div>
    </footer>
  </div>
</body>
</html>
