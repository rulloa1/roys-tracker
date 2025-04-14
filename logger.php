$data = json_decode(file_get_contents('php://input'), true);
$data['ip'] = $_SERVER['REMOTE_ADDR'];
$data['agent'] = $_SERVER['HTTP_USER_AGENT'];
$data['logged_at'] = date("Y-m-d H:i:s");

// 🔎 Track redirect flag
$redirected = $data['redirected'] ?? false;

if ($redirected) {
    sendToTelegram("🌀 *Redirected Visitor*\n"
      . "🧠 FP: `{$data['fingerprint']}`\n"
      . "📍 IP: `{$data['ip']}`\n"
      . "⏱ Time: `{$data['logged_at']}`");
}
