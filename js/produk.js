function toggleSearchInput() {
    var searchInput = document.getElementById('search-input');
    if (searchInput.classList.contains('active')) {
        searchInput.classList.remove('active');
    } else {
        searchInput.classList.add('active');
    }
}
