<!-- Các thẻ meta cơ bản -->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Giúp tối ưu hiển thị trên IE -->
<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<title>Dashboard Admin</title>

<!-- Dùng Tailwind CSS qua CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Cấu hình mở rộng (tùy chọn) cho Tailwind -->
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          primary: '#1D4ED8', // Ví dụ: màu chủ đạo
          secondary: '#9333EA'
        },
        fontFamily: {
          sans: ['Inter', 'ui-sans-serif', 'system-ui']
        }
      },
    },
  }
</script>