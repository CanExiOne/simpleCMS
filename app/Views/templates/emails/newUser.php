<style>
  table {
    width: 80%;
    word-wrap: break-word;
  }

  body {
    width: 750px;
    max-width: 800px;
    height: 100vh;
  }

  @media (max-width: 480px) {
    body {
      width: 80vw;
      max-width: 100vw;
    }
  }
</style>
<body>
<p style="font-size: 10pt; margin-bottom: 5pt; font-family: arial; margin-top: 0pt">
  Twoje hasło to: <?=esc($data['pwd'])?>
</p>
</body>
