<!-- Nếu có CSS tùy chỉnh, thêm tại đây -->
<style>
  /* Định nghĩa các biến CSS cơ bản */
  :root {
    --font-family-base: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    --font-size-base: 16px;
    --line-height-base: 1.6;
    --color-text: #333;
    --color-heading: #444;
    --color-link: #007bff;
    --color-link-hover: #0056b3;
  }

  /* Áp dụng các biến cho style toàn cục */
  body {
    font-family: var(--font-family-base);
    font-size: var(--font-size-base);
    line-height: var(--line-height-base);
    color: var(--color-text);
    margin: 0;
    padding: 0;
  }

  h1, h2, h3, h4, h5, h6 {
    font-weight: bold;
    color: var(--color-heading);
    margin: 0 0 0.5em; /* Giúp khoảng cách giữa tiêu đề và nội dung bên dưới */
  }

  p {
    margin-bottom: 1em;
  }

  a {
    color: var(--color-link);
    text-decoration: none;
    transition: color 0.3s ease;
  }

  a:hover {
    text-decoration: underline;
    color: var(--color-link-hover);
  }
</style>
