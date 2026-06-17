<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Settings - LOOMA Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            --bg-card: rgba(30, 41, 59, 0.7);
            --border: rgba(255, 255, 255, 0.06);
            --text-primary: #f1f5f9;
            --text-muted: #94a3b8;
            --text-faint: #64748b;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: var(--text-primary);
            min-height: 100vh;
            margin: 0;
            font-size: 14px;
        }

        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: rgba(10, 17, 34, 0.96);
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--border);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            padding: 0;
            transition: var(--transition);
            overflow: hidden;
        }

        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .brand-logo {
            width: 32px; height: 32px;
            background: linear-gradient(135deg, #1a1a1a, #000000);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .sidebar-brand h5 {
            font-weight: 700;
            color: #fff;
            margin: 0;
            font-size: 1rem;
            white-space: nowrap;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 1rem 0;
        }

        .sidebar-nav::-webkit-scrollbar { width: 0; }

        .nav-section {
            padding: 0.25rem 1.5rem 0.5rem;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .1em;
            color: var(--text-faint);
            text-transform: uppercase;
            margin-top: 0.5rem;
        }

        .sidebar-nav .nav-link {
            color: var(--text-muted);
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            transition: var(--transition);
            border-left: 3px solid transparent;
            font-weight: 500;
            font-size: 13.5px;
            white-space: nowrap;
        }

        .sidebar-nav .nav-link:hover { background: rgba(255,255,255,.05); color: #cbd5e1; }
        .sidebar-nav .nav-link.active { background: rgba(255,255,255,.08); color: #fff; border-left-color: #000; }
        .sidebar-nav .nav-link i { font-size: 1.15rem; width: 20px; text-align: center; flex-shrink: 0; }

        .sidebar-footer {
            padding: 1rem 0;
            border-top: 1px solid var(--border);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-height: 100vh;
        }

        .topbar {
            position: sticky;
            top: 0; z-index: 900;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0.875rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .search-wrap { position: relative; flex: 0 0 260px; }
        .search-wrap i { position: absolute; left: .75rem; top: 50%; transform: translateY(-50%); color: var(--text-faint); font-size: .9rem; }

        .search-input {
            background: rgba(255,255,255,.04);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .45rem 1rem .45rem 2.25rem;
            color: var(--text-primary);
            font-size: 13px;
            width: 100%;
            outline: none;
            transition: border-color .2s;
        }

        .search-input::placeholder { color: var(--text-faint); }
        .search-input:focus { border-color: rgba(59,130,246,.4); }

        .topbar-actions { display: flex; align-items: center; gap: .875rem; }

        .icon-btn {
            width: 36px; height: 36px;
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,.04);
            border: 1px solid var(--border);
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            position: relative;
        }

        .icon-btn:hover { background: rgba(255,255,255,.08); color: #fff; }
        .icon-btn i { font-size: 1rem; }

        .notif-dot {
            position: absolute; top: 6px; right: 6px;
            width: 7px; height: 7px;
            background: #ef4444;
            border-radius: 50%;
            border: 1.5px solid #0f172a;
        }

        .avatar-btn {
            width: 36px; height: 36px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid rgba(59,130,246,.4);
        }

        .avatar-btn img { width: 100%; height: 100%; object-fit: cover; }

        .content { padding: 1.75rem; }

        .page-header {
            margin-bottom: 1.5rem;
        }

        .page-header h4 {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 2px;
        }

        .page-header p {
            font-size: 13px;
            color: var(--text-faint);
            margin: 0;
        }

        .card-panel {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border-radius: 14px;
            border: 1px solid var(--border);
        }

        .form-label {
            font-size: 12.5px;
            color: var(--text-muted);
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control, .form-select {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 13.5px;
            padding: .5rem .875rem;
            transition: border-color .2s, background .2s;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255,255,255,.07);
            border-color: rgba(255,255,255,.15);
            box-shadow: 0 0 0 3px rgba(255,255,255,.05);
            color: var(--text-primary);
            outline: none;
        }

        .form-control::placeholder { color: var(--text-faint); }
        .form-select option { background: #1e293b; color: var(--text-primary); }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .btn-primary {
            background: #1a1a1a;
            border-color: #1a1a1a;
            border-radius: 9px;
            font-size: 13.5px;
            padding: .5rem 1.25rem;
        }

        .btn-primary:hover { background: #000; border-color: #000; }

        .btn-outline-secondary {
            border-color: var(--border);
            color: var(--text-muted);
            border-radius: 9px;
            font-size: 13px;
            padding: .5rem 1rem;
        }

        .btn-outline-secondary:hover { background: rgba(255,255,255,.05); color: #fff; border-color: var(--border); }

        .pagination .page-link {
            background: rgba(255,255,255,.04);
            border-color: var(--border);
            color: var(--text-muted);
            font-size: 13px;
        }

        .pagination .page-link:hover { background: rgba(255,255,255,.08); color: #fff; border-color: var(--border); }
        .pagination .page-item.active .page-link { background: #000; border-color: #000; color: #fff; }
        .pagination .page-item.disabled .page-link { background: rgba(255,255,255,.02); color: var(--text-faint); }

        .dropdown-menu {
            background: #1e293b;
            border: 1px solid var(--border);
            box-shadow: 0 8px 24px rgba(0,0,0,.35);
        }

        .dropdown-item { color: var(--text-muted); font-size: 13px; padding: .5rem 1rem; }
        .dropdown-item:hover { background: rgba(255,255,255,.06); color: #fff; }
        .dropdown-divider { border-color: var(--border); }

        .modal-content {
            background: #1e293b;
            border: 1px solid var(--border);
            color: var(--text-primary);
            border-radius: 14px;
        }

        .modal-header { border-bottom: 1px solid var(--border); padding: 1.1rem 1.5rem; }
        .modal-footer { border-top:  1px solid var(--border); padding: 1rem 1.5rem; }
        .modal-body   { padding: 1.25rem 1.5rem; font-size: 13.5px; color: var(--text-muted); }

        .logo-preview {
            width: 80px; height: 80px;
            border-radius: 12px;
            border: 1px solid var(--border);
            object-fit: cover;
            background: rgba(255,255,255,.05);
            display: none;
        }

        .logo-preview.visible { display: block; }

        .logo-placeholder {
            width: 80px; height: 80px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,.05);
            display: flex; align-items: center; justify-content: center;
            color: var(--text-faint);
            font-size: 2rem;
        }

        @media (max-width: 1200px) {
            .sidebar { width: var(--sidebar-collapsed); }
            .sidebar .nav-text, .sidebar .nav-section, .sidebar-brand h5 { display: none; }
            .sidebar-nav .nav-link { padding: .75rem; justify-content: center; }
            .sidebar-nav .nav-link i { width: auto; margin: 0; }
            .main-content { margin-left: var(--sidebar-collapsed); }
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); width: var(--sidebar-width); }
            .sidebar .nav-text, .sidebar .nav-section, .sidebar-brand h5 { display: block; }
            .sidebar-nav .nav-link { padding: .75rem 1.5rem; justify-content: flex-start; }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .search-wrap { flex: 1; }
        }
    </style>
    @include('admin.partials.theme')
</head>
<body>

    @include('admin.partials.sidebar')

    <div class="main-content">
        @include('admin.partials.topbar', ['searchPlaceholder' => 'Search settings…'])

        <div class="content">
            <div class="page-header">
                <h4>System Settings</h4>
                <p>Manage your store configuration and preferences.</p>
            </div>

            @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 mb-4" style="border-radius:10px;background:rgba(16,185,129,.15);border:1px solid rgba(16,185,129,.25);color:#34d399;font-size:13.5px;">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>
            @endif

            <div class="card-panel">
                <div class="p-4 border-bottom" style="border-bottom:1px solid var(--border);">
                    <h5 style="font-size:1rem;font-weight:600;margin:0;">General Settings</h5>
                </div>
                <div class="p-4">
                    <form action="{{ route('panel.settings.update') }}" method="POST" enctype="multipart/form-data" id="settingsForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Site Name <span class="text-danger">*</span></label>
                            <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Site Description</label>
                            <textarea name="site_description" class="form-control" rows="3">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Site Email <span class="text-danger">*</span></label>
                            <input type="email" name="site_email" class="form-control" value="{{ old('site_email', $settings['site_email'] ?? '') }}" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Currency Symbol <span class="text-danger">*</span></label>
                                <input type="text" name="currency" class="form-control" value="{{ old('currency', $settings['currency'] ?? '$') }}" maxlength="3" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Free Shipping Threshold <span class="text-danger">*</span></label>
                                <input type="number" name="free_shipping_threshold" class="form-control" value="{{ old('free_shipping_threshold', $settings['free_shipping_threshold'] ?? 50) }}" min="0" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tax Rate (%) <span class="text-danger">*</span></label>
                                <input type="number" name="tax_rate" class="form-control" value="{{ old('tax_rate', $settings['tax_rate'] ?? 10) }}" min="0" max="100" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Site Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*" id="logoInput">
                            <div class="mt-3 d-flex align-items-center gap-3">
                                <div id="logoPreviewContainer">
                                    <div class="logo-placeholder" id="logoPlaceholder">
                                        <i class="bi bi-image"></i>
                                    </div>
                                    <img id="logoPreview" class="logo-preview" src="" alt="Logo preview">
                                </div>
                                <div style="font-size:12px;color:var(--text-faint);">Upload a logo image (JPEG, PNG, WebP). Max 2MB.</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2 me-1"></i> Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.partials.logout')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });

        document.addEventListener('click', e => {
            if (window.innerWidth < 768 &&
                sidebar && !sidebar.contains(e.target) &&
                !document.getElementById('sidebarToggle')?.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });

        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');
        const logoPlaceholder = document.getElementById('logoPlaceholder');

        if (logoInput) {
            logoInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (ev) {
                        logoPreview.src = ev.target.result;
                        logoPreview.classList.add('visible');
                        logoPlaceholder.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

    });
    </script>
</body>
</html>