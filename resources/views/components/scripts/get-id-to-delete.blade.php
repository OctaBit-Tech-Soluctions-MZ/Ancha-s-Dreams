
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var deleteModal = document.getElementById('deleteModal');
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var form = document.getElementById('deleteForm');
                    var actionUrl = button.getAttribute('data-action');
                    form.action = actionUrl; 
                });
            });
        </script>