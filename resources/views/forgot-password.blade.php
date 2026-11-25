<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - KursusKu</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #f3eef9; font-family: 'Segoe UI', sans-serif; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px rgba(111, 66, 193, 0.15); width: 100%; max-width: 400px; text-align: center; }
        h2 { color: #59359a; margin-bottom: 10px; }
        p { color: #666; font-size: 14px; margin-bottom: 25px; }
        input { width: 100%; padding: 12px; border: 1px solid #d7c4ec; border-radius: 8px; margin-bottom: 20px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #6f42c1; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; }
        button:hover { background: #59359a; }
        a { display: block; margin-top: 20px; color: #6f42c1; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Lupa Password?</h2>
        <p>Masukkan email Anda. Kami akan mengirimkan tautan untuk mereset password.</p>
        <form>
            <input type="email" placeholder="Masukkan email Anda" required>
            <button type="button">Kirim Link Reset</button>
        </form>
        <a href="{{ route('login') }}">← Kembali ke Login</a>
    </div>
</body>
</html>