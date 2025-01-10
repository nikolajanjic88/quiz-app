<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
  <script>
    <?php if(isset($_SESSION['message'])): ?>
      alertify.set('notifier','position', 'top-right');
      alertify.success('<?= $_SESSION['message'] ?>');
      <?php unset($_SESSION['message']) ?>
    <?php endif ?>    
  </script>
</body>
</html>