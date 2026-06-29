    </div> <!-- End padding wrapper -->
  </main>
  
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      
      const isOpen = !sidebar.classList.contains('-translate-x-full');
      
      if(isOpen) {
          sidebar.classList.add('-translate-x-full');
          overlay.classList.add('opacity-0', 'pointer-events-none');
      } else {
          sidebar.classList.remove('-translate-x-full');
          overlay.classList.remove('opacity-0', 'pointer-events-none');
      }
    }
  </script>
</body>
</html>
