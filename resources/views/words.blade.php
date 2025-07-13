<!DOCTYPE html>
<html lang="ar">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحقق من الكلمة</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>


    <div class="container">
        <h1>تحقق من الكلمة</h1>
    <form action="/check-word" method="POST">
    @csrf  <!-- تأكد من إضافة توكن CSRF -->
    <label for="word">أدخل الكلمة:</label>
    <input type="text" name="word" id="word" required>
    <button type="submit">تحقق</button>
</form>




        @if (session('message'))
            <p>{{ session('message') }}</p>
        @endif
    </div>


</body>


</html>
