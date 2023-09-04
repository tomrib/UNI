document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('searchInput');
    var searchResults = document.getElementById('search-results');

    searchInput.addEventListener('input', function() {
        var query = searchInput.value;

        if (query !== '') {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'search-results?search=' + encodeURIComponent(query), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        searchResults.innerHTML = xhr.responseText;
                    }
                }
            };
            xhr.send();
        } else {
            searchResults.innerHTML = '';
        }
    });
});