<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-6 space-y-6">
    <h2 class="text-2xl font-bold text-gray-700">Activity Review Form</h2>

    <!-- Media Link -->
    <div>
      <a href="#" class="text-blue-600 hover:underline" target="_blank">📷 View All Media Uploaded During Activity</a>
    </div>

    <!-- RTTP Report Link -->
    <div class="flex items-center justify-between">
      <a href="#" download class="text-blue-600 hover:underline">📄 Download RTTP Report</a>
      <button class="text-sm text-red-500 hover:underline">Send for Corrections</button>
    </div>

    <!-- Star Rating and Remark -->
    <div>
      <label class="block text-gray-700 font-medium mb-2">Star Rating to PIA</label>
      <div id="starRating" class="flex space-x-2 text-2xl text-gray-400 mb-4">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
      </div>
      <textarea rows="3" placeholder="Add your remarks..." class="w-full p-2 border rounded-md resize-none"></textarea>
    </div>

    <!-- Buttons -->
    <div class="flex space-x-4 justify-end">
      <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Approve</button>
      <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Reject</button>
    </div>
  </div>

  <script>
    const stars = document.querySelectorAll('.star');
    let selectedRating = 0;

    stars.forEach(star => {
      star.addEventListener('mouseover', () => {
        highlightStars(star.dataset.value);
      });

      star.addEventListener('mouseout', () => {
        highlightStars(selectedRating);
      });

      star.addEventListener('click', () => {
        selectedRating = star.dataset.value;
        highlightStars(selectedRating);
      });
    });

    function highlightStars(rating) {
      stars.forEach(star => {
        if (star.dataset.value <= rating) {
          star.classList.add('selected');
        } else {
          star.classList.remove('selected');
        }
      });
    }
  </script>