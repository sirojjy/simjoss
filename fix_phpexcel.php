<?php
// Ubah path ini sesuai lokasi PHPExcel kamu
$directory = __DIR__ . '/application/libraries/PHPExcel';

// Fungsi rekursif untuk memindai semua file PHP
function fixCurlyBraces($dir)
{
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

    foreach ($rii as $file) {
        if ($file->isDir()) continue;
        if (pathinfo($file, PATHINFO_EXTENSION) != 'php') continue;

        $contents = file_get_contents($file->getPathname());

        // Ganti $text{0} -> $text[0] menggunakan regex aman
        $fixed = preg_replace_callback('/(\$\w+)\{(\d+)\}/', function ($matches) {
            return $matches[1] . '[' . $matches[2] . ']';
        }, $contents);

        // Simpan jika ada perubahan
        if ($contents !== $fixed) {
            file_put_contents($file->getPathname(), $fixed);
            echo "✅ Fixed: " . $file->getPathname() . "\n";
        }
    }
}

// Jalankan
fixCurlyBraces($directory);
echo "Selesai perbaikan.\n";
