<?php include 'process.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RockStar Studio | Booking System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#0f172a] min-h-screen flex items-center justify-center p-6 text-slate-900">

    <div class="relative w-full max-w-md">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-purple-500/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-blue-500/30 rounded-full blur-3xl"></div>

        <div class="relative bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white/20">
            <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 p-8 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-2xl backdrop-blur-md mb-4 shadow-inner">
                    <span class="text-3xl">🎸</span>
                </div>
                <h2 class="text-white text-3xl font-extrabold tracking-tight">RockStar Studio</h2>
                <p class="text-indigo-100 text-sm mt-1 opacity-90">Sistem Booking Latihan Musik </p>
            </div>

            <div class="p-8">
                <form method="POST" action="index.php" class="space-y-6">

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Kode Booking</label>
                        <div class="relative">
                            <input type="text" name="booking_code"
                                value="<?php echo htmlspecialchars($_POST['booking_code'] ?? ''); ?>"
                                class="w-full pl-4 pr-4 py-3 bg-slate-50 border rounded-xl outline-none transition-all duration-300
                                <?php echo $errors['booking_code'] ? 'border-red-400 focus:border-red-500 bg-red-50' : 'border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10'; ?>"
                                placeholder="STU-XXXX">
                        </div>
                        <?php if ($errors['booking_code']): ?>
                            <p class="text-red-500 text-[11px] mt-1 flex items-center gap-1 font-medium ml-1">
                                ⚠️ <?php echo $errors['booking_code']; ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Jam Latihan</label>
                        <div class="relative">
                            <input type="text" name="session_time"
                                value="<?php echo htmlspecialchars($_POST['session_time'] ?? ''); ?>"
                                class="w-full pl-4 pr-4 py-3 bg-slate-50 border rounded-xl outline-none transition-all duration-300
                                <?php echo $errors['session_time'] ? 'border-red-400 focus:border-red-500 bg-red-50' : 'border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10'; ?>"
                                placeholder="Contoh: 14:30">
                        </div>
                        <?php if ($errors['session_time']): ?>
                            <p class="text-red-500 text-[11px] mt-1 flex items-center gap-1 font-medium ml-1">
                                ⚠️ <?php echo $errors['session_time']; ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">ID Member</label>
                        <div class="relative">
                            <input type="number" name="member_id"
                                value="<?php echo htmlspecialchars($_POST['member_id'] ?? ''); ?>"
                                class="w-full pl-4 pr-4 py-3 bg-slate-50 border rounded-xl outline-none transition-all duration-300
                                <?php echo $errors['member_id'] ? 'border-red-400 focus:border-red-500 bg-red-50' : 'border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10'; ?>"
                                placeholder="8 Digit Angka">
                        </div>
                        <?php if ($errors['member_id']): ?>
                            <p class="text-red-500 text-[11px] mt-1 flex items-center gap-1 font-medium ml-1">
                                ⚠️ <?php echo $errors['member_id']; ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <button type="submit"
                        class="w-full bg-slate-900 hover:bg-indigo-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-500/20 transition-all duration-300 hover:-translate-y-1 active:scale-95">
                        Konfirmasi Booking
                    </button>
                </form>
            </div>

            <div class="bg-slate-50/50 p-4 text-center border-t border-slate-100">
                <p class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">Theory of Computation - Regex Implementation</p>
            </div>
        </div>
    </div>

    <?php if ($showModal): ?>
        <div x-data="{ open: true }" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md">
            <div class="bg-white rounded-[2rem] shadow-2xl p-10 max-w-sm w-full text-center border border-slate-100 transform transition-all animate-bounce-short">
                <div class="w-24 h-24 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h3 class="text-3xl font-black text-slate-800 mb-3 tracking-tight">Berhasil!</h3>
                <p class="text-slate-500 leading-relaxed mb-8 text-sm">Data Anda telah divalidasi oleh sistem <strong>Regex</strong> kami dengan sempurna.</p>

                <button @click="window.location.href='index.php'" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-2xl transition-all shadow-xl shadow-green-500/30 active:scale-95">
                    Selesai
                </button>
            </div>
        </div>
    <?php endif; ?>

</body>

</html>