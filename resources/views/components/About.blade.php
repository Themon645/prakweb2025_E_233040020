<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>About</title>
</head>
<body>
  <x-Layout>
    {{--  Cara memanggil slot $title yang telah dibuat --}}
    <x-slot:title>
      About
    </x-slot:title>
    <h1>Halaman About</h1>
  </x-Layout>
</body>
</html>