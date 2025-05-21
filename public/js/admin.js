document.addEventListener('DOMContentLoaded', function() {
      const selectAll = document.getElementById('selectAll');
      const contactSelectors = document.querySelectorAll('.contact-selector');
      const bulkActionButtons = document.querySelectorAll('.admin-actions__btn');
      const bulkActionForm = document.getElementById('bulkActionForm');
      const bulkMethod = document.getElementById('bulkMethod');
      const bulkIds = document.getElementById('bulkIds');
      
      selectAll.addEventListener('change', function() {
          contactSelectors.forEach(checkbox => {
              checkbox.checked = this.checked;
          });
          updateBulkButtons();
      });
      
      contactSelectors.forEach(checkbox => {
          checkbox.addEventListener('change', function() {
              selectAll.checked = Array.from(contactSelectors).every(cb => cb.checked);
              updateBulkButtons();
          });
      });
      
      function updateBulkButtons() {
          const hasSelection = Array.from(contactSelectors).some(cb => cb.checked);
          bulkActionButtons.forEach(button => {
              button.disabled = !hasSelection;
          });
      }
      
      document.getElementById('bulkDeleteBtn').addEventListener('click', function() {
          if (confirm('Are you sure you want to delete the selected contacts?')) {
              submitBulkAction('DELETE', '/contacts/bulk-delete');
          }
      });
      
      document.getElementById('bulkBlockBtn').addEventListener('click', function() {
          submitBulkAction('PATCH', '/contacts/bulk-block');
      });
      
      document.getElementById('bulkUnblockBtn').addEventListener('click', function() {
          submitBulkAction('PATCH', '/contacts/bulk-unblock');
      });
      
      function submitBulkAction(method, action) {
          bulkMethod.value = method;
          bulkIds.value = JSON.stringify(getSelectedIds());
          bulkActionForm.action = action;
          bulkActionForm.submit();
      }
      
      function getSelectedIds() {
          const selectedIds = [];
          contactSelectors.forEach(checkbox => {
              if (checkbox.checked) {
                  const row = checkbox.closest('.admin-table__row');
                  selectedIds.push(row.dataset.id);
              }
          });
          return selectedIds;
      }
  });