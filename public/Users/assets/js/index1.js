document.addEventListener('DOMContentLoaded', function () {
    // Handle tab switching
    var triggerTabList = [].slice.call(document.querySelectorAll('#myTab button'));
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl);

        triggerEl.addEventListener('click', function (event) {
            event.preventDefault();
            tabTrigger.show();
        });
    });

    // Handle form submission
    document.querySelector('.search-section form').addEventListener('submit', function (event) {
        event.preventDefault();
        // Get form values
        var location = document.getElementById('location').value;
        var checkin = document.getElementById('checkin').value;
        var checkout = document.getElementById('checkout').value;
        var guests = document.getElementById('guests').value;

        // Perform search logic here
        console.log('Searching for:', location, checkin, checkout, guests);
        alert('Search functionality is not implemented yet.');
    });

    // Handle favorite icon toggle
    document.getElementById('favoriteIcon1').addEventListener('click', function() {
        this.classList.toggle('active');
        if (this.classList.contains('active')) {
            this.classList.remove('far');
            this.classList.add('fas');
        } else {
            this.classList.remove('fas');
            this.classList.add('far');
        }
    });
});
