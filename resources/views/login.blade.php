<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Login - EduScan Presensi</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#f1f4fa; --card:#fff; --left:#f6f8fd; --ink:#1b2335; --muted:#6b7488;
  --line:#e3e8f1; --blue:#1d3a9e; --blue-soft:#e6edff; --green:#22c55e;
  --amber-bg:#fffbea; --amber-line:#f5e3a1; --amber-ink:#8a3b0a;
}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Inter',system-ui,sans-serif;background:var(--bg);color:var(--ink);min-height:100vh;display:flex;flex-direction:column;padding:0 40px}
svg{width:1em;height:1em;flex-shrink:0}

/* Header */
.top{display:flex;justify-content:space-between;align-items:center;padding:22px 0}
.brand{display:flex;align-items:center;gap:10px}
.brand-logo{width:34px;height:34px;border-radius:9px;background:var(--blue);display:grid;place-items:center;color:#fff;font-size:18px}
.brand b{display:block;font-size:15px;font-weight:700;line-height:1.2}
.brand small{font-size:10.5px;color:var(--muted)}
.status{display:flex;align-items:center;gap:7px;background:#fff;border:1px solid var(--line);border-radius:999px;padding:6px 14px;font-size:11px;font-weight:600;box-shadow:0 2px 8px rgba(30,50,100,.06)}
.dot{width:7px;height:7px;border-radius:50%;background:var(--green)}

/* Card */
.wrap{flex:1;display:grid;place-items:center;padding:10px 0 24px}
.card{width:100%;max-width:1000px;background:var(--card);border-radius:24px;box-shadow:0 20px 50px rgba(30,50,100,.10);display:grid;grid-template-columns:1fr 1fr;overflow:hidden}

/* Left */
.left{background:var(--left);padding:30px 32px;border-right:1px solid var(--line)}
.badge{display:inline-flex;align-items:center;gap:6px;background:var(--blue-soft);color:var(--blue);border:1px solid #cdd9fb;border-radius:999px;padding:5px 11px;font-size:10.5px;font-weight:600}
.left h1{font-size:23px;font-weight:800;line-height:1.3;margin:16px 0 10px;letter-spacing:-.3px}
.left p{font-size:12.5px;color:var(--muted);line-height:1.6;max-width:300px}
.hero{position:relative;margin:18px 0;height:128px;border-radius:14px;overflow:hidden;background:linear-gradient(180deg,#cfe3fb 0%,#e9f1fb 55%,#7fb36a 56%,#a9c9a0 100%);box-shadow:0 6px 16px rgba(30,50,100,.15)}
.hero img{width:100%;height:100%;object-fit:cover;display:block}
.hero::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 50%,rgba(20,30,60,.55))}
.hero span{position:absolute;bottom:8px;z-index:2;font-size:10px;font-weight:600;color:#fff}
.hero .l{left:12px}
.hero .r{right:12px;display:flex;align-items:center;gap:5px}
.hero .r i{width:6px;height:6px;border-radius:50%;background:var(--green)}
.feat{display:flex;align-items:center;gap:12px;background:#fff;border:1px solid var(--line);border-radius:10px;padding:10px 12px;margin-bottom:10px;font-size:12px;font-weight:600;box-shadow:0 2px 6px rgba(30,50,100,.04)}
.feat .ic{width:28px;height:28px;border-radius:8px;display:grid;place-items:center;font-size:14px}
.ic.b{background:var(--blue-soft);color:var(--blue)}
.ic.y{background:#fff3d6;color:#d99200}
.ic.g{background:#dcf6e6;color:#16a34a}
.secure{display:flex;align-items:center;gap:6px;margin-top:16px;font-size:10.5px;color:var(--muted)}
.secure svg{color:var(--green)}

/* Right */
.right{padding:36px 40px}
.right h2{font-size:19px;font-weight:700;margin-bottom:4px;letter-spacing:-.2px}
.sub{font-size:12px;color:var(--muted);margin-bottom:18px}
.google{width:100%;display:flex;align-items:center;justify-content:center;gap:10px;background:#fff;border:1px solid var(--line);border-radius:10px;padding:11px;font:600 12px 'Inter';color:var(--ink);cursor:pointer;transition:background .15s}
.google:hover{background:#f7f9fd}
.or{display:flex;align-items:center;gap:12px;margin:16px 0;font-size:9.5px;letter-spacing:.8px;color:#98a1b3;text-transform:uppercase}
.or::before,.or::after{content:"";flex:1;height:1px;background:var(--line)}
.tabs{display:grid;grid-template-columns:1fr 1fr;background:#eff1f6;border-radius:10px;padding:4px;margin-bottom:16px}
.tab{display:flex;align-items:center;justify-content:center;gap:7px;border:0;background:transparent;padding:9px;border-radius:8px;font:600 12px 'Inter';color:#4a5468;cursor:pointer}
.tab.active{background:var(--blue);color:#fff}
label{display:block;font-size:11px;font-weight:600;color:#3b4457;margin-bottom:6px}
.row{display:flex;justify-content:space-between;align-items:center}
.row a{font-size:10.5px;font-weight:700;color:var(--blue);text-decoration:none;margin-bottom:6px}
.field{position:relative;margin-bottom:14px}
.field input[type=text],.field input[type=password]{width:100%;background:#f3f5f9;border:1px solid var(--line);border-radius:10px;padding:12px 14px 12px 38px;font:500 12px 'Inter';color:var(--ink);outline:none}
.field input:focus{border-color:var(--blue);background:#fff;box-shadow:0 0 0 3px rgba(29,58,158,.12)}
.field .lead{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:#8b95a8;font-size:14px;pointer-events:none}
.field .eye{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:0;color:#8b95a8;font-size:15px;cursor:pointer;display:grid}
.remember{display:flex;align-items:center;gap:8px;font-size:11px;color:#3b4457;margin-bottom:16px;cursor:pointer}
.remember input{width:14px;height:14px;accent-color:var(--blue)}
.submit{width:100%;display:flex;align-items:center;justify-content:center;gap:8px;background:var(--blue);color:#fff;border:0;border-radius:10px;padding:13px;font:700 12.5px 'Inter';cursor:pointer;box-shadow:0 6px 14px rgba(29,58,158,.28);transition:filter .15s}
.submit:hover{filter:brightness(1.1)}
.qr{display:flex;align-items:center;gap:12px;margin-top:20px;background:var(--amber-bg);border:1px solid var(--amber-line);border-radius:10px;padding:11px 14px;text-decoration:none;color:var(--amber-ink);font-size:12px;font-weight:600}
.qr .ic{width:26px;height:26px;border-radius:7px;background:#f59e0b;color:#fff;display:grid;place-items:center;font-size:14px}
.qr .chev{margin-left:auto}
.error{background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;font-size:11px;padding:9px 12px;border-radius:8px;margin-bottom:14px}

/* Footer */
.foot{display:flex;justify-content:space-between;align-items:center;padding:14px 0 22px;font-size:10.5px;color:var(--muted)}
.foot .r{display:flex;align-items:center;gap:10px}
.ver{background:#e7eaf1;border-radius:5px;padding:3px 8px;font-family:ui-monospace,Menlo,monospace;font-size:10px;color:#4a5468}

:focus-visible{outline:2px solid var(--blue);outline-offset:2px}

@media(max-width:860px){
  body{padding:0 16px}
  .card{grid-template-columns:1fr}
  .left{display:none}
  .right{padding:28px 22px}
  .foot{flex-direction:column;gap:8px;text-align:center}
}
</style>
</head>
<body>

<header class="top">
  <div class="brand">
    <div class="brand-logo">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><path d="M14 14h3v3h-3zM20 14v.01M14 20h3M20 17v4"/></svg>
    </div>
    <div><b>EduScan Presensi</b><small>Sistem Presensi Digital Terpadu</small></div>
  </div>
  <div class="status"><span class="dot"></span>Server Institusi Aktif</div>
</header>

<main class="wrap">
  <div class="card">

    {{-- Kiri --}}
    <section class="left">
      <span class="badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="m8 12 3 3 5-6"/></svg>
        Presensi Pintar QR Code
      </span>
      <h1>Absensi Cepat, Tepat, dan Terpercaya</h1>
      <p>Platform verifikasi kehadiran siswa dan staf secara digital dan otomatis terintegrasi.</p>

      <div class="hero">
        <img src="{{ asset('images/hero-campus.svg') }}" alt="Ilustrasi gerbang masuk kampus pintar">
        <span class="l">Smart Campus Entry</span>
        <span class="r"><i></i>Online Sync</span>
      </div>

      <div class="feat"><span class="ic b"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 4 14h7l-1 8 9-12h-7z"/></svg></span>Scan QR Cepat &lt; 1 detik</div>
      <div class="feat"><span class="ic y"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10 21h4"/></svg></span>Notifikasi Realtime ke Orang Tua</div>
      <div class="feat"><span class="ic g"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="m8 12 3 3 5-6"/></svg></span>Integrasi Langsung Sistem Dapodik</div>

      <div class="secure">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
        Protokol Keamanan SSL 256-bit Terenkripsi
      </div>
    </section>

    {{-- Kanan --}}
    <section class="right">
      <h2>Portal Presensi Sekolah</h2>
      <p class="sub">Masuk untuk mencatat kehadiran hari ini</p>

      <a href="{{ route('login.google') }}" class="google" style="text-decoration:none">
        <svg viewBox="0 0 48 48" width="16" height="16"><path fill="#FFC107" d="M43.6 20.1H42V20H24v8h11.3A12 12 0 1 1 24 12c3 0 5.8 1.1 7.9 3l5.7-5.7A20 20 0 1 0 44 24c0-1.3-.1-2.700-.4-3.900z"/><path fill="#FF3D00" d="m6.300 14.700 6.600 4.800A12 12 0 0 1 24 12c3 0 5.800 1.100 7.900 3l5.700-5.700A20 20 0 0 0 6.300 14.700z"/><path fill="#4CAF50" d="M24 44a20 20 0 0 0 13.500-5.200l-6.200-5.200A12 12 0 0 1 12.700 28l-6.500 5A20 20 0 0 0 24 44z"/><path fill="#1976D2" d="M43.600 20.100H42V20H24v8h11.300a12 12 0 0 1-4.100 5.600l6.200 5.200C37 39.200 44 34 44 24c0-1.300-.1-2.700-.4-3.900z"/></svg>
        Masuk dengan Google
      </a>

      <div class="or">atau dengan NIP / NISN</div>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="role" id="role" value="guru">

        <div class="tabs" role="tablist">
          <button type="button" class="tab active" data-role="guru" data-label="NIP / Nomor Induk Pegawai" data-ph="Masukkan NIP atau ID Staf">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M9 7V4h6v3M3 13h18"/></svg>Guru &amp; Staf
          </button>
          <button type="button" class="tab" data-role="siswa" data-label="NISN / Nomor Induk Siswa" data-ph="Masukkan NISN">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m2 9 10-5 10 5-10 5zM6 11.500V16c0 1.500 3 3 6 3s6-1.500 6-3v-4.500"/></svg>Siswa
          </button>
        </div>

        @if ($errors->any())
          <div class="error">{{ $errors->first() }}</div>
        @endif

        <label for="identifier" id="id-label">NIP / Nomor Induk Pegawai</label>
        <div class="field">
          <svg class="lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
          <input type="text" id="identifier" name="identifier" value="{{ old('identifier') }}" placeholder="Masukkan NIP atau ID Staf" autocomplete="username" required>
        </div>

        <div class="row">
          <label for="password">Kata Sandi</label>
          <a href="{{ route('password.request') }}">Lupa Password?</a>
        </div>
        <div class="field">
          <svg class="lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
          <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password" required>
          <button type="button" class="eye" id="toggle-pass" aria-label="Tampilkan kata sandi">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>

        <label class="remember">
          <input type="checkbox" name="remember" checked> Ingat saya di perangkat ini
        </label>

        <button type="submit" class="submit">
          Masuk ke Portal
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </button>
      </form>

      <a href="{{ route('qr.card') }}" class="qr">
        <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 8V5a1 1 0 0 1 1-1h3M16 4h3a1 1 0 0 1 1 1v3M20 16v3a1 1 0 0 1-1 1h-3M8 20H5a1 1 0 0 1-1-1v-3M8 12h8"/></svg></span>
        Pindai Kartu QR Presensi Fisik
        <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 6 6 6-6 6"/></svg>
      </a>
    </section>

  </div>
</main>

<footer class="foot">
  <span>© 2024 EduScan Portal Presensi Sekolah. Seluruh hak cipta dilindungi undang-undang.</span>
  <span class="r"><span class="ver">v3.4.0-Enterprise</span>• Bantuan IT: Ext. 104</span>
</footer>

<script>
  // Ganti tab Guru/Siswa
  const tabs = document.querySelectorAll('.tab');
  tabs.forEach(t => t.addEventListener('click', () => {
    tabs.forEach(x => x.classList.remove('active'));
    t.classList.add('active');
    document.getElementById('role').value = t.dataset.role;
    document.getElementById('id-label').textContent = t.dataset.label;
    document.getElementById('identifier').placeholder = t.dataset.ph;
  }));

  // Tampilkan / sembunyikan password
  const pass = document.getElementById('password');
  document.getElementById('toggle-pass').addEventListener('click', () => {
    pass.type = pass.type === 'password' ? 'text' : 'password';
  });
</script>
</body>
</html>