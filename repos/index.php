<!DOCTYPE html>
<html>
<head>
  <title>Search Page</title>
</head>
<body>
  <h1>Search Page</h1>
  <form id="searchForm">
    <label for="search">Enter a search term:</label>
    <input type="text" id="search" name="search" required>
    <button type="submit">Submit</button>
  </form>

  <script>
    function validateSearchTerm(input) {
      input = input.trim();

      if (input.length === 0 || input.length > 100) {
        alert('Input is required and must be less than 100 characters.');
        return false;
      }

      // Allow letters, numbers, spaces, and basic punctuation
      const validPattern = /^[a-zA-Z0-9\s\-_,\.!?\']+$/;
      if (!validPattern.test(input)) {
        alert('Input contains invalid characters.');
        return false;
      }

      return true;
    }

    document.getElementById('searchForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const inputElement = document.getElementById('search');
      const input = inputElement.value;

      if (!validateSearchTerm(input)) {
        // Clear input and stay on page for new input
        inputElement.value = '';
        inputElement.focus();
        return;
      }

      // If valid, go to results page with encoded search term
      window.location.href = 'results.html?search=' + encodeURIComponent(input);
    });
  </script>
</body>
</html>
