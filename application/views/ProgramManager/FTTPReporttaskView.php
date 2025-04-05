
<div class="container mt-5 mb-5 p-4 border rounded shadow-sm bg-light">
    <h4 class="mb-4 text-center fw-bold">Review FTTP Report</h4>
    <!-- FTTP Section -->
    <div class="mb-4">
        <label class="form-label fw-semibold">FTTP Letter</label>
        <div class="border p-3 bg-white rounded">
            <p>View FTTP Letter (+C50+E50)</p>
            <button class="btn btn-primary btn-sm">View</button>
        </div>
    </div>
    <!-- RTTP Section -->
    <div class="mb-4">
        <label class="form-label fw-semibold">RTTP Report</label>
        <div class="border p-3 bg-white rounded">
            <p>View RTTP Report</p>
            <button class="btn btn-primary btn-sm"><a href="<?php echo base_url();?>">View</a></button>
            <button class="btn btn-success btn-sm me-2">Download</button>
            <button class="btn btn-warning btn-sm">Send for Correction</button>
        </div>
    </div>
    <!-- Star Rating Section -->
    <div>
        <label class="form-label fw-semibold">Star Rating to PIA</label>
        <div class="border p-3 bg-white rounded">
            <div class="star-rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">★</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">★</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">★</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">★</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">★</label>
            </div>
        </div>
    </div>
</div>
<style>
    .star-rating {
        direction: rtl;
        display: inline-flex;
        font-size: 1.5rem;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        color: #ddd;
        cursor: pointer;
    }

    .star-rating input:checked ~ label {
        color: gold;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: gold;
    }
</style>